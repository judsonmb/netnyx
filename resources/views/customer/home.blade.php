@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Olá, cliente {{ Auth::user()->name }}!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('search') }}" method="POST">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
