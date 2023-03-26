<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $vehicles = Vehicle::query()->where('user_id', $user_id)->get();
        return view('front.user.userDashboard', compact('vehicles'));
    }
}
