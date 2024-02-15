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
            <h4 class="mb-2">Edit Data</h4>

            <form id="formAuthentication" class="mb-3" action="{{ route('user.update',$user->id_user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="id_user" class="form-label">No User</label>
                    <input
                        type="text"
                        class="form-control @error('id_user') is-invalid @enderror"
                        id="id_user"
                        name="id_user"
                        value="{{ $user->id_user }}"
                        readonly
                    />
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input
                        type="text"
                        class="form-control @error('nama') is-invalid @enderror"
                        id="nama"
                        name="nama"
                        value="{{ $user->nama }}"
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
                        <option value="administrator" {{ $user->akses == 'administrator' ? 'selected' : '' }}>Administrator</option>
                        <option value="marketing" {{ $user->akses == 'marketing' ? 'selected' : '' }}>Marketing</option>
                        <option value="marketing_manager" {{ $user->akses == 'marketing_manager' ? 'selected' : '' }}>Manager Marketing</option>
                    </select>
                    @error('akses')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="no_rek" class="form-label">No Rekening</label>
                    <input type="number" inputmode="numeric" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" name="no_rek"  value="{{ $user->no_rek }}" required="no_rek"/>
                    @error('no_rek')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                        <option value="aktif" {{ $user->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="pending" {{ $user->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Wajah<b> (Format: jpg, png )</b></label>
                    <input type="file" id="foto" name="foto" accept="image/*"
                    class="form-control @error('foto') is-invalid @enderror">
                    @error('foto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
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
                    <label for="cv" class="form-label">Upload CV<b> (Format: pdf, doc, docx )</b></label>
                    <input type="file" id="cv" name="cv" accept="image/*"
                    class="form-control @error('cv') is-invalid @enderror">
                    @error('wajah')
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
                        aria-describedby="password"
                        required autocomplete="new-password" value="{{ $user->password }}"
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
                        aria-describedby="password"
                        required
                        autocomplete="new-password" value="{{ $user->password }}"
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
