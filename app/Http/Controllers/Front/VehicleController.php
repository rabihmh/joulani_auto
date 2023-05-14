<?php

namespace App\Http\Controllers\Front;

use App\Events\VehicleCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Models\Made;
use App\Models\Mould;
use App\Models\Vehicle;
use App\Queries\VehicleQuery;
use App\Services\VehicleService;
use App\Traits\Image\ImageDeleteTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class VehicleController extends Controller
{
    use ImageDeleteTrait;

    private VehicleService $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    public function index(Request $request)
    {
        $mades = Made::all();
        $vehicles = Vehicle::with('made:id,name', 'mould:id,name')->paginate(9);
        return view('front.vehicles.index', compact('mades', 'vehicles'));
    }

    public function create()
    {
        if (Auth::user()->user_type === 'buyer')
            abort(403);
        if (Gate::denies('vehicles.create'))
            return redirect()->route('front.plans.index');
        $mades = Made::select(['id', 'name', 'image'])->take(18)->get();
        return view('front.vehicles.create', compact('mades'));
    }

    public function store(Request $request)
    {
        Gate::authorize('vehicles.create');
        $vehicle = $this->vehicleService->createVehicle($request->all());
        event(new VehicleCreated($vehicle));
        return redirect()->route('front.home')->with('success', __('تم اضافة السيارة بنجاح'));
    }

    public function show($id)
    {
        Gate::authorize('vehicles.view');
        $vehicle = Vehicle::with('extra', 'seller:id,seller_name,seller_mobile')->findOrFail($id);
        return view('front.vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        Gate::authorize('vehicles.edit');

        $mades = Made::query()->select(['id', 'name', 'image'])->get();
        return view('front.vehicles.edit', compact('vehicle', 'mades'));
    }

    public function update(VehicleRequest $request, $id)
    {
        Gate::authorize('vehicles.edit');
        $this->vehicleService->updateVehicle($request->all(), $id);
        return redirect()->route('front.user.dashboard')->with('success', __('تم تعديل  بنجاح'));
    }

    public function destroy($id)
    {
        Gate::authorize('vehicles.delete');
        $vehicle = Vehicle::query()->findOrFail($id);
        $this->deleteImage($vehicle->oimg);
        $vehicle->delete();
        return response()->json('delete');
    }

    public function search(Request $request)
    {
        $filters = $request->all();
        $vehicles = VehicleQuery::getFilteredVehicles($filters);
        $moulds = Mould::query()->where('made_id', $filters['makes'])->with('children')->get();
        return response()->json([$vehicles, $moulds], 200);
    }

    public function compare(Request $request)
    {
        try {
            $first_vehicle = Vehicle::with('extra')->findOrFail($request->input('car1'));
            $second_vehicle = Vehicle::with('extra')->findOrFail($request->input('car2'));
            return view('front.vehicles.compare', compact('first_vehicle', 'second_vehicle'));
        } catch (ModelNotFoundException $e) {
            return back()->with('لم يتم العثور على المركبة');
        }
    }
}
