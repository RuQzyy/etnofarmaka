@extends('layouts.admin_template')

@section('title-page', 'Detail Pemesanan')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Detail Pemesanan</h4>
                    </div>
                    <div class="card-body">
                        <h4 class="mb-4">Item yang Dipesan</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Nama Obat</th>
                                        <th>Harga</th>
                                        <th>Jumlah Dipesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemesanan->itemPesanan as $item)
                                        <tr>
                                            <td><img src="{{ asset('storage/' . $item->obat->foto) }}" width="100" class="img-thumbnail"></td>
                                            <td>{{ $item->obat->nama_obat }}</td>
                                            <td>Rp {{ number_format($item->obat->harga, 0, ',', '.') }}</td>
                                            <td>{{ $item->jumlah }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection