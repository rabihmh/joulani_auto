<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Traits\Image\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    use ImageUploadTrait;

    public function edit(Request $request, $id)
    {
        $image = $request->get('img');
        $vehicle = Vehicle::query()->where('id', $id)->first();
        $images = $vehicle->oimg;
        $image_paths = explode(',', $images);

        foreach ($image_paths as $key => $img_path) {
            if ($image == $img_path) {
                unset($image_paths[$key]);
                Storage::disk('public')->delete($img_path);;
            }
        }

        $new_images = implode(',', $image_paths);
        $vehicle->oimg = $new_images;
        $vehicle->save();

        // Return a JSON response with the updated list of images if an image was deleted successfully
        if ($images !== $new_images) {
            return response()->json(['images' => $new_images, 'deleted' => true]);
        }

        // Otherwise, return a JSON response indicating that no image was deleted
        return response()->json(['deleted' => false]);
    }

}










