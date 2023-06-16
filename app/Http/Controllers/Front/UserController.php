<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\Subscription;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user()->load('seller');
        $region = null;
        if ($user->seller !== null)
            $region = Region::query()->select('id', 'name')->where('id', $user->seller->region_id)->first();
        return view('front.user.editProfile', compact('user', 'region'));
    }

    public function vehicles(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user_id = Auth::id();
        $vehicles = Vehicle::query()->where('user_id', $user_id)->get();
        return view('front.user.userDashboard', compact('vehicles'));
    }

    public function subscriptions(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $subscriptions = Subscription::query()->with(['plan', 'method'])->where('user_id', Auth::id())->orderBy('id','Desc')->get();
        return view('front.user.subscriptions', compact('subscriptions'));
    }

}
