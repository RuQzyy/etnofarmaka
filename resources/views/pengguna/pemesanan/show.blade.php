@extends('layouts.app')

@section('title', 'Detail Pesanan #' . $pemesanan->id . ' - Bhumihara Farma')

@section('content')

@if(session('warning'))
    <div class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm text-center">
            <h3 class="text-xl font-semibold mb-4 text-yellow-600">Warning</h3>
            <p class="mb-4">{{ session('warning') }}</p>
            <button onclick="this.parentElement.parentElement.style.display='none'" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Close</button>
        </div>
    </div>
@endif

<main class="max-w-4xl mx-auto px-6 py-10">
    <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-2xl font-bold text-teal-700">Detail Pesanan #{{ $pemesanan->id }}</h1>
                <p class="text-gray-500">Tanggal: {{ \Carbon\Carbon::parse($pemesanan->tanggal_pesan)->format('d F Y H:i') }}</p>
            </div>
            @if($pemesanan->status == 'menunggu_pembayaran')
                <span class="badge badge-warning">Menunggu Pembayaran</span>
            @elseif($pemesanan->status == 'diproses')
                <span class="badge badge-info">Diproses</span>
            @elseif($pemesanan->status == 'selesai')
                <span class="badge badge-success">Selesai</span>
            @elseif($pemesanan->status == 'dibatalkan')
                 <span class="badge badge-danger">Dibatalkan</span>
            @endif
        </div>
        
        @if(session('success'))
            <div class="alert alert-success mb-4">{{ session('success') }}</div>
        @endif

        <div class="border-y py-4 my-4">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Item</h2>
            @foreach ($pemesanan->itemPesanan as $item)
                <div class="flex justify-between items-center py-2">
                    <div>
                        <p class="font-semibold">{{ $item->obat->nama_obat }}</p>
                        <p class="text-sm text-gray-500">{{ $item->jumlah }} x Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</p>
                    </div>
                    <p class="font-semibold">Rp {{ number_format($item->harga_satuan * $item->jumlah, 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-6 text-right">
            <h2 class="text-xl font-bold">Total Tagihan: 
                <span class="text-teal-700">Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}</span>
            </h2>
            @if($pemesanan->status == 'menunggu_pembayaran' && $pemesanan?->snap_token)
                <p class="text-sm text-gray-500 mt-2">Selesaikan pembayaran Anda untuk melanjutkan.</p>
                <form action="{{ route('pembayaran.late', $pemesanan->id) }}" method="POST">
                    @csrf
                    <button id="pay-button" class="mt-4 btn btn-lg btn-success" type="submit">Bayar Sekarang</button>
                </form>
            @elseif($pemesanan->status == 'diproses' || $pemesanan->status == 'selesai')
                <p class="mt-4 font-semibold text-green-600">Pembayaran telah berhasil. Pesanan Anda sedang diproses.</p>
            @else
                <p class="mt-4 font-semibold text-red-600">Pesanan ini telah dibatalkan.</p>
            @endif
        </div>
    </div>
</main>
@endsection