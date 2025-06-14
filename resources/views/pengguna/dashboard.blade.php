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
      @foreach ($produkTerbaru as $obat)
      <article
        class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition relative group cursor-pointer"
        data-bs-toggle="modal"
        data-bs-target="#modalProdukTerbaru{{ $obat->id }}">

        <img src="{{ asset('storage/' . $obat->foto) }}" alt="{{ $obat->nama_obat }}" class="w-full h-48 object-contain p-4">
        <div class="px-4 pb-4">
          <h3 class="text-base text-teal-700 font-semibold hover:underline">{{ $obat->nama_obat }}</h3>
          <p class="text-black font-bold text-lg mt-1">Rp {{ number_format($obat->harga, 0, ',', '.') }}</p>
          <p class="text-xs mt-1"><span class="text-green-700 font-semibold">Tersedia</span> / ID: {{ $obat->stok }}</p>
          <div class="flex justify-between items-center mt-3">
            <button onclick="event.stopPropagation()" class="text-white bg-teal-600 hover:bg-teal-700 rounded-full w-8 h-8 text-center font-bold text-lg leading-8">+</button>
          </div>
        </div>
      </article>
      @endforeach
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
      @foreach ($produkTerlaris as $obat)
      <article
        class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition relative group cursor-pointer"
        data-bs-toggle="modal"
        data-bs-target="#modalProdukTerlaris{{ $obat->id }}">

        <img src="{{ asset('storage/' . $obat->foto) }}" alt="{{ $obat->nama_obat }}" class="w-full h-48 object-contain p-4">
        <div class="px-4 pb-4">
          <h3 class="text-base text-yellow-600 font-semibold hover:underline">{{ $obat->nama_obat }}</h3>
          <p class="text-black font-bold text-lg mt-1">Rp {{ number_format($obat->harga, 0, ',', '.') }}</p>
          <p class="text-xs mt-1"><span class="text-green-700 font-semibold">Tersedia</span> / ID: {{ $obat->stok }}</p>
          <div class="flex justify-between items-center mt-3">
            <button onclick="event.stopPropagation()" class="text-white bg-yellow-500 hover:bg-yellow-600 rounded-full w-8 h-8 text-center font-bold text-lg leading-8">+</button>
          </div>
        </div>
      </article>
      @endforeach
    </div>
  </section>

  {{-- Modal untuk Produk Terbaru --}}
  @foreach ($produkTerbaru as $obat)
  <div class="modal fade" id="modalProdukTerbaru{{ $obat->id }}" tabindex="-1" aria-labelledby="labelProdukTerbaru{{ $obat->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-teal-600 text-white">
          <h5 class="modal-title" id="labelProdukTerbaru{{ $obat->id }}">{{ $obat->nama_obat }}</h5>
          <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body flex flex-col md:flex-row gap-4">
          <img src="{{ asset('storage/' . $obat->foto) }}" class="w-full md:w-1/3 object-contain border p-2 rounded" alt="{{ $obat->nama_obat }}">
          <div class="flex-1">
            <p><strong>Harga:</strong> Rp {{ number_format($obat->harga, 0, ',', '.') }}</p>
            <p><strong>Stok:</strong> {{ $obat->stok }}</p>
            <p><strong>Deskripsi:</strong></p>
            <p class="text-gray-700">{{ $obat->deskripsi }}</p>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button class="btn btn-success">+ Tambah ke Keranjang</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  {{-- Modal untuk Produk Terlaris --}}
  @foreach ($produkTerlaris as $obat)
  <div class="modal fade" id="modalProdukTerlaris{{ $obat->id }}" tabindex="-1" aria-labelledby="labelProdukTerlaris{{ $obat->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-yellow-600 text-white">
          <h5 class="modal-title" id="labelProdukTerlaris{{ $obat->id }}">{{ $obat->nama_obat }}</h5>
          <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body flex flex-col md:flex-row gap-4">
          <img src="{{ asset('storage/' . $obat->foto) }}" class="w-full md:w-1/3 object-contain border p-2 rounded" alt="{{ $obat->nama_obat }}">
          <div class="flex-1">
            <p><strong>Harga:</strong> Rp {{ number_format($obat->harga, 0, ',', '.') }}</p>
            <p><strong>Stok:</strong> {{ $obat->stok }}</p>
            <p><strong>Deskripsi:</strong></p>
            <p class="text-gray-700">{{ $obat->deskripsi }}</p>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button class="btn btn-warning">+ Tambah ke Keranjang</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach

</main>
@endsection
