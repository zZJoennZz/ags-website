<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
    return view('pages/home');
})->name('home');

Route::get('/login', function () {
    return view('pages/login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.perform');

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout.perform');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});
