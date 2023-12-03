@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Data Marketing</h5>

                <div class="card-body">
                    <a href="{{ route('marketing.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Marketing</th>
                                    <th>Nama</th>
                                    <th>No Rekening</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($marketing as $mar)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mar->id_user }}</td>
                                        <td>{{ $mar->nama }}</td>
                                        <td>{{ $mar->no_rek }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('user.destroy',
                                            ['user' => $mar->id_user]) }}">
                                            <a href="{{ route('user.edit',$mar->id_user) }}" class="btn btn-warning">Edit</a>

                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Hapus</button>
                                            <a href="{{ route('user.show',$mar->id_user) }}" class="btn btn-info">Detail</a>

                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center">Data Tidak Ada</td>
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
