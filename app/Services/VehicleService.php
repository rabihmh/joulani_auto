<?php

namespace App\Services;

use App\Models\Extra;
use App\Models\Vehicle;

class VehicleService
{
    public function create($vehicleData): Vehicle
    {
        $vehicle = Vehicle::create([
            'made_id' => $vehicleData['made_id'],
            'mould_id' => $vehicleData['mould_id'],
            'user_id' => 1,
            'fuel' => $vehicleData['fuel'],
            'gear' => $vehicleData['gear'],
            'payment_method' => $vehicleData['payment_method'],
            'num_of_seats' => $vehicleData['num_of_seats'],
            'vehicle_status' => $vehicleData['vehicle_status'],
            'drivetrain_system' => $vehicleData['drivetrain_system'],
            'hp' => $vehicleData['hp'],
            'power' => $vehicleData['power'],
            'mileage' => $vehicleData['mileage'],
            'year_of_product' => $vehicleData['year_of_product'],
            'price_type' => $vehicleData['price_type'],
            'price' => $vehicleData['price'],
            'body_color' => $vehicleData['body_color'],
            'interior_color' => $vehicleData['interior_color'],
            'extra_title' => $vehicleData['extra_title'],
            'oimg' => $vehicleData['oimg'],
            'num_of_keys' => $vehicleData['num_of_keys'],
        ]);

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
