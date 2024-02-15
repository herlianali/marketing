@extends('layouts.app_sneat')

@section('content')

<body>
    <!-- Content -->

    <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card">
            <div class="card-body">
            <!-- Logo -->
            <!-- /Logo -->
            <h4 class="mb-2">Tambah Data Pelanggan</h4>

            <form id="formAuthentication" class="mb-3" action="{{ route('pelanggan.store') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="mb-3">
                <label for="nm_pelanggan" class="form-label">Nama Pelanggan</label>
                <input
                    type="text"
                    class="form-control @error('nm_pelanggan') is-invalid @enderror"
                    id="nm_pelanggan"
                    name="nm_pelanggan"
                    placeholder="Masukkan Nama"
                    value="{{ old('nm_pelanggan') }}"
                    required
                    autocomplete="nm_pelanggan"
                    autofocus
                />
                @error('nm_pelanggan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3" >{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No Hp</label>
                    <input type="number" inputmode="numeric" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="Masukkan No Hp" value="{{ old('no_hp') }}" required autocomplete="no_hp"/>
                    @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="user_is" class="form-label">Nama Sales</label>
                    <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                        <option value="" readonly>-- Pilih Sales --</option>
                        @foreach ($marketing as $m)
                            <option value="{{ $m->id_user }}">{{ $m->nama }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tgl" class="form-label">Tanggal Registrasi</label>
                    <input type="date" class="form-control @error('tgl_masuk')
                        is-invalid
                    @enderror" name="tgl_masuk" id="tgl_masuk" value="{{ old('tgl_masuk') ?? $m->tgl_masuk ?? ''}}">
                    @error('tgl_masuk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="paket" class="form-label">Paket Internet</label>
                    <select class="form-control @error('paket_id') is-invalid @enderror" id="paket_id" name="paket_id">
                        <option value="" readonly>-- Pilih Paket --</option>
                        @foreach ($paket as $p)
                            <option value="{{ $p->id }}">{{ $p->paket }}</option>
                        @endforeach
                    </select>
                    @error('paket_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ktp" class="form-label">Foto KTP<b> (Format: jpg, png )</b></label>
                    <input type="file" id="ktp" name="ktp" accept="image/*"
                    class="form-control @error('ktp') is-invalid @enderror">
                    @error('wajah')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="wajah" class="form-label">Foto Wajah<b> (Format: jpg, png )</b></label>
                    <input type="file" id="wajah" name="wajah" accept="image/*"
                    class="form-control @error('wajah') is-invalid @enderror">
                    @error('wajah')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button class="btn btn-primary d-grid w-100" type="submit">SIMPAN</button>
            </form>

            </div>
        </div>
        <!-- Register Card -->
        </div>
    </div>
    </div>

    <!-- / Content -->
    @endsection
