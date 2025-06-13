@extends('layouts.admin_template')

@section('title-page', 'Edit Obat')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-header">Edit Obat</h5>
                        @if($obat->foto)
                            <div class="mb-4 text-center">
                                <img src="{{ asset('storage/' . $obat->foto) }}" alt="Foto Obat" width="150" class="img-thumbnail">
                            </div>
                        @endif
                        <form action="{{ route('obat.update', $obat->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_obat" class="form-label">Nama Obat</label>
                                <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="{{ old('nama_obat', $obat->nama_obat) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan', $obat->keterangan) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $obat->harga) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                @if($obat->foto)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $obat->foto) }}" alt="Foto Obat" width="100">
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="foto" name="foto">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok Awal</label>
                                <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $obat->stok) }}" required>
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('obat.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection