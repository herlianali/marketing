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
            <h4 class="mb-2">Tambah Data Baru</h4>

            <form id="formAuthentication" class="mb-3" action="{{ route('user.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input
                    type="text"
                    class="form-control @error('nama') is-invalid @enderror"
                    id="nama"
                    name="nama"
                    placeholder="Masukkan Nama"
                    value="{{ old('nama') }}"
                    required
                    autocomplete="nama"
                    autofocus
                />
                @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="mb-3">
                <label for="akses" class="form-label">Hak Akses</label>
                <select class="form-control @error('akses') is-invalid @enderror" id="akses" name="akses">
                    <option value="" readonly>Pilih Hak Akses</option>
                    <option value="administrator">Administrator</option>
                    <option value="marketing">Marketing</option>
                    <option value="marketing_manager">Manager Marketing</option>
                </select>
                @error('akses')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <input type="hidden" name="status" value="pending">

                <div class="mb-3">
                <label for="no_rek" class="form-label">No Rekening</label>
                <input type="number" inputmode="numeric" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" name="no_rek" placeholder="Masukkan No Rekening" value="{{ old('no_rek') }}" required autocomplete="no_rek"/>
                @error('no_rek')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                    <input
                    type="password"
                    id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                    required autocomplete="new-password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>

                <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password-confirm">Konfirmasi Password</label>
                <div class="input-group input-group-merge">
                    <input
                    type="password"
                    id="password-confirm"
                    class="form-control"
                    name="password_confirmation"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                    required
                    autocomplete="new-password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
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
