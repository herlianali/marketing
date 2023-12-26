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
                                        <td>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#ktp">
                                                <img class="card-img-top" src="{{ Storage::url($pel->ktp) }}" width="50px">
                                            </a>
                                            <div class="modal fade" id="ktp" tabindex="-1" aria-labelledby="ktpLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ktpLabel">Ktp</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex justify-content-center">
                                                                <img src="{{ Storage::url($pel->ktp) }}" alt="" width="50%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#wajah">
                                                <img class="card-img-top" src="{{ Storage::url($pel->wajah) }}" width="50px">
                                            </a>
                                            <div class="modal fade" id="wajah" tabindex="-1" aria-labelledby="wajahLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="wajahLabel">Foto Wajah</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex justify-content-center">
                                                                <img src="{{ Storage::url($pel->wajah) }}" alt="" width="50%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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
                                            {{-- <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detail">Detail</button>
                                            <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="detailLabel">Detail Pelanggan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex justify-content-center">
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                      <label for="nameSmall" class="form-label">Nomor Pelanggan</label>
                                                                      <input type="text" class="form-control" value="{{ $pel->id_pel }}" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                      <label for="nameSmall" class="form-label">Nama Pelanggan</label>
                                                                      <input type="text" class="form-control" value="{{ $pel->nm_pelanggan }}" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
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
