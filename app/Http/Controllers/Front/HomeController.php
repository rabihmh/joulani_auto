<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;

class HomeController extends Controller
{
    public function home()
    {
        $vehicles = Vehicle::with(['user', 'made', 'mould'])->get();
        return view('front.home', compact('vehicles'));
    }
}
