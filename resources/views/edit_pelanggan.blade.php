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
            <h4 class="mb-2">Edit Data Pelanggan</h4>

            <form id="formAuthentication" class="mb-3" action="{{ route('pelanggan.update', $pelanggan->id_pel) }}" enctype="multipart/form-data" method="POST" >
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="id_pel" class="form-label">No Pelanggan</label>
                    <input
                        type="text"
                        class="form-control @error('id_pel') is-invalid @enderror"
                        id="id_pel"
                        name="id_pel"
                        value="{{ $pelanggan->id_pel }}"
                        readonly
                    />
                </div>

                <div class="mb-3">
                <label for="nm_pelanggan" class="form-label">Nama Pelanggan</label>
                <input
                    type="text"
                    class="form-control @error('nm_pelanggan') is-invalid @enderror"
                    id="nm_pelanggan"
                    name="nm_pelanggan"
                    value="{{ $pelanggan->nm_pelanggan }}"
                    required
                    autocomplete="nm_pelanggan"
                />
                @error('nm_pelanggan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3" value="{{ $pelanggan->alamat }}">{{ $pelanggan->alamat }}</textarea>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                <label for="no_hp" class="form-label">No Hp</label>
                <input type="number" inputmode="numeric" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ $pelanggan->no_hp }}" required autocomplete="no_hp"/>
                @error('no_hp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="mb-3">
                <label for="user_id" class="form-label">Nama Sales</label>
                <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                    <option value="" readonly>Pilih Sales</option>
                    @foreach ($marketing as $m)
                        <option value="{{ $m->id_user }}" {{ $m->id_user == $pelanggan->user_id ? 'selected' : '' }}>{{ $m->nama }}</option>
                    @endforeach
                </select>
                @error('marketing')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="mb-3">
                <label for="tgl" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control @error('tgl_masuk')
                    is-invalid
                @enderror" name="tgl_masuk" id="tgl_masuk" value="{{ $pelanggan->tgl_masuk }}">
                @error('tgl_masuk')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="mb-3">
                    <div class="m-3">
                        <img src="{{ \Storage::url($pelanggan->ktp) }}" alt="" width="200" class="mg-thumbnail">
                    </div>
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
                    <div class="m-3">
                        <img src="{{ \Storage::url($pelanggan->wajah) }}" alt="" width="200" class="mg-thumbnail">
                    </div>
                    <label for="wajah" class="form-label">Foto Wajah<b> (Format: jpg, png )</b></label>
                    <input type="file" id="wajah" name="wajah" accept="image/*"
                    class="form-control @error('wajah') is-invalid @enderror">
                    @error('wajah')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button class="btn btn-primary d-grid w-100" type="submit">UBAH</button>
            </form>

            </div>
        </div>
        <!-- Register Card -->
        </div>
    </div>
    </div>

    <!-- / Content -->
    @endsection
