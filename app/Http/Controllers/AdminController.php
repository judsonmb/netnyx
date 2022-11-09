<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RentService;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $rents = (new RentService)->getRents();
        return view('rents', compact('rents'));
    }
}
