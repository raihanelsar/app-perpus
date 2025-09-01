<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//tampilkan
Route::get('login', [\App\Http\Controllers\LoginController::class,'login']);
Route::post('login', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('login');

Route::middleware('auth')->group(function () {
    route::get('dashboard', [\App\Http\Controllers\HomeController::class, 'index']);
    route::post('logout', [LoginController::class, 'logout']);
    //Anggota:
    route::get('anggota/index', [\App\Http\Controllers\AnggotaController::class, 'index']);
    route::get('anggota/create', [AnggotaController::class, 'create']);
    route::post('anggota/store', [AnggotaController::class, 'store'])->name('anggota.store');
    route::get('anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
    route::put('anggota/update/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
    route::delete('anggota/destroy/{id}', [AnggotaController::class, 'softDelete'])->name('anggota.softdelete');
    route::get('anggota/restore', [AnggotaController::class, 'indexRestore']);
    route::get('anggota/restore/{id}', [AnggotaController::class, 'restore'])->name('anggota.restore');
    route::delete('anggota/restore/destroy/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
});
