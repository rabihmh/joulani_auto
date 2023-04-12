<?php

namespace App\Traits\Image;

use Illuminate\Support\Facades\Storage;

trait ImageDeleteTrait
{
    public function deleteImage($images): void
    {
        $images = explode(',', $images);
        foreach ($images as $image) {
            if (Storage::disk('public')->exists($image)) {
                Storage::disk('public')->delete($image);
            }
        }
    }

}
