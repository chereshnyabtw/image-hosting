<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UploadController;
use App\Http\Middleware\AnonymousAuthentication;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function() {
    Route::get('/', [ImageController::class, 'getImages'])->name('home');
    Route::get('/upload', function () {
        return view('upload');
    })->name('upload');

    Route::post('/upload', [UploadController::class, 'upload']);
});

Route::middleware(AnonymousAuthentication::class)->group(function() {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::get('/register', function () {
        return view('register');
    })->name('register');


    Route::post('/login', [AuthenticationController::class, 'login']);

    Route::post('/register', [AuthenticationController::class, 'register']);
});


Route::get('/image/{id}', [ImageController::class, 'getImage'])->name('image');
