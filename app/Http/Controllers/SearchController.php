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
        $this->middleware('customer');
        $this->service = new SearchService();
    }

    public function search(SearchRequest $request, string $movie = "a", int $page = 1) 
    {
        $movie = $request->movie ?? $movie;
        $results = $this->service->searchMovieOrSerie($movie, $page);
        return view('results', compact('results', 'movie'));
    }
}
