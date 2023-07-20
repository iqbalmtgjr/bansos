@extends('layouts.master')

@section('content')
    <div class="card text-center">
        <div class="card-header">
            <h3>Selamat Datang di {{ config('app.name', 'Laravel') }}</h3>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
@endsection
