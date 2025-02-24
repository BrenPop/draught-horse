<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Bar\BarController;
use App\Http\Controllers\Drinker\DrinkerController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'userType.Access:admin,bar-owner,drinker'])->name('dashboard');

Route::get('/search', [SearchController::class, 'search'])->name('search');

/** User Profile */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/** Admin routes */
Route::prefix('admin')->middleware(['auth', 'verified', 'userType.Access:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/{id}', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

/** Bar routes */
Route::prefix('bar')->middleware(['auth', 'verified', 'userType.Access:admin,bar-owner'])->group(function () {
    Route::get('/', [BarController::class, 'index'])->name('bar.index');
    Route::get('/create', [BarController::class, 'create'])->name('bar.create');
    Route::post('/', [BarController::class, 'store'])->name('bar.store');
    Route::get('/{id}', [BarController::class, 'show'])->name('bar.show');
    Route::get('/{id}/edit', [BarController::class, 'edit'])->name('bar.edit');
    Route::put('/{id}', [BarController::class, 'update'])->name('bar.update');
    Route::delete('/{id}', [BarController::class, 'destroy'])->name('bar.destroy');
});

/** Drinker routes */
Route::prefix('drinker')->middleware(['auth', 'verified', 'userType.Access:admin,drinker'])->group(function () {
    Route::get('/', [DrinkerController::class, 'index'])->name('drinker.index');
    Route::get('/create', [DrinkerController::class, 'create'])->name('drinker.create');
    Route::post('/', [DrinkerController::class, 'store'])->name('drinker.store');
    Route::get('/{id}', [DrinkerController::class, 'show'])->name('drinker.show');
    Route::get('/{id}/edit', [DrinkerController::class, 'edit'])->name('drinker.edit');
    Route::put('/{id}', [DrinkerController::class, 'update'])->name('drinker.update');
    Route::delete('/{id}', [DrinkerController::class, 'destroy'])->name('drinker.destroy');
});

Route::prefix('address')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/get-countries', [AddressController::class, 'getCountries'])->name('address.get-countries');
    Route::get('/get-provinces/{id}', [AddressController::class, 'getProvincesByCountry'])->name('address.get-provinces');
    Route::get('/get-cities/{id}', [AddressController::class, 'getCitiesByProvince'])->name('address.get-cities');
});

require __DIR__ . '/auth.php';
