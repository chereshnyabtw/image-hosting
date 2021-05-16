<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if(!$request->hasFile('image'))
            return redirect(route('upload'))->withErrors(['Not valid file']);

        $file = $request->file('image');

        $path = $file->store('public');

        $objectFields = [
            'title' => $request->input('file_title'),
            'user_id' => Auth::id(),
            'path' => $path
        ];

        $image = Image::create($objectFields);

        return redirect(route('image', $image->id));
    }
}
