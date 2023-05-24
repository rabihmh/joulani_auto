<?php

namespace App\Traits\Image;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageUploadTrait
{
    public function uploadImage(Request $request, $folder, $vehicle_id = null): array
    {
        $data = [];
        $disk = 'public';

        if ($vehicle_id) {
            $vehicle = Vehicle::find($vehicle_id);
            if (!$vehicle) {
                return ['error' => 'Vehicle not found'];
            }

            $oimg = $vehicle->oimg;
            if (!$oimg) {
                return ['error' => 'Vehicle does not have any images'];
            }

            $paths = explode(',', $oimg);
            $firstImagePath = $paths[0];
            $path = dirname($firstImagePath) . '/';
        } else {
            if ($folder == 'vehicles') {
                $new_folder = Str::random(6);
                $path = "uploads/{$folder}/{$new_folder}/";
                Storage::disk($disk)->makeDirectory($path);
            } else {
                $path = "uploads/{$folder}/";
            }
        }

        try {
            foreach ($request->file('file') as $file) {
                $name = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $img = $file->storeAs($path, $name, $disk);
                $data[] = $img;
            }
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }

        return $data;
    }

}
