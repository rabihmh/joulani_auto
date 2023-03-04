<?php

namespace App\Services;

use App\Models\Extra;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

class VehicleService
{
    public function createVehicle(array $vehicleData): Vehicle
    {
        $user = Auth::guard('web')->user();
        $seller = $user->seller;
        $vehicleData = array_merge($vehicleData, [
            'user_id' => $user->id,
            'seller_id' => $seller->id,
        ]);
        $vehicle = Vehicle::create($vehicleData);
        Extra::create([
            'vehicle_id' => $vehicle->id,
            'ext_int_furniture' => $vehicleData['ext_int_furniture'],
            'ext_int_sunroof' => $vehicleData['ext_int_sunroof'],
            'ext_int_glass' => $vehicleData['ext_int_glass'],
            'ext_int_seats' => $vehicleData['ext_int_seats'],
            'ext_int_screens' => $vehicleData['ext_int_screens'],
            'ext_int_other' => $vehicleData['ext_int_other'],
            'ext_int_steering' => $vehicleData['ext_int_steering'],
            'ext_ext_light' => $vehicleData['ext_ext_light'],
            'ext_ext_mirrors' => $vehicleData['ext_ext_mirrors'],
            'ext_ext_rims' => $vehicleData['ext_ext_rims'],
            'ext_ext_sensors' => $vehicleData['ext_ext_sensors'],
            'ext_ext_cameras' => $vehicleData['ext_ext_cameras'],
            'ext_ext_other' => $vehicleData['ext_ext_other'],
            'ext_gen_other' => $vehicleData['ext_gen_other'],
        ]);
        return $vehicle;
    }
}
