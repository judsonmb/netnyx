@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('search') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input type="text" 
                                   class="form-control @error('movie') is-invalid @enderror" 
                                   id="movie" name="movie" maxlength="255" 
                                   value="{{ $movie }}" 
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

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Resumo</th>
                                <th scope="col">Ano de lançamento</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results['results'] as $result)
                                @php 
                                    $url = '';
                                    if (isset($result['poster_path'])) {
                                        $url = config('constants.imgUrl') . $result['poster_path'];
                                    } else if (isset($result['backdrop_path'])) {
                                        $url = config('constants.imgUrl') . $result['backdrop_path'];
                                    } else {
                                        $url = null;
                                    }
                                    
                                    if (isset($result['original_name'])) {
                                        $name = $result['original_name'];
                                    } else if (isset($result['original_title'])) {
                                        $name = $result['original_title'];
                                    } else if (isset($result['name'])) {
                                        $name = $result['name'];
                                    } else {
                                        $name = '';
                                    }
                                    
                                    $resume = '';
                                    if (isset($result['overview'])) {
                                        $resume = $result['overview'];
                                    } 

                                    $date = '';
                                    if (isset($result['first_air_date'])) {
                                        $date = $result['first_air_date'];
                                    } else if (isset($result['release_date'])) {
                                        $date = $result['release_date'];
                                    }
                                    $year = explode('-', $date)[0];
                                @endphp
                                <tr>
                                    <th scope="row">
                                        @if ($url != null)
                                            <img width="150" height="210" src="{{ $url }}">
                                        @else 
                                            Sem imagem disponível
                                        @endif
                                    </th>
                                    <td>{{ $name }}</td>
                                    <td>{{ $resume }}</td>
                                    <td>{{ $year }}</td>
                                    
                                    @if ($result['media_type'] != 'person')
                                        <td><a href="{{ route('details', [$result['id'],$result['media_type']]) }}"><button type="button" class="btn btn-primary">Alugar</button></a></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($results['total_pages'] > 1)
                    <div class="card-footer" style="max-width: 100%; overflow: scroll;">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                @if ($results['page'] > 1) 
                                    <li class="page-item"><a class="page-link" href="{{ route('search', [$movie, $results['page']-1]) }}">Anterior</a></li>
                                @endif
                                @for ($i = 1; $i <= $results['total_pages']; $i++)
                                    <li class="page-item"><a class="page-link" href="{{ route('search', [$movie, $i]) }}">{{ $i }}</a></li>
                                @endfor
                                @if ($results['page']+1 < $results['total_pages']) 
                                    <li class="page-item"><a class="page-link" href="{{ route('search', [$movie, $results['page']+1]) }}">Próxima</a></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
