<?php

use App\Http\Livewire\BotParams;
use App\Http\Livewire\CostList;
use Illuminate\Support\Facades\Auth;
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

Route::group([
    'prefix' => '/',
    'middleware' => ['auth:sanctum', 'verified']
], function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('params', BotParams::class)->name('bot.params');
    Route::get('cost', CostList::class)->name('cost.list');
});
