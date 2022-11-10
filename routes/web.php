<?php

use App\Http\Controllers\AlternateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AlternatifKriteriaController;
use App\Http\Controllers\CripsController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\SubKriteriaController;

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
//     return view('welcome');
// });

// Route::get('/kriteria', [KriteriaController::class, 'index']);
// Route::get('/kriteria/create', [KriteriaController::class, 'create']);
// Route::post('/kriteria/store', [KriteriaController::class, 'store']);
// Route::get('/kriteria/{id}/edit', [KriteriaController::class, 'edit']);
// Route::put('/kriteria/{id}', [KriteriaController::class, 'update']);
// Route::delete('/kriteria/{id}', [KriteriaController::class, 'destroy']);

Route::resource('kriteria', KriteriaController::class);
Route::resource('sub-kriteria', SubKriteriaController::class);
Route::resource('alternatif', AlternatifController::class);
Route::resource('alternatif-kriteria', AlternatifKriteriaController::class);
Route::get('perhitungan/index', [PerhitunganController::class, 'index'])->name('perhitungan.index');
Route::get('perhitungan/test', [PerhitunganController::class, 'test'])->name('perhitungan.test');
Route::get('perhitungan', [PerhitunganController::class, 'perhitungan']);
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