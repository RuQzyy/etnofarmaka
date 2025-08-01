<article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 relative group">
    {{-- Bagian yang bisa diklik untuk membuka modal --}}
    <div class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#modalProduk{{ $produk->id }}">
        <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama_obat }}" class="w-full h-48 object-contain p-4">
        <div class="p-4">
            <h3 class="text-base text-{{ $themeColor }}-700 font-semibold hover:underline truncate">{{ $produk->nama_obat }}</h3>
            <p class="text-black font-bold text-lg mt-1">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
            @if($produk->stok > 0)
                <p class="text-xs mt-1"><span class="text-green-700 font-semibold">Tersedia</span> / Stok: {{ $produk->stok }}</p>
            @else
                <p class="text-xs mt-1"><span class="text-red-700 font-semibold">Habis</span></p>
            @endif
        </div>
    </div>
    
    {{-- Tombol Tambah ke Keranjang --}}
    @if($produk->stok > 0)
    <form action="{{ route('keranjang.tambah') }}" method="POST" class="px-4 pb-4">
        @csrf
        <input type="hidden" name="id_obat" value="{{ $produk->id }}">
        <input type="hidden" name="jumlah" value="1">
        <button type="submit" title="Tambah ke Keranjang" class="text-white bg-{{ $themeColor }}-600 hover:bg-{{ $themeColor }}-700 rounded-full w-8 h-8 flex items-center justify-center font-bold text-lg absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">+</button>
    </form>
    @endif
</article>