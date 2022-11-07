@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de aluguéis</div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Quem alugou</th>
                                <th scope="col">Aluguel</th>
                                <th scope="col">Expiração</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rents as $rent)
                                <tr>
                                    <th scope="row">
                                        @if ($rent->media_img != null)
                                            <img width="150" height="210" src="{{ $rent->media_img }}">
                                        @else 
                                            Sem imagem disponível
                                        @endif
                                    </th>
                                    <td>{{ $rent->media_name }}</td>
                                    <td>{{ $rent->user->name }}</td>
                                    <td>{{ Carbon\Carbon::parse($rent->created_at)->format('d/m/Y H:i:s') }}</td>
                                    <td>{{ Carbon\Carbon::parse($rent->expire_at)->format('d/m/Y H:i:s') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
