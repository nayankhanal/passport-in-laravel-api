<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CitizenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('countries', CountryController::class);
// Route::resource('cities', CityController::class);
Route::resource('citizens', CitizenController::class);

Route::get('cities/{country}', [CitizenController::class, 'get_cities'])->name('getCities');


