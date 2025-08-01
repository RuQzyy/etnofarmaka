@extends('layouts.admin_template')

@section('title-page', 'Pemesanan')

@section('content')
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Tabel Data Pemesanan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pembeli</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pemesanan as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{\Carbon\Carbon::parse($data->tanggal_pesan)->format('d-m-Y')}}</td>
                                        <td>Rp {{ number_format($data->total_harga, 0, ',', '.') }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>
                                            <form action="{{ route('pemesanan.detail', $data->id) }}" class="form">
                                                <button type="submit" class="btn btn-primary">Detail</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-muted">Belum ada data Pemesanan.</td>
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