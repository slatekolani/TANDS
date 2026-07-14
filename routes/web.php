<?php

use App\Http\Controllers\homeController;
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
    return view('FrontEnd.welcome');
});



Route::get('home',[homeController::class,'home'])->name('home');
Route::get('about',[homeController::class,'about'])->name('about');
Route::get('gallery',[homeController::class,'gallery'])->name('gallery');
Route::get('EASDC',[homeController::class,'EASDC'])->name('EASDC');
Route::get('ADC',[homeController::class,'ADC'])->name('ADC');
Route::get('ADC2026',[homeController::class,'ADC2026'])->name('ADC2026');
Route::get('TNDC2025',[homeController::class,'TNDC2025'])->name('TNDC2025');
Route::get('TNDC2026',[homeController::class,'TNDC2026'])->name('TNDC2026');
Route::get('TISDC2025',[homeController::class,'TISDC2025'])->name('TISDC2025');

Route::get('EASDC2025',[homeController::class,'EASDC2025'])->name('EASDC2025');
Route::get('contactUs',[homeController::class,'contactUs'])->name('contactUs');
