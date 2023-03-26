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
        $vehicles = Vehicle::query()->withoutGlobalScope('active')->with(['user:id,name', 'made:id,name', 'mould:id,name'])->paginate();
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
        $vehicleService->create($request->all());
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

    public function updateStatus(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $vehicle = Vehicle::query()->where('id', $id)->first();
        $status = $request->get('status');
        if (!$vehicle) {
            return response()->json([
                'message' => 'Not Found'
            ], 404);
        }
        $vehicle->update([
            'status' => $status
        ]);
        $message = $status == 'active' ? 'تم التفعيل بنجاح' : 'تم الغاء التفعيل بنجاح';
        return response()->json([
            'message' => $message,
        ], 202);
    }

    public function updateSpecial(Request $request, $id)
    {
        $vehicle = Vehicle::query()->where('id', $id)->first();
        $special = $request->get('special');
        if (!$vehicle) {
            return response()->json([
                'message' => 'Not Found'
            ], 404);
        }
        $vehicle->update([
            'is_special' => (bool)$special
        ]);
        $message = $special == 1 ? 'تم التعيين ك مميزة' : 'تم الغاء التعيين بنجاح';
        return response()->json([
            'message' => $message,
        ], 202);

    }


}
