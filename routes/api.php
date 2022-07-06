<?php

namespace App\Http\Controllers;

use App\Models\Placetype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

// Places
Route::get('places', [PlaceController::class, 'index']);
Route::post('places', [PlaceController::class, 'store']);

// placetypes
Route::get('place-types', [PlacetypeController::class, 'index']);

// Review
Route::post('review', [ReviewController::class, 'store']);

// Town
Route::get('towns', [TownController::class, 'index']);
