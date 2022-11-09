@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card" style="text-align:center;">
            <div class="card-header">
                <a href="{{ route('rent', [$result['id'],$media]) }}"><button type="button" class="btn btn-success">Confirmar</button></a>
                <a href="#"><button type="button" class="btn btn-primary" onclick="history.go(-1)">Voltar</button></a>
            </div>

            <div class="card-body">
                @php
                    if (isset($result['original_name'])) {
                        $name = $result['original_name'];
                    } else if (isset($result['original_title'])) {
                        $name = $result['original_title'];
                    } else if (isset($result['name'])) {
                        $name = $result['name'];
                    } else {
                        $name = '';
                    }

                    if (isset($result['backdrop_path'])) {
                        $url = config('constants.imgUrl') . $result['backdrop_path'];
                    } else if (isset($result['poster_path'])) {
                        $url = config('constants.imgUrl') . $result['poster_path'];
                    } else {
                        $url = null;
                    }
                @endphp
                <div> 
                    <h3>{{ $name }}</h3>
                    @if ($url != null)
                        <img width="1000" height="600" src="{{ $url }}">
                    @else 
                        Sem capa disponível
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
