@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Detail Sales Marketing</h5>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <td width="15%">ID</td>
                                    <td>: {{ $sales->id_user }}</td>
                                </tr>
                                <tr>
                                    <td>NAMA</td>
                                    <td>: {{ $sales->nama }}</td>
                                </tr>
                                <tr>
                                    <td>No Rekening</td>
                                    <td>: {{ $sales->no_rek }}</td>
                                </tr>
                                <tr>
                                    <td>TANGGAL BUAT</td>
                                    <td>: {{ $sales->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <td>TANGGAL UBAH</td>
                                    <td>: {{ $sales->updated_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            </thead>
                        </table>
                        <h4 class="my-3">Data Pelanggan</h4>
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <td>NO</td>
                                    <td>Nama</td>
                                    <td>Alamat</td>
                                    <td>No HP</td>
                                    <td>Tanggal Daftar</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sales->pelanggan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nm_pelanggan }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td>{{ $item->tgl_masuk }}</td>
                                        {{-- <td>{{ $item->tgl_masuk }}</td> --}}
                                    </tr>
                                @empty
                                    <td colspan="4" class="text-center">Tidak ada Data</td>
                                @endforelse
                                {{-- @foreach ($sales->user as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nm_pelanggan }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
