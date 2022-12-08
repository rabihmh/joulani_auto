<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
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
    public function store(VehicleRequest $request)
    {
//        $arry = [
//            "make_id" => null,
//            "mould_id" => null,
//            "fuel" => "deselec",
//            "gear" => "aut",
//            "payment_method" => "payment_method_types_pay1,payment_method_types_pay2,payment_method_types_pay3,payment_method_types_pay4",
//            "num_of_seats" => "s6",
//            "vehicle_status" => "usd",
//            "drivetrain_system" => "fbf",
//            "hp" => "5000",
//            "power" => "4000",
//            "mileage" => "3000",
//            "year_of_product" => "2019",
//            "price_type" => null,
//            "price" => "2000444444",
//            "body_color" => "#8fe813",
//            "interior_color" => "#5e3b18",
//            "extra_title" => null,
//            "oimg" => null,
//            "num_of_keys" => "kes3",
//            "ext_int_furniture" => "ext_int_furniture_leat",
//            "ext_int_sunroof" => "ext_int_sunroof_norm",
//            "ext_int_glass" => "ext_int_glass_egls,ext_int_glass_lsrd",
//            "ext_int_seats" => "ext_int_seats_clst,ext_int_seats_mast,ext_int_seats_spst",
//            "ext_int_screens" => "ext_int_screens_frsc,ext_int_screens_basc,ext_int_screens_blue,ext_int_screens_usb,ext_int_screens_ebph",
//            "ext_int_other" => "ext_int_other_eio2,ext_int_other_eio3",
//            "ext_int_steering" => "ext_int_steering_refi,ext_int_steering_stco",
//            "ext_ext_light" => "ext_ext_light_znon,ext_ext_light_fogl",
//            "ext_ext_mirrors" => "ext_ext_mirrors_limi,ext_ext_mirrors_clel",
//            "ext_ext_rims" => "ext_ext_rims_magn",
//            "ext_ext_sensors" => "ext_ext_sensors_blin,ext_ext_sensors_sele,ext_ext_sensors_sign,ext_ext_sensors_self",
//            "ext_ext_cameras" => "ext_ext_cameras_frnt,ext_ext_cameras_tsdc",
//            "ext_ext_other" => "ext_ext_other_sela,ext_ext_other_bump,ext_ext_other_hydr",
//            "ext_gen_other" => "ext_gen_other_fing,ext_gen_other_remo,ext_gen_other_ecos,ext_gen_other_serv",
//            "_token" => "PqkGPhj5NIzH1VbXxrkYSew665EKPNciTF1ZRp9b",
//        ];
//        return json_encode($arry);

        // return $request->all();
        $request->merge(['price_type' => 'unknown']);
        return Vehicle::create($request->all());

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

    public function uploadImage(Request $request)
    {
        $data = [];
        foreach ($request->file('file') as $file) {
            //$ext = $file->getClientOriginalExtension();
            $img = $file->store('uploads', 'public');
//            array_push($data, $img);
            $data[] = $img;
        }
        return $data;
    }
}
