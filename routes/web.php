<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LightAppController;





Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('users_details/{id}', [App\Http\Controllers\Auth\LoginController::class, 'userDetails']);
