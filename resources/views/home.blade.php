@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @php($akses = Auth::user()->akses)
                <div class="card-header">{{ __('Dashboard')}}@if ($akses == 'administrator') Adminstrator @elseif($akses == 'manager_marketing') Manager Marketing @else Marketing @endif</div>

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
    </div>
@endsection
