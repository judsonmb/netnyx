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

    public function doSearch(SearchRequest $request, string $movie, int $page = 1) 
    {
        $results = $this->service->searchMovieOrSerie($request->all(), $movie, $page);
        $movie = $request->movie ?? $movie;
        return view(Auth::user()->role.'.search-results', compact('results', 'movie'));
    }
}
