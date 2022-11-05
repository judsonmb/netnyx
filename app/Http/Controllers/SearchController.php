<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    public function doSearch(SearchRequest $request) 
    {
        dd('aqui inicia a busca');
    }
}
