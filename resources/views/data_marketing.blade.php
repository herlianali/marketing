@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Data Marketing</h5>

                <div class="card-body">
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>No User</th>
                                    <th>Nama</th>
                                    <th>No Rekening</th>
                                    {{-- <th>Password</th> --}}
                                    <th>Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($market as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->id_user }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->no_rek }}</td>
                                        {{-- <td>{{ $item->password }}</td> --}}
                                        <td>{{ $item->akses }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('user.destroy',
                                            ['user' => $item->id_user]) }}">
                                            <a href="{{ route('user.edit',$item->id_user) }}" class="btn btn-warning">Edit</a>

                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Hapus</button>
                                            <a href="{{ route('user.show',$item->id_user) }}" class="btn btn-info">Detail</a>

                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data Tidak Ada</td>
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
