<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RentService;

class AdminController extends Controller
{
    public function index()
    {
        $rents = (new RentService)->getRents();
        return view('admin.admin', compact('rents'));
    }
}
