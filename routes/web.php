<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;

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

Route::get('/admin', function () {
    return redirect()->route('dashboard');
});

Route::get('/', function () {
    return view('pages/home');
})->name('home');
Route::get('/about', function () {
    return view('pages/about');
})->name('about');

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('pages/login');
    })->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout.perform');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //applicants
    Route::get('/applicants', [ApplicantController::class, 'all_applicants'])->name('applicants.show');
    Route::post('/applicants', [ApplicantController::class, 'add_applicant'])->name('applicant.new');
    Route::get('/applicants/{applicant_id?}', [ApplicantController::class, 'get_single_api'])->name('applicant.single');
    Route::put('/applicants', [ApplicantController::class, 'update'])->name('applicant.update');
    Route::delete('/applicants/{applicant_id?}', [ApplicantController::class, 'delete'])->name('applicant.delete');

    //vacancies
    Route::get('/vacancies', [VacancyController::class, 'index'])->name('vacancies.show');
    Route::post('/vacancies', [VacancyController::class, 'new'])->name('vacancies.add');
    Route::put('/vacancies', [VacancyController::class, 'update'])->name('vacancies.update');
    Route::delete('/vacancies/{vacancy_id?}', [VacancyController::class, 'delete'])->name('vacancies.delete');

    //status
    Route::get('/status', [StatusController::class, 'index'])->name('applicant-status.show');
    Route::post('/status', [StatusController::class, 'store'])->name('applicant-status.add');
    Route::put('/status', [StatusController::class, 'update'])->name('applicant-status.update');
    Route::delete('/status/{status_id?}', [StatusController::class, 'delete'])->name('applicant-status.delete');
});

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [AuthController::class, 'register_user'])->name('user.register');
    Route::get('/user/{user_id?}', [UserController::class, 'single'])->name('user.single');
    Route::delete('/user/{user_id?}', [UserController::class, 'delete'])->name('user.delete');
    Route::put('/user', [UserController::class, 'update'])->name('user.update');
});
