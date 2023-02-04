<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadImage(Request $request, $folder)
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










