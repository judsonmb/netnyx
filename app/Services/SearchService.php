<?php

namespace App\Services;
use Http;

class SearchService
{
    public function searchMovieOrSerie(string $movie, int $page)
    {
        $url = config('constants.apiUrl') . "/search/multi?api_key=".config('constants.apiKey')."&query=$movie&page=$page";
        return Http::get($url)->json();
    }

    public function getMovieOrSerie(int $id, string $media)
    {
        $url = config('constants.apiUrl') . "/$media/$id?api_key=".config('constants.apiKey')."&language=en-US";
        return Http::get($url)->json();
    }
}
