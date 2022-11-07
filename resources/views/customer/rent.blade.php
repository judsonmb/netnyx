@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="text-align:center;">
                <div class="card-header">
                    <a href="#"><button type="button" class="btn btn-success">Confirmar</button></a>
                    <a href="#"><button type="button" class="btn btn-primary" onclick="history.go(-1)">Voltar</button></a>
                </div>

                <div class="card-body">
                    @php
                        $name = '';
                        if (isset($result['original_name'])) {
                            $name = $result['original_name'];
                        } else if (isset($result['original_title'])) {
                            $name = $result['original_title'];
                        } else if (isset($result['name'])) {
                            $name = $result['name'];
                        } 

                        $img = '';
                        if (isset($result['poster_path'])) {
                            $img = $result['poster_path'];
                        } else if (isset($result['backdrop_path'])) {
                            $img = $result['backdrop_path'];
                        }
                        $url = ($img != '') ? "https://image.tmdb.org/t/p/original$img" : null;
                    @endphp
                    <div> 
                        <h3>{{ $name }}</h3>
                        @if ($url != null)
                            <img width="600" height="800" src="{{ $url }}">
                        @else 
                            Sem capa disponível
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
