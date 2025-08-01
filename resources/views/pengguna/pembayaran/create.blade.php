<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Bhumihara Farma</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('midtrans.client_key')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e6f7ff 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .payment-card {
            background: linear-gradient(to bottom right, #ffffff, #f7fafc);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 123, 255, 0.1);
        }

        .header-gradient {
            background: linear-gradient(90deg, #059669 0%, #10b981 100%);
            padding: 30px 0;
            text-align: center;
            color: white;
            border-radius: 0 0 50% 50% / 30%;
            margin-bottom: 30px;
        }
        
        .payment-btn {
            background: linear-gradient(90deg, #10b981 0%, #34d399 100%);
            border: none;
            border-radius: 50px;
            padding: 16px 40px;
            font-size: 18px;
            font-weight: 600;
            color: white;
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.4);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
        }
        
        .order-item {
            transition: all 0.3s ease;
            border-radius: 12px;
            padding: 15px;
        }
        
        .total-box {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border: 2px dashed #10b981;
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
        }
        
        @media (max-width: 768px) {
            .header-gradient h1 {
                font-size: 24px;
            }
            
            .payment-btn {
                padding: 14px 30px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="header-gradient">
            <h1 class="text-3xl font-bold"><i class="fas fa-credit-card mr-3"></i>Pembayaran Pesanan</h1>
            <p class="mt-2 opacity-90">Selesaikan pembayaran untuk melanjutkan</p>
        </div>
        
        <div class="payment-card mb-8">
            <div class="p-6 md:p-8">
                <!-- Order Summary -->
                <div class="mb-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-gray-800">Ringkasan Pesanan <span class="text-teal-700">#{{ $pemesanan->id }}</span></h2>
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                            @if($pemesanan->status == 'menunggu_pembayaran')
                                Menunggu Pembayaran
                            @elseif($pemesanan->status == 'diproses')
                                Sedang Diproses
                            @elseif($pemesanan->status == 'dikirim')
                                Dalam Pengiriman
                            @elseif($pemesanan->status == 'selesai')
                                Selesai
                            @else
                                {{ $pemesanan->status }}
                            @endif
                        </span>
                    </div>
                    <div class="space-y-4">
                        @foreach($pemesanan->itemPesanan as $item)
                        <div class="order-item">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-4">
                                    @if($item->obat->foto)
                                    <img src="{{ asset('storage/' . $item->obat->foto) }}" alt="{{ $item->obat->nama_obat }}" class="w-16 h-16 object-contain rounded">
                                    @else
                                    <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16 flex items-center justify-center text-gray-400">
                                        <i class="fas fa-pills text-2xl"></i>
                                    </div>
                                    @endif
                                    <div>
                                        <p class="font-semibold">{{ $item->obat->nama_obat }}</p>
                                        <p class="text-sm text-gray-500">
                                            {{ $item->jumlah }} x Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                                <p class="font-semibold">Rp {{ number_format($item->jumlah * $item->harga_satuan, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="total-box">
                        <div class="flex justify-between text-lg font-bold pt-2">
                            <span>Total Pembayaran:</span>
                            <span class="text-teal-700 text-xl">Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Payment Button -->
                <div class="text-center mt-10">
                    <button id="pay-button" class="payment-btn">
                        <i class="fas fa-lock mr-2"></i>
                        Bayar Sekarang
                    </button>
                </div>
            </div>
        </div>
        
        <div class="text-center text-gray-500 text-sm mt-8 pb-10">
            <p>© 2023 Bhumihara Farma. All rights reserved.</p>
            <p class="mt-1">Layanan pelanggan: (021) 1234-5678 | cs@bhumiharafarma.co.id</p>
        </div>
    </div>
<script>
        document.addEventListener('DOMContentLoaded', function () {
        const payButton = document.getElementById('pay-button');
        
        payButton.addEventListener('click', function () {
            snap.pay('{{ $snapToken }}', {
                skipOrderSummary: true,
                
                onSuccess: function(result) {
                // Send minimal data to server - we'll set our own payment status
                fetch("{{ route('pembayaran.success', $pemesanan->id) }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        payment_type: result.payment_type,
                        transaction_id: result.transaction_id,
                        order_id: result.order_id
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        // Get detailed error message from server
                        return response.text().then(text => {
                            console.error('Server error response:', text);
                            throw new Error(`Server error: ${response.status} - ${text}`);
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    // Redirect on success
                    if (data.redirect_url) {
                        window.location.href = data.redirect_url;
                    } else {
                        window.location.href = "{{ route('pengguna.dashboard') }}";
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat memproses pembayaran.',
                        icon: 'error'
                    });
                });
            },
                onPending: function(result) {
                    Swal.fire({
                        title: 'Pembayaran Tertunda',
                        text: 'Silakan selesaikan pembayaran Anda.',
                        icon: 'info',
                        confirmButtonColor: '#10b981'
                    });
                },
                onError: function(result) {
                    Swal.fire({
                        title: 'Pembayaran Gagal',
                        text: 'Terjadi kesalahan dalam proses pembayaran.',
                        icon: 'error',
                        confirmButtonColor: '#10b981'
                    });
                },
                onClose: function() {
                    console.log('Payment popup closed');
                }
            });
        });
    });
</script>
</body>
</html>
