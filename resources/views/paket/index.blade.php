@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Data Paket</h5>

                <div class="card-body">
                    <a href="{{ route('paket.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Paket</th>
                                    <th>Fee Marketing</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($paket as $pak)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pak->paket }}</td>
                                        <td>Rp. {{ number_format($pak->fee_marketing, 0, ',', '.') }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('paket.destroy', $pak->id) }}">
                                            <a href="{{ route('paket.edit', $pak->id) }}" class="btn btn-warning">Edit</a>

                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Hapus</button>
                                            {{-- <a href="{{ route('') }}" class="btn btn-info">Detail</a> --}}

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
