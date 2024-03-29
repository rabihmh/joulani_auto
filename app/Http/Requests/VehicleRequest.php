<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'made_id' => 'required',
            'mould_id' => 'required',
            'gear' => 'required',
            'hp' => 'required',
            'power' => 'required',
            'mileage' => 'required',
            'price' => 'required',
            'fuel' => 'required',
            'num_of_seats' => 'required',
            'payment_method' => 'required',
            'vehicle_status' => 'required',
            'drivetrain_system' => 'required',
            'body_color' => 'required',
            'interior_color' => 'required',
//            'extra_title' => 'required',
            'num_of_keys' => 'required',
            'year_of_product' => 'required',
            'oimg' => 'required',
            'ext_int_furniture' => 'nullable',
            'ext_int_sunroof' => 'nullable',
            'ext_int_glass' => 'nullable',
            'ext_int_seats' => 'nullable',
            'ext_int_screens' => 'nullable',
            'ext_int_other' => 'nullable',
            'ext_int_steering' => 'nullable',
            'ext_ext_light' => 'nullable',
            'ext_ext_mirrors' => 'nullable',
            'ext_ext_rims' => 'nullable',
            'ext_ext_sensors' => 'nullable',
            'ext_ext_cameras' => 'nullable',
            'ext_ext_other' => 'nullable',
            'ext_gen_other' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'price.required'=>'يرجى ادخال السعر'
        ];
    }
}
