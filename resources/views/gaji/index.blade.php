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
                                    <td>: {{ $marketing->id_user }}</td>
                                </tr>
                                <tr>
                                    <td>NAMA</td>
                                    <td>: {{ $marketing->nama }}</td>
                                </tr>
                                <tr>
                                    <td>No Rekening</td>
                                    <td>: {{ $marketing->no_rek }}</td>
                                </tr>
                                <tr>
                                    <td>TANGGAL BUAT</td>
                                    <td>: {{ $marketing->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <td>TANGGAL UBAH</td>
                                    <td>: {{ $marketing->updated_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            </thead>
                        </table>
                        <h4 class="my-3">Data Gaji</h4>
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <td>NO</td>
                                    {{-- <td>nm_pelanggan</td> --}}
                                    <td>Fee Yang Didapat</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($gaji as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $gaji->pelanggan->nm_pelanggan }}</td> --}}
                                        <td>Rp. {{ number_format($item->pendapatan, 0, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <td colspan="4" class="text-center">Tidak ada Data</td>
                                @endforelse
                                <tr>
                                    <td><b>Total Gaji</b></td>
                                    <td>Rp. {{ number_format($total, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
