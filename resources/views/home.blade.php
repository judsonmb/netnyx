@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Olá, {{ Auth::user()->name }}!</div>
                    <div class="card-body">
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('admin') }}">Ver painel administrativo</a>
                        @elseif (Auth::user()->role == 'customer')
                            <form action="{{ route('search') }}" method="GET">
                                @csrf
                                <div class="input-group">
                                    <input type="text" 
                                            class="form-control @error('movie') is-invalid @enderror" 
                                            id="movie" name="movie" maxlength="255" 
                                            value="{{ old('movie') }}" 
                                            placeholder="Digite aqui o filme ou série que deseja buscar" 
                                            required>
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                    
                                    @error('movie')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </form>
                        @else
                            Você está logado!
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
