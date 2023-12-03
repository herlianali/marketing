@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Data Pelanggan</h5>

                <div class="card-body">
                    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>No Pelanggan</th>
                                    <th>Foto KTP</th>
                                    <th>Foto Wajah</th>
                                    <th>Nama Sales</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th>
                                    <th>Status Verifikasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pelanggan as $pel)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pel->id_pel }}</td>
                                        <td><img class="card-img-top" src="{{ Storage::url($pel->ktp) }}" width="50px"></td>
                                        <td><img class="card-img-top" src="{{ Storage::url($pel->wajah) }}" width="50px"></td>
                                        <td>{{ $pel->user->nama }}</td>
                                        <td>{{ $pel->tgl_masuk }}</td>
                                        <td>{{ $pel->alamat }}</td>
                                        <td>{{ $pel->no_hp }}</td>
                                        <td>
                                            @if ($pel->verifikasi == 'Diterima')
                                                <span class="badge rounded bg-label-success">{{ $pel->verifikasi }}</span>
                                            @elseif ($pel->verifikasi == 'Belum Diverifikasi')
                                                <span class="badge rounded bg-label-warning">{{ $pel->verifikasi }}</span>
                                            @else
                                                <span class="badge rounded bg-label-danger">{{ $pel->verifikasi }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('pelanggan.destroy',
                                            ['pelanggan' => $pel->id_pel]) }}">
                                            <a href="{{ route('pelanggan.edit',$pel->id_pel) }}" class="btn btn-warning">Edit</a>

                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Hapus</button>
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
