<?php

use App\Http\Controllers\KaryawanController;
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

Route::get('/dashboard', [KaryawanController::class, 'show']);
Route::get('/add-karyawan', [KaryawanController::class, 'create']);
Route::post('/store-karyawan', [KaryawanController::class, 'store']);
Route::get('/detail-karyawan/{id}', [KaryawanController::class, 'showDetail']);
Route::get('/edit-karyawan/{id}', [KaryawanController::class, 'edit']);
Route::patch('/update-karyawan/{id}', [KaryawanController::class, 'update']);