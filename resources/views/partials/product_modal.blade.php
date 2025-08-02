<div class="modal fade" id="modalProduk{{ $produk->id }}" tabindex="-1" aria-labelledby="labelProduk{{ $produk->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('keranjang.tambah') }}" method="POST">
                @csrf
                <input type="hidden" name="id_obat" value="{{ $produk->id }}">
                <div class="modal-header bg-{{ $themeColor }}-600 text-white">
                    <h5 class="modal-title" id="labelProduk{{ $produk->id }}">{{ $produk->nama_obat }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body flex flex-col md:flex-row gap-6 p-6">
                    <img src="{{ asset('storage/' . $produk->foto) }}" class="w-full md:w-1/3 object-contain border p-2 rounded" alt="{{ $produk->nama_obat }}">
                    <div class="flex-1 space-y-3">
                        <p><strong>Harga:</strong> <span class="text-xl font-bold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span></p>
                        <p><strong>Stok:</strong> {{ $produk->stok }}</p>
                        <div>
                            <p><strong>Deskripsi:</strong></p>
                            <p class="text-gray-700 text-sm">{{ $produk->keterangan }}</p>
                        </div>
                        @if($produk->stok > 0)
                        <div class="flex items-center gap-2 pt-2">
                            <label for="jumlah-{{$produk->id}}"><strong>Jumlah:</strong></label>
                            <input type="number" id="jumlah-{{$produk->id}}" name="jumlah" value="1" min="1" max="{{ $produk->stok }}" class="form-control w-24">
                        </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    @if($produk->stok > 0)
                        <button type="submit" class="btn btn-{{ $themeColor == 'yellow' ? 'warning' : 'success' }}">+ Tambah ke Keranjang</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>