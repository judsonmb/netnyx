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
        $rent->media_name = $this->getMediaName($mediaArray);
        $rent->media_img = $this->getMediaImgUrl($mediaArray);
        $rent->expire_at = Carbon::now()->addDays(2);
        return $rent->save();
    }

    public function getMediaName(array $mediaArray)
    {
        if (isset($mediaArray['original_name'])) {
            $name = $mediaArray['original_name'];
        } else if (isset($mediaArray['original_title'])) {
            $name = $mediaArray['original_title'];
        } else if (isset($mediaArray['name'])) {
            $name = $mediaArray['name'];
        } else {
            $name = null;
        }
        return $name;
    }

    public function getMediaImgUrl(array $mediaArray)
    {
        if (isset($mediaArray['poster_path'])) {
            $url = config('constants.imgUrl') . $mediaArray['poster_path'];
        } else if (isset($mediaArray['backdrop_path'])) {
            $url = config('constants.imgUrl') . $mediaArray['backdrop_path'];
        } else {
            $url = null;
        }
        return $url;
    }

    public function getRents()
    {
        return Rent::orderBy('created_at', 'DESC')->get();
    }
}
