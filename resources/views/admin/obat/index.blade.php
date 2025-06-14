@extends('layouts.admin_template')

@section('title-page', 'Obat')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('obat.create') }}" class="btn btn-primary mb-3">Tambah Obat</a>
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Tabel Data Obat</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Obat</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($obats as $obat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($obat->foto)
                                                <img src="{{ asset('storage/' . $obat->foto) }}" alt="Foto Obat" width="60" height="60" class="rounded">
                                            @else
                                                <span class="text-muted">Tidak ada</span>
                                            @endif
                                        </td>
                                        <td>{{ $obat->nama_obat }}</td>
                                        <td>{{ $obat->stok }}</td>
                                        <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-muted">Belum ada data obat.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
