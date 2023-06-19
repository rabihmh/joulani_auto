<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $sellers = Seller::query()->with('region:id,name')->withCount('vehicles')->get();

        return view('front.seller.index', compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }


    public function show($id)
    {
        $seller = Seller::query()->with('vehicles')->findOrFail($id);
        return view('front.seller.show', compact('seller'));
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSellers(Request $request)
    {
        $title = $request->input('title');
        $city = $request->input('city');

        if (empty($title) && empty($city)) {
            return response()->json([], Response::HTTP_OK);
        }

        $cities = $city ? explode(',', $city) : [];

        $sellers = Seller::query()
            ->when($title, function ($query, $title) {
                return $query->where('seller_name', 'LIKE', "%{$title}%");
            })
            ->when($cities, function ($query, $cities) {
                return $query->whereIn('region_id', $cities);
            })
            ->with('region:id,name')
            ->withCount('vehicles')
            ->get();

        return response()->json($sellers, Response::HTTP_OK);
    }

    public function addLocationSeller(Request $request): \Illuminate\Http\JsonResponse
    {
        $seller = Auth::user()->seller;
        $lat = $request->post('latitude');
        $long = $request->post('longitude');
        $seller->update([
            'location' => DB::raw("POINT({$long}, {$lat})")
        ]);
        $seller->save();

        return response()->json([
            'success' => 'تم اضافة بنجاح'
        ]);

    }
}
