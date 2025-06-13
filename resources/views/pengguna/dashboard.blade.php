@extends('layouts.app')

@section('title', 'Beranda - Bhumihara Farma')

@section('content')
<main class="max-w-7xl mx-auto px-6 py-10 space-y-20">

  <!-- Produk Terbaru -->
  <section>
    <div class="text-center mb-8">
      <div class="inline-block bg-white border border-gray-200 px-6 py-3 rounded-lg shadow-sm">
        <p class="text-sm text-sky-400 mb-0">Informasi</p>
        <h2 class="text-teal-700 font-bold text-lg -mt-1">Produk Terbaru</h2>
      </div>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-x-6 gap-y-10">
      @for ($i = 1; $i <= 4; $i++)
      <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition relative group">
        <img src="https://via.placeholder.com/300x200?text=Produk+{{$i}}" alt="Produk {{$i}}" class="w-full h-48 object-contain p-4">
        <div class="px-4 pb-4">
          <h3 class="text-base text-teal-700 font-semibold hover:underline">Nama Produk {{$i}}</h3>
          <p class="text-black font-bold text-lg mt-1">Rp {{ number_format(210000 - $i * 10000) }}</p>
          <p class="text-xs mt-1"><span class="text-green-700 font-semibold">Tersedia</span> / KODE00{{$i}}</p>
          <div class="flex justify-between items-center mt-3">
            <button class="text-white bg-teal-600 hover:bg-teal-700 rounded-full w-8 h-8 text-center font-bold text-lg leading-8">+</button>
            <button class="text-teal-600 hover:text-teal-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 3h2l.4 2M7 13h13l1-5H6.4M7 13L5.4 6H3m4 7l1.5 7h9l1.5-7M10 21a1 1 0 110-2 1 1 0 010 2zm8 0a1 1 0 110-2 1 1 0 010 2z"/>
              </svg>
            </button>
          </div>
        </div>
      </article>
      @endfor
    </div>
  </section>

  <!-- Produk Terlaris -->
  <section>
    <div class="text-center mb-8">
      <div class="inline-block bg-white border border-yellow-300 px-6 py-3 rounded-lg shadow-sm">
        <p class="text-sm text-yellow-500 mb-0">Populer</p>
        <h2 class="text-yellow-600 font-bold text-lg -mt-1">Produk Terlaris</h2>
      </div>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-x-6 gap-y-10">
      @for ($i = 5; $i <= 8; $i++)
      <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition relative group">
        <img src="https://via.placeholder.com/300x200?text=Produk+{{$i}}" alt="Produk {{$i}}" class="w-full h-48 object-contain p-4">
        <div class="px-4 pb-4">
          <h3 class="text-base text-yellow-600 font-semibold hover:underline">Nama Produk {{$i}}</h3>
          <p class="text-black font-bold text-lg mt-1">Rp {{ number_format(190000 + $i * 5000) }}</p>
          <p class="text-xs mt-1"><span class="text-green-700 font-semibold">Tersedia</span> / KODE00{{$i}}</p>
          <div class="flex justify-between items-center mt-3">
            <button class="text-white bg-yellow-500 hover:bg-yellow-600 rounded-full w-8 h-8 text-center font-bold text-lg leading-8">+</button>
            <button class="text-yellow-600 hover:text-yellow-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 3h2l.4 2M7 13h13l1-5H6.4M7 13L5.4 6H3m4 7l1.5 7h9l1.5-7M10 21a1 1 0 110-2 1 1 0 010 2zm8 0a1 1 0 110-2 1 1 0 010 2z"/>
              </svg>
            </button>
          </div>
        </div>
      </article>
      @endfor
    </div>
  </section>
</main>
@endsection
