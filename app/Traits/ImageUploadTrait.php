<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ImageUploadTrait
{
    public function uploadImage(Request $request, $folder): array
    {
        $data = [];
        $i = 0;
        foreach ($request->file('file') as $file) {
            ++$i;
            $extension = $file->getClientOriginalExtension();
            $name = $i . '_' . time() . '.' . $extension;
            $img = $file->storeAs("uploads/{$folder}", $name, 'public');
            $data[] = $img;
        }
        return $data;
    }
}
