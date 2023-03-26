<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;

class HomeController extends Controller
{
    public function home(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $vehicles = Vehicle::query()->select('vehicles.*', 'made.name as made_name', 'mould.name as mould_name')
            ->join('mades as made', 'vehicles.made_id', '=', 'made.id')
            ->join('moulds as mould', 'vehicles.mould_id', '=', 'mould.id')->orderByDesc('created_at')
            ->get()->take(12);

        $specials = Vehicle::query()->select('vehicles.*', 'made.name as made_name', 'mould.name as mould_name')
            ->join('mades as made', 'vehicles.made_id', '=', 'made.id')
            ->join('moulds as mould', 'vehicles.mould_id', '=', 'mould.id')
            ->where('vehicles.is_special', '=', 1)
            ->get()->take(9);
        // Lazy load the `made` and `mould` relationships for all vehicles
        $vehicles->loadMissing('made', 'mould');
        return view('front.home', compact('vehicles', 'specials'));


    }
}
