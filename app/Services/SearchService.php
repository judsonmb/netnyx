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

    public function searchMovieOrSerie(array $data)
    {
        $token = $this->getToken();
    }
}