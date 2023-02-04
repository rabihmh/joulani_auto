<?php

namespace App\Helpers;

class GetVehicleData
{
    public static function display($attributes)
    {

        if (is_null($attributes)) {
            return '-----------';
        }
        $attributes_array = explode(',', $attributes);
        $output = '';
        foreach ($attributes_array as $attribute) {
            $output .= '<label class="btn btn-light btn-sm">' . trans('vehicle.' . $attribute) . '</label>' . ' ';
        }
        return $output;
    }
}
