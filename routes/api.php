<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\V1\HotelResource;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\HotelController;
use App\Http\Controllers\Api\V1\FavoriteController;
use App\Http\Controllers\Api\V1\AttractionController;
use App\Http\Controllers\Api\V1\RestaurantController;

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

//Auth Routes
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

// App Routes
Route::group([
    // 'middleware' => 'jwt.verify',
    'prefix' => 'v1',

], function () {
    Route::apiResource('/attractions', AttractionController::class);
    Route::apiResource('/restaurants', RestaurantController ::class);
    Route::apiResource('/hotels', HotelController::class);
});


Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'v1',

], function () {
    Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    // Route::apiResource('/favorites', FavoriteController::class);

});
