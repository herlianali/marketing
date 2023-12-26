@extends('layouts.app_sneat')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                @php($akses = Auth::user()->akses)
                <div class="card-header">
                    {{-- {{ __('Dashboard')}}@if ($akses == 'administrator') Adminstrator @elseif($akses == 'manager_marketing') Manager Marketing @else Marketing @endif --}}
                    <h5 class="card-title text-primary">Selamat Datang @if ($akses == 'administrator') Adminstrator @elseif($akses == 'manager_marketing') Manager Marketing @else Marketing @endif</h5>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="badge bg-label-primary p-3 rounded mb-3">
                                    <i class='bx bx-id-card bx-sm'></i>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6" style="">
                                        <a class="dropdown-item" href="javascript:void(0);">Detail</a>
                                    </div>
                                </div>
                            </div>
                            <span>Total Marketing</span>
                            <h3 class="card-title text-nowrap mb-1">{{ $total_marketing }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="badge bg-label-success p-3 rounded mb-3">
                                    <i class='bx bxs-user-rectangle bx-sm'></i>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6" style="">
                                        <a class="dropdown-item" href="javascript:void(0);">Detail</a>
                                    </div>
                                </div>
                            </div>
                            <span>Total Pelanggan</span>
                            <h3 class="card-title text-nowrap mb-1">{{ $total_pelanggan }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="badge bg-label-info p-3 rounded mb-3">
                                    <i class='bx bx-user-check bx-sm'></i>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6" style="">
                                        <a class="dropdown-item" href="javascript:void(0);">Detail</a>
                                    </div>
                                </div>
                            </div>
                            <span>Pelanggan Baru</span>
                            <h3 class="card-title text-nowrap mb-1">{{ $total_pelanggan_baru }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
