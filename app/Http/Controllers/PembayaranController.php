<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Midtrans\Snap;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\{Pemesanan, Pembayaran, Keranjang};

class PembayaranController extends Controller
{
    public function create($id_pemesanan)
    {
        $snapToken = null;
        $pemesanan = Pemesanan::with(['user', 'itemPesanan.obat'])->findOrFail($id_pemesanan);
        abort_if($pemesanan->id_user !== Auth::id(), 403);

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production', false);
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        
        // cek jika jumlah di itempesanan obat lebih dari obat
        foreach ($pemesanan->itemPesanan as $item) {
            if ($item->jumlah > $item->obat->stok) {
                return redirect()->route('pemesanan.show', $id_pemesanan)->with('warning', 'Tidak dapat melakukan pembayaran karena jumlah obat di item pesanan melebihi stok obat.');
            }
        }
        

        // Check if there's already a snap token in pemesanan table
        if ($pemesanan->snap_token) {
            $snapToken = $pemesanan->snap_token;
        }
        else{
            // Generate unique order ID
            $orderId = 'PESANAN-' . $pemesanan->id . '-' . time();

            // Prepare item details (IMPORTANT: Midtrans requires this for proper functionality)
            $itemDetails = [];
            if ($pemesanan->itemPesanan && $pemesanan->itemPesanan->count() > 0) {
                foreach ($pemesanan->itemPesanan as $item) {
                    $itemDetails[] = [
                        'id' => $item->id_obat,
                        'price' => (int) $item->harga_satuan, // Must be integer
                        'quantity' => $item->jumlah,
                        'name' => $item->obat->nama_obat ?? 'Obat'
                    ];
                }
            } else {
                // Fallback if no item details available
                $itemDetails[] = [
                    'id' => 'ITEM-' . $pemesanan->id,
                    'price' => (int) $pemesanan->total_harga,
                    'quantity' => 1,
                    'name' => 'Pemesanan Obat'
                ];
            }

            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => (int) $pemesanan->total_harga,
                ],
                'item_details' => $itemDetails,
                'customer_details' => [
                    'first_name' => $pemesanan->user->name,
                    'email' => $pemesanan->user->email,
                ],
                'enabled_payments' => [
                    'credit_card', 'mandiri_clickpay', 'cimb_clicks',
                    'bca_klikbca', 'bca_klikpay', 'bri_epay', 'echannel', 
                    'permata_va', 'bca_va', 'bni_va', 'other_va', 'gopay',
                    'indomaret', 'danamon_online', 'akulaku'
                ],
                'vtweb' => []
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            
            //add snap token to pemesanan table
            $pemesanan->snap_token = $snapToken;
            $pemesanan->save();

            //hapus keranjang
            Keranjang::where('id', $pemesanan->id_keranjang)->delete();
        }

        return view('pengguna.pembayaran.create', compact('pemesanan', 'snapToken'));
            
    }

    public function handlePaymentSuccess(Request $request, $id_pemesanan)
    {

        DB::beginTransaction();

        try {
            $pemesanan = Pemesanan::with('itemPesanan.obat')->findOrFail($id_pemesanan);


            if ($pemesanan->id_user !== Auth::id()) {
                return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 403);
            }

            //update status pemesanan
            $pemesanan->status = 'selesai';
            $pemesanan->save();

            //buat model pembayaran baru
            Pembayaran::create([
                'id_pemesanan' => $pemesanan->id,
                'metode_pembayaran' => $request->payment_type, // Gunakan data dari request
                'jumlah_bayar' => $pemesanan->total_harga,
                'status_pembayaran' => 'sukses',
                'tanggal_bayar' => Carbon::now()
            ]);

            //update status stok dan jumlah dibel obat
            $pemesanan->updateObatJumlahDibeliAndStok();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'redirect_url' => route('pengguna.dashboard')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Payment success error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
