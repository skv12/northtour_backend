<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TourController;
use App\Http\Controllers\Api\TourScheduleController;
use App\Http\Controllers\Api\TourTypeController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('/user/{id}', function(Request $request, $id){
//     $user = \App\Models\User::find($id);
//     if($user) return response('', 404);
//     return $user;
// })
Route::apiResources([
    'v1/tours' => TourController::class,
    'v1/tours/{id}/schedule' => TourScheduleController::class,
    'v1/tourtypes' => TourTypeController::class,
]);