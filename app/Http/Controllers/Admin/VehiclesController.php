<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Made;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $mades = Made::all();
        return view('admin.vehicles.create', compact('mades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'made_id' => 'required',
            'mould_id' => 'required',
            'gear' => 'required|',
            'power' => 'required|',
            'hp' => 'required',
            'mileage' => 'required|',
            'price' => 'required',
            'fuel' => 'required',
            'year_of_production' => 'required',
            'images' => 'required|file'
        ]);
        $data = $request->except('images');
        $folder = time() . 'time';
        Storage::disk('public')->makeDirectory("uploads/vehicles/{$folder}");
        $data['image'] = "uploads/vehicles/{$folder}";
        $vehicle = Vehicle::create($data);
        foreach ($request->file('images') as $image) {
            $image->store("uploads/vehicles/{$folder}", 'public');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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
}
