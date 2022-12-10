<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CripsController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternateController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\AlternatifKriteriaController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [GuestController::class, 'index'])->name('guest');
Route::post('filter', [GuestController::class, 'filter'])->name('filter');

Route::get('home', [HomeController::class, 'index'])->name('dashboard')->middleware('isLogin');


// Route::get('/kriteria', [KriteriaController::class, 'index']);
// Route::get('/kriteria/create', [KriteriaController::class, 'create']);
// Route::post('/kriteria/store', [KriteriaController::class, 'store']);
// Route::get('/kriteria/{id}/edit', [KriteriaController::class, 'edit']);
// Route::put('/kriteria/{id}', [KriteriaController::class, 'update']);
// Route::delete('/kriteria/{id}', [KriteriaController::class, 'destroy']);

Route::resource('kriteria', KriteriaController::class)->middleware('isLogin');
Route::resource('sub-kriteria', SubKriteriaController::class)->middleware('isLogin');
Route::resource('alternatif', AlternatifController::class)->middleware('isLogin');
Route::resource('alternatif-kriteria', AlternatifKriteriaController::class)->middleware('isLogin');
Route::get('perhitungan/index', [PerhitunganController::class, 'index'])->name('perhitungan.index')->middleware('isLogin');
Route::get('perhitungan/test', [PerhitunganController::class, 'test'])->name('perhitungan.test')->middleware('isLogin');
Route::get('perhitungan', [PerhitunganController::class, 'perhitungan'])->middleware('isLogin');
// matriks normalisasi 
// normalisasi bobot
// utility measure
// regrate measure
// total
// ranking
// Route::resource('crips', CripsController::class);
// Route::resource('alternate', AlternateController::class);


// Route::get('/laptop', [LaptopController::class, 'index']);
// Route::get('/laptop/create', [LaptopController::class, 'create']);

Route::get('/login', [SessionController::class, 'index'])->middleware('isGes');
Route::post('/login/login', [SessionController::class, 'login'])->middleware('isGes');
Route::get('/login/logout', [SessionController::class, 'logout']);
Route::get('/login/register', [SessionController::class, 'register'])->middleware('isGes');
Route::post('/login/create', [SessionController::class, 'create'])->middleware('isGes');
