<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LightAppController;
use App\Http\Controllers\RegisterController;




Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group( function () {
	Route::resource('apps', LightAppController::class);
	Route::get('app_role_list', [LightAppController::class, 'AppRoleList']);
	Route::post('apps-update/{id}', [LightAppController::class, 'update']);
	Route::post('add-apps-desktop/{id}', [LightAppController::class, 'apps']);
});
