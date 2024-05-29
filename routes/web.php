<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LightAppController;





Route::get('/', function () {
      return redirect(route('login'));
});





Auth::routes();

// Light app start

    
    Route::get('list', [LightAppController::class, 'index']);
    Route::get('add-form', [LightAppController::class, 'add_form']);
	Route::get('app_role_list', [LightAppController::class, 'AppRoleList']);
	Route::post('apps-update/{id}', [LightAppController::class, 'update']);
	Route::post('add-apps-desktop/{id}', [LightAppController::class, 'apps']);

//end

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
