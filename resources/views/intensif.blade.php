@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Data Pelanggan Belum Diverifikasi</h5>
                @if ($message = Session::get('status'))
                <div class="alert alert-info">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>No Pelanggan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Status Verifikasi</th>
                                    <th>Akses Verifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pelanggan as $pel)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pel->id_pel }}</td>
                                        <td>{{ $pel->nm_pelanggan }}</td>
                                        <td>{{ $pel->verifikasi }}</td>
                                        <td>
                                            <a href="{{ url('approve',$pel->id_pel) }}" class="btn btn-info">Approve</a>
                                            <a href="{{ url('reject',$pel->id_pel) }}" class="btn btn-danger">Reject</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data Tidak Ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
