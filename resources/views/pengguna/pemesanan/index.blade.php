@extends('layouts.app')

@section('title', 'Histori Pesanan - Bhumihara Farma')

@section('content')
<main class="max-w-4xl mx-auto px-6 py-10">
    <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-teal-700 mb-6">📜 Histori Pesanan Anda</h1>

        @if(session('success'))
            <div class="alert alert-success mb-4">{{ session('success') }}</div>
        @endif

        <div class="space-y-4">
            @forelse ($pemesanan as $pesanan)
                <div class="border rounded-lg p-4 flex flex-col md:flex-row justify-between items-center gap-4">
                    <div>
                        <p class="font-bold text-lg text-teal-700">Order #{{ $pesanan->id }}</p>
                        <p class="text-sm text-gray-500">Tanggal: {{ \Carbon\Carbon::parse($pesanan->tanggal_pesan)->format('d F Y') }}</p>
                        <p class="font-semibold">Total: Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
                    </div>
                    <div>
                        @if($pesanan->status == 'menunggu_pembayaran')
                            <span class="badge bg-yellow-500 text-black font-semibold py-1 px-2 rounded">Menunggu Pembayaran</span>
                        @elseif($pesanan->status == 'diproses')
                            <span class="badge bg-blue-500 text-white font-semibold py-1 px-2 rounded">Diproses</span>
                        @elseif($pesanan->status == 'selesai')
                            <span class="badge bg-green-500 text-white font-semibold py-1 px-2 rounded">Selesai</span>
                        @elseif($pesanan->status == 'dibatalkan')
                             <span class="badge bg-red-500 text-white font-semibold py-1 px-2 rounded">Dibatalkan</span>
                        @endif
                    </div>
                    <a href="{{ route('pemesanan.show', $pesanan->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                </div>
            @empty
                <div class="text-center py-10">
                    <p class="text-gray-500 text-xl">Anda belum memiliki riwayat pesanan.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $pemesanan->links() }}
        </div>
    </div>
</main>
@endsection