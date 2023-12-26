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
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#smallModal">Detail</button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-sm" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel2">Detail Status Pelanggan</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col mb-3">
                                                  <label for="nameSmall" class="form-label">Nama Pelanggan</label>
                                                  <input type="text" class="form-control" value="{{ $pel->nm_pelanggan }}" disabled>
                                                </div>
                                              </div>
                                              <div class="row g-2">
                                                <div class="col mb-0">
                                                  <label class="form-label" for="emailSmall">Nomor Pelanggan</label>
                                                  <input type="text" class="form-control" value="{{ $pel->id_pel }}" disabled>
                                                </div>
                                                <div class="col mb-0">
                                                  <label for="dobSmall" class="form-label">Status</label>
                                                  <input type="text" class="form-control" value="{{ $pel->verifikasi }}" disabled>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
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
