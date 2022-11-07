<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SearchService;
use Auth;

class RentController extends Controller
{
    public function show(Request $request, int $id, string $media)
    {
        $result = (new SearchService)->getMovieOrSerie($id, $media);
        return view(Auth::user()->role.'.rent', compact('result'));
    }
}
