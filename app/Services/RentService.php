<?php

namespace App\Services;

use App\Models\Rent;
use Auth;
use Carbon\Carbon;

class RentService
{
    public function rent(int $id, array $mediaArray)
    {
        $rent = new Rent();
        $rent->user_id = Auth::user()->id;
        $rent->media_id = $id;
        $rent->media_name = getMediaName($mediaArray);
        $rent->media_img = getMediaPosterUrl($mediaArray);
        $rent->expire_at = Carbon::now()->addDays(2);
        return $rent->save();
    }

    public function getRents()
    {
        return Rent::orderBy('created_at', 'DESC')->get();
    }
}
