<?php

use App\Http\Controllers\Api\V1\AttractionController;
use App\Http\Controllers\Api\V1\HotelController;
use App\Http\Resources\V1\HotelResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'prefix' => 'v1',

], function () {
    Route::apiResource('/attractions', AttractionController::class);
    Route::apiResource('/hotels', HotelController::class);
});
