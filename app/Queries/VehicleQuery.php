<?php

namespace App\Queries;

use App\Models\Vehicle;

class VehicleQuery
{
    public static function getFilteredVehicles($filters)
    {
        $query = Vehicle::query()
            ->select(['id', 'made_id', 'mould_id', 'hp', 'power', 'mileage', 'fuel', 'main_image', 'price', 'gear', 'year_of_product']);

        if (isset($filters['makes'])) {
            $makes = explode(',', $filters['makes']);
            $query->whereIn('made_id', $makes);
        }

        if (isset($filters['model'])) {
            $models = explode(',', $filters['model']);
            $query->whereIn('mould_id', $models);
        }


        if (!empty($filters['price'])) {
            $price_range = explode(',', $filters['price']);
            if (count($price_range) == 2) {
                $query->whereBetween('price', $price_range);
            }
        }

        if (!empty($filters['fuel'])) {
            $fuels = explode(',', $filters['fuel']);
            $query->whereIn('fuel', $fuels);
        }

        if (!empty($filters['gear'])) {
            $gears = explode(',', $filters['gear']);
            $query->whereIn('gear', $gears);
        }

        if (!empty($filters['made_from'])) {
            $year_from = intval($filters['made_from']);
            $query->where('year_of_product', '>=', $year_from);
        }

        if (!empty($filters['made_to'])) {
            $year_to = intval($filters['made_to']);
            $query->where('year_of_product', '<=', $year_to);
        }


        $vehicles = $query->get()->map(function ($vehicle) {
            return [
                'id' => $vehicle->id,
                'made_id' => $vehicle->made_id,
                'mould_id' => $vehicle->mould_id,
                'hp' => $vehicle->hp,
                'power' => $vehicle->power,
                'mileage' => $vehicle->mileage,
                'fuel' => __('vehicle.' . $vehicle->fuel),
                'main_image' => $vehicle->main_image,
                'price' => $vehicle->price,
                'gear' => __('vehicle.' . $vehicle->gear),
                'year_of_product' => $vehicle->year_of_product,
                'vehicle_name' => $vehicle->vehicle_name,
            ];
        });

        return $vehicles;


    }
}
