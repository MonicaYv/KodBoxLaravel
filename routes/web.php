<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LightAppController;





Route::get('/', function () {
      return redirect(route('login'));
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
