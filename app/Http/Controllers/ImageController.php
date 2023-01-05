<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        $data = [];
        foreach ($request->file('file') as $file) {

            $img = $file->store('uploads/sellers', 'public');
            $data[] = $img;
        }
        return $data;
    }
}










