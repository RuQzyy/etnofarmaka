@extends('layouts.app')

@section('title', 'Keranjang Belanja - Bhumihara Farma')

@section('content')
<main class="max-w-4xl mx-auto px-6 py-10">
    <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-teal-700 mb-6">🛒 Keranjang Belanja Anda</h1>

        @if(session('success'))
            <div class="alert alert-success mb-4">{{ session('success') }}</div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger mb-4">{{ session('error') }}</div>
        @endif

        @forelse ($items as $item)
            <div class="flex flex-col md:flex-row items-center gap-4 border-b py-4">
                <img src="{{ asset('storage/' . $item->obat->foto) }}" alt="{{ $item->obat->nama_obat }}" class="w-24 h-24 object-contain rounded border p-1">
                
                <div class="flex-grow">
                    <a href="#" class="text-lg font-semibold text-teal-700 hover:underline">{{ $item->obat->nama_obat }}</a>
                    <p class="text-gray-600">Rp {{ number_format($item->obat->harga, 0, ',', '.') }} / item</p>
                </div>

                <div class="flex items-center gap-2">
                    <form action="{{ route('keranjang.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="number" name="jumlah" value="{{ $item->jumlah }}" min="1" class="form-control w-20 text-center">
                        <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
                    </form>
                </div>

                <div class="text-center md:text-right">
                    <p class="font-bold text-lg">Rp {{ number_format($item->obat->harga * $item->jumlah, 0, ',', '.') }}</p>
                    <form action="{{ route('keranjang.hapus', $item->id) }}" method="POST" class="mt-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline text-sm">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center py-10">
                <p class="text-gray-500 text-xl">Keranjang Anda masih kosong.</p>
                <a href="{{ route('pengguna.dashboard') }}" class="btn btn-primary mt-4">Mulai Belanja</a>
            </div>
        @endforelse

        @if($items->isNotEmpty())
            <div class="mt-8 text-right">
                <h2 class="text-xl font-bold">Total Belanja: 
                    <span class="text-teal-700">Rp {{ number_format($totalHarga, 0, ',', '.') }}</span>
                </h2>
                <p class="text-gray-500 text-sm">Belum termasuk ongkos kirim.</p>
                <form action="{{ route('checkout.process') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg">
                        Lanjutkan ke Pembayaran
                    </button>
                </form>
            </div>
        @endif
    </div>
</main>
@endsection