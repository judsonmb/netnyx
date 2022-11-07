@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Olá, administrador {{ Auth::user()->name }}!</div>

                <div class="card-body">
                    <a href="{{ route('admin') }}">Ver painel administrativo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
