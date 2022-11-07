<?php

namespace App\Services;

use App\Models\Rent;
use Auth;
use Carbon\Carbon;

class RentService
{
    public function rent(int $id)
    {
        $rent = new rent();
        $rent->user_id = Auth::user()->id;
        $rent->media_id = $id;
        $rent->expire_at = Carbon::now()->addDays(2);
        return $rent->save();
    }
}
