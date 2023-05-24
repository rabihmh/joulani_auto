<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
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

    public function subscriptions()
    {
        return view('front.user.subscriptions');
    }
//
//    public function editProfile(Request $request)
//    {
//        return $request->all();
//
//    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
