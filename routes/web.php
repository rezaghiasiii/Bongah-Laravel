<?php

use App\Http\Controllers\BannersController;
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

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::resource('banners', BannersController::class);

Route::get('{zip}/{street}', [BannersController::class,'show']);
Route::post('{zip}/{street}/photos', [BannersController::class,'addPhotos'])->name('store_photo_path');
