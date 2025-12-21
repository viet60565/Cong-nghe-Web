<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinhVienController;
use Psy\ExecutionLoop\SignalHandler;

Route::get('/sinhvien', [SinhVienController::class, 'index'])->name('sinhvien.index'); 
Route::post('/sinhvien', [SinhVienController::class, 'store'])->name('sinhvien.store');

