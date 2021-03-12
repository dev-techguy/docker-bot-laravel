<?php

use App\Http\Controllers\API\ParamsController;
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

Route::get('sys/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::group([
    'prefix' => 'v1'
], function () {
    Route::get('params', [ParamsController::class, 'params']);
});
