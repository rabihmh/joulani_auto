<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $plans = Plan::all();
        return view('front.plans.index', compact('plans'));
    }
}
