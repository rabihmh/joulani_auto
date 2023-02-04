<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Models\Made;
use App\Models\Vehicle;
use App\Services\VehicleService;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{

    public function index()
    {
        $vehicles = Vehicle::with(['user:id,name', 'made:id,name', 'mould:id,name'])->paginate();
        //return $vehicles;
        return view('admin.vehicles.index', compact('vehicles'));
    }


    public function create()
    {
        $mades = Made::all();
        return view('admin.vehicles.create', compact('mades'));
    }

    public function store(VehicleRequest $request, VehicleService $vehicleService)
    {

        for ($i = 1; $i < 20; $i++) {
            $vehicleService->create($request->all());
        }
        return redirect('admin/dashboard')->with('success', 'تم اضافة السيارة بنجاح');
    }

    public function show(Vehicle $vehicle)
    {
        $images = preg_split('/\,/', $vehicle->oimg);
        return view('admin.vehicles.show', [
            'images' => $images,
            'vehicle' => $vehicle
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function setMainImage(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->update([
            'main_image' => $request->image]);
        return true;
    }


}
