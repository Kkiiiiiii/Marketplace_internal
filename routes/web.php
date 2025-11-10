<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Route;

Route::get('/',[BerandaController::class, 'index'])->name('beranda');
Route::get('/login/tampil',[AuthController::class, 'indexLog'])->name('indexLog');

Route::get('/admin/dash',[AdminController::class, 'dash']);
