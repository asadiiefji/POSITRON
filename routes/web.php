<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MabaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

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



Auth::routes();

Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('register/hmj', [App\Http\Controllers\AuthController::class, 'showFormRegister'])->name('register');
Route::post('register/hmj', [App\Http\Controllers\AuthController::class, 'register']);
 
Route::group(['middleware' => 'auth'], function () {

    Route::resource('maba', MabaController::class); 
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
 
});

Route::get('/', function () {
    return view('frontend.frontend');
});

Route::get('cari', [\App\Http\Controllers\DataController::class, 'index']);
Route::get('tentang', function () {
    return view('frontend.tentang');
});