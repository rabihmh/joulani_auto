<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Contracts\View\View;

class PlansController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $plans = Plan::all();
        return view('front.plans.index', compact('plans'));
    }
}
