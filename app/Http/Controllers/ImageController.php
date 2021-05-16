<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{
    public function getImages()
    {
        $images = Image::latest()->where('user_id', Auth::id())->take(10)->get();
        return view('profile', ['images' => $images]);
    }

    public function getImage($id)
    {
        $image = Image::whereId($id)->first();
        $url = Storage::url($image->path);

        $author = User::whereId($image->user_id)->first();

        return view('image', ['url' => $url, 'title' => $image->title, 'author' => $author->username]);
    }
}
