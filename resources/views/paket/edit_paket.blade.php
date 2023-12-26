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
            <h4 class="mb-2">Edit Data Paket</h4>

            <form id="formAuthentication" class="mb-3" action="{{ route('paket.update', $paket->id) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="mb-3">
                <label for="paket" class="form-label">Nama Paket</label>
                <input
                    type="text"
                    class="form-control @error('paket') is-invalid @enderror"
                    id="paket"
                    name="paket"
                    placeholder="Masukkan Nama Paket"
                    value="{{ $paket->paket }}"
                    required
                    autocomplete="paket"
                    autofocus
                />
                @error('paket')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="mb-3">
                <label for="fee_marketing" class="form-label">Fee Marketing</label>
                <input type="text" class="form-control @error('fee_marketing') is-invalid @enderror" id="fee_marketing" name="fee_marketing" placeholder="Masukkan Fee Marketing" value="{{ $paket->fee_marketing }}" required autocomplete="fee_marketing"/>
                @error('fee_marketing')
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

    @push('script')
    <script>
        var rupiah = document.getElementById('fee_marketing');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});

		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
    </script>
    @endpush
    <!-- / Content -->
    @endsection
