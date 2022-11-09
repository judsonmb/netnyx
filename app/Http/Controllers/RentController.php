<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Services\RentService;
use Auth;

class RentController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
    }

    public function show(Request $request, int $id, string $media)
    {
        $result = (new SearchService)->getMovieOrSerie($id, $media);
        return view('rent', compact('result','media'));
    }

    public function rent(Request $request, int $id, string $media) 
    {
        $movieOrSerie = (new SearchService)->getMovieOrSerie($id, $media);
        $rented = (new RentService)->rent($id, $movieOrSerie);
        if ($rented) {
            return view('home')->with('success','Alugado com sucesso!');
        }
        return view('home')->with('error','Ocorreu algum erro interno no servidor!');
    }
}
