<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\DeviceController;
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

Route::middleware('auth:api')->prefix('v1')->group(function() {
    Route::get('/user', function(Request $request){
        return $request->user();
    });

    // Route::get('/recipes/{id}', [RecipeController::class, 'show']);
    // Route::get('/recipes', [RecipeController::class, 'index']);

    Route::apiResource('/recipes', RecipeController::class);
    Route::apiResource('/devices', DeviceController::class);
});
