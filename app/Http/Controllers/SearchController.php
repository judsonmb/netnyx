<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Services\SearchService;
use Auth;

class SearchController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new SearchService();
    }

    public function doSearch(SearchRequest $request) 
    {
        $results = $this->service->searchMovieOrSerie($request->all());
        return view(Auth::user()->role.'.search-results', compact('results'));
    }
}
