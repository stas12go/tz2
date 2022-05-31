<?php

use App\Http\Controllers\StatsController;
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
})->name('welcome');

Route::get('/gathering', [StatsController::class, 'gathering'])->name('gathering');
Route::patch('/stats/store', [StatsController::class, 'store']);
Route::get('/stats/{user}', [StatsController::class, 'show'])->middleware('auth')->name('stats');

require __DIR__ . '/auth.php';
