<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Services\RentService;
use Auth;

class RentController extends Controller
{
    public function show(Request $request, int $id, string $media)
    {
        $result = (new SearchService)->getMovieOrSerie($id, $media);
        return view(Auth::user()->role.'.rent', compact('result'));
    }

    public function rent(Request $request, int $id) 
    {
        $rented = (new RentService)->rent($id);
        if ($rented) {
            return view(Auth::user()->role.'.home')->with('success','Alugado com sucesso!');
        }
        return view(Auth::user()->role.'.home')->with('error','Ocorreu algum erro interno no servidor!');
    }
}
