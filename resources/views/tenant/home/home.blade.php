@php
    $views_path = 'views/tenant/home/home';
@endphp

@extends('tenant.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __($views_path . '.dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __($views_path . '.you_are_logged_in') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
