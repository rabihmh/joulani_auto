<?php

namespace App\Traits\Image;

use Illuminate\Support\Facades\Storage;

trait DeleteAllImageTrait
{
    public function deleteAll($folder): void
    {
        if (Storage::disk('public')->exists($folder))
            Storage::disk('public')->deleteDirectory($folder);
    }

}
