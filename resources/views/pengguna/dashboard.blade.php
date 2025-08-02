@extends('layouts.app')

@section('title', 'Beranda - Bhumihara Farma')

@section('content')
<main class="max-w-7xl mx-auto px-6 py-10 space-y-20">
    {{-- Modal Notifikasi --}}
    @if(session('warning'))
        <div class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-900 bg-opacity-50 z-50" id="warningModal">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm text-center">
                <h3 class="text-xl font-semibold mb-4 text-yellow-600">Perhatian</h3>
                <p class="mb-4">{{ session('warning') }}</p>
                <button onclick="document.getElementById('warningModal').style.display='none'" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Tutup</button>
            </div>
        </div>
    @endif

    {{-- Section Produk Terbaru --}}
    <section>
        <div class="text-center mb-8">
            <div class="inline-block bg-white border border-gray-200 px-6 py-3 rounded-lg shadow-sm">
                <p class="text-sm text-sky-400 mb-0">Informasi</p>
                <h2 class="text-teal-700 font-bold text-lg -mt-1">Produk Terbaru</h2>
            </div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-x-6 gap-y-10">
            @foreach ($produkTerbaru as $produk)
                @include('partials.product_card', ['produk' => $produk, 'themeColor' => 'teal'])
            @endforeach
        </div>
    </section>

    {{-- Section Produk Terlaris --}}
    <section>
        <div class="text-center mb-8">
            <div class="inline-block bg-white border border-yellow-300 px-6 py-3 rounded-lg shadow-sm">
                <p class="text-sm text-yellow-500 mb-0">Populer</p>
                <h2 class="text-yellow-600 font-bold text-lg -mt-1">Produk Terlaris</h2>
            </div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-x-6 gap-y-10">
            @foreach ($produkTerlaris as $produk)
                @include('partials.product_card', ['produk' => $produk, 'themeColor' => 'yellow'])
            @endforeach
        </div>
    </section>

    {{-- Section Semua Produk dengan Paginasi --}}
    <section>
        <div class="text-center mb-8">
            <div class="inline-block bg-white border border-gray-200 px-6 py-3 rounded-lg shadow-sm">
                <p class="text-sm text-gray-500 mb-0">Koleksi</p>
                <h2 class="text-gray-800 font-bold text-lg -mt-1">Jelajahi Semua Produk</h2>
            </div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-x-6 gap-y-10">
            @foreach ($semuaProduk as $produk)
                @include('partials.product_card', ['produk' => $produk, 'themeColor' => 'gray'])
            @endforeach
        </div>
        
        {{-- Tombol Paginasi --}}
        <div class="mt-12">
            {{ $semuaProduk->links() }}
        </div>
    </section>
</main>

{{-- Definisi Modal (diletakkan di luar <main> untuk performa) --}}
@foreach ($produkTerbaru as $produk)
    @include('partials.product_modal', ['produk' => $produk, 'themeColor' => 'teal'])
@endforeach

@foreach ($produkTerlaris as $produk)
    @include('partials.product_modal', ['produk' => $produk, 'themeColor' => 'yellow'])
@endforeach

@foreach ($semuaProduk as $produk)
    @include('partials.product_modal', ['produk' => $produk, 'themeColor' => 'gray'])
@endforeach
@endsection