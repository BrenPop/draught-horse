<?php

use App\Http\Controllers\Api\V1\AddressController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('address')->group(function () {
    Route::get('/get-countries', [AddressController::class, 'getCountries'])->name('api.address.get-countries');
    Route::get('/get-provinces/{countryId}', [AddressController::class, 'getProvincesByCountry'])->name('api.address.get-provinces');
    Route::get('/get-cities/{provinceId}', [AddressController::class, 'getCitiesByProvince'])->name('api.address.get-cities');
});
