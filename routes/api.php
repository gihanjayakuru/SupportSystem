<?php

use App\Http\Controllers\DApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\V1\TicketsController;

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

// Route::group([
//     'namespace' => 'App\Http\Controllers\API\V1',
//     'prefix' => 'v1',
// ], function() {
//     Route::post('/tickets', 'TicketsController@store');
// });

// Route::controller(TicketsController::class)->group(function (){
//     Route::post('/tickets',  'store');
// });

Route::get('/tickets', [TicketsController::class,'list']);

Route::group([
    'namespace' => 'App\Http\Controllers\API\V1',
    'prefix' => 'v1',
], function() {
    Route::post('/tickets', [TicketsController::class, 'store']);
    Route::get('/tickets', [TicketsController::class, 'show']);
    Route::get('/tickets', [TicketsController::class, 'index']);
    Route::get('/tickets/{ref}', [TicketsController::class,'search']);
});

// Route::get('/tickets', [TicketsController::class, 'getData']);

// Route::get("data",[DApi::class, 'getData']);