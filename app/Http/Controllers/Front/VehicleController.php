<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Models\Made;
use App\Models\Mould;
use App\Models\User;
use App\Models\Vehicle;
use App\Queries\VehicleQuery;
use App\Services\VehicleService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Traits\ImageDeleteTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class VehicleController extends Controller
{
    use ImageDeleteTrait;

    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $mades = Made::all();
        $vehicles = Vehicle::query()->with(['made:id,name', 'mould:id,name'])->paginate(9);
        return view('front.vehicles.index', compact('mades', 'vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $mades = Made::select(['id', 'name', 'image'])->take(18)->get();
        return view('front.vehicles.create', compact('mades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VehicleRequest $request, VehicleService $vehicleService)
    {
        $vehicleService->createVehicle($request->all());
        return redirect()->route('front.home')->with('success', __('تم اضافة السيارة بنجاح'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public
    function show($id)
    {
        $vehicle = Vehicle::with('extra', 'seller:id,seller_name,seller_mobile')->findOrFail($id);
        //   return $vehicle;
        return view('front.vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
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
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::query()->findOrFail($id);
        $this->deleteImage($vehicle->oimg);
        $vehicle->delete();
        return response()->json('delete');
    }

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $filters = $request->all();
        $vehicles = VehicleQuery::getFilteredVehicles($filters);
        $moulds = Mould::query()->where('made_id', $filters['makes'])->with('children')->get();
        return response()->json([$vehicles, $moulds], 200);

    }

    public function compare(Request $request)
    {
        try {
            $first_vehicle = Vehicle::query()->with('extra')->findOrFail($request->input('car1'));
            $second_vehicle = Vehicle::query()->with('extra')->findOrFail($request->input('car2'));
            return view('front.vehicles.compare', compact('first_vehicle', 'second_vehicle'));
        } catch (ModelNotFoundException $e) {
            return back()->with('لم يتم العثور على المركبة');
        }

    }
}
