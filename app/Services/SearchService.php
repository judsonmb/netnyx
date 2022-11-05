<?php

namespace App\Services;
use Http;

class SearchService
{
    public function getToken()
    {
        $url = config('constants.apiUrl') . '/authentication/token/new?api_key='.config('constants.apiKey');
        $response = Http::get($url);
        return $response->json()['request_token'];
    }

    public function searchMovieOrSerie(array $data, string $movie, int $page)
    {
        $token = $this->getToken();
        $query = $data['movie'] ?? $movie;
        $url = config('constants.apiUrl') . "/search/multi?api_key=".config('constants.apiKey')."&query=$query&page=$page";
        return Http::get($url)->json();
    }
}
