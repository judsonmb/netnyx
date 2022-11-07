<?php

namespace App\Services;

use App\Models\Rent;
use Auth;
use Carbon\Carbon;

class RentService
{
    public function rent(int $id, array $movieOrSerie)
    {
        $rent = new Rent();
        $rent->user_id = Auth::user()->id;
        $rent->media_id = $id;
        $name = '';
        if (isset($movieOrSerie['original_name'])) {
            $name = $movieOrSerie['original_name'];
        } else if (isset($movieOrSerie['original_title'])) {
            $name = $movieOrSerie['original_title'];
        } else if (isset($movieOrSerie['name'])) {
            $name = $movieOrSerie['name'];
        } 
        $rent->media_name = $name;
        $img = '';
        if (isset($movieOrSerie['poster_path'])) {
            $img = $movieOrSerie['poster_path'];
        }
        else if (isset($movieOrSerie['backdrop_path'])) {
            $img = $movieOrSerie['backdrop_path'];
        }
        $url = ($img != '') ? "https://image.tmdb.org/t/p/original$img" : null;
        $rent->media_img = $url;
        $rent->expire_at = Carbon::now()->addDays(2);
        return $rent->save();
    }

    public function getRents()
    {
        return Rent::orderBy('created_at', 'DESC')->get();
    }
}
