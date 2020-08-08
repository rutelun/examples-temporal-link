<?php

use App\Http\Controllers\TemporalLinkController;
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

Route::get('temporal-links/{link:link}', [TemporalLinkController::class, 'get'])->name('link');

Route::get('secret', function () {
    return 'test';
})->name('secret');
