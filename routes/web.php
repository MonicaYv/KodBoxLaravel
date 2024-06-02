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
   
    Route::post('submit', [LightAppController::class, 'add_data']);
	Route::get('app_role_list/{type}', [LightAppController::class, 'AppRoleList']);
	Route::post('apps-update/{id}', [LightAppController::class, 'update']);
	Route::get('apps-delete/{id}', [LightAppController::class, 'delete_data']);
	Route::post('add-apps-desktop/{id}', [LightAppController::class, 'apps']);

//end

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

//user routes
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/user-add', [App\Http\Controllers\UserController::class, 'add'])->name('user-add');
Route::post('/user-create', [App\Http\Controllers\UserController::class, 'create'])->name('user-create');
Route::get('/user-edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user-edit');
Route::post('/user-update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user-update');
Route::get('/user-delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user-delete');

Route::get('/useradmin', [App\Http\Controllers\UserController::class, 'userAdmin'])->name('useradmin');
Route::get('/usergroups', [App\Http\Controllers\UserController::class, 'userGroup'])->name('usergroups');
Route::get('/rolesadmin', [App\Http\Controllers\RolesController::class, 'roles'])->name('rolesadmin');
Route::get('/permissionsadmin', [App\Http\Controllers\PermissionsController::class, 'permissions'])->name('permissionsadmin');

//roles routes
Route::get('/roles', [App\Http\Controllers\RolesController::class, 'index'])->name('roles');
Route::get('/roles/{id}', [App\Http\Controllers\RolesController::class, 'index']);
Route::get('/role-add', [App\Http\Controllers\RolesController::class, 'add'])->name('role-add');
Route::post('/role-create', [App\Http\Controllers\RolesController::class, 'create'])->name('role-create');
Route::get('/role-edit/{id}', [App\Http\Controllers\RolesController::class, 'edit'])->name('role-edit');
Route::post('/role-update/{id}', [App\Http\Controllers\RolesController::class, 'update'])->name('role-update');
Route::get('/role-delete/{id}', [App\Http\Controllers\RolesController::class, 'destroy'])->name('role-delete');

//permissions routes
Route::get('/permissions', [App\Http\Controllers\PermissionsController::class, 'index'])->name('permissions');
Route::get('/permissions/{id}', [App\Http\Controllers\PermissionsController::class, 'index']);
Route::get('/permission-add', [App\Http\Controllers\PermissionsController::class, 'add'])->name('permission-add');
Route::post('/permission-create', [App\Http\Controllers\PermissionsController::class, 'create'])->name('permission-create');
Route::get('/permission-edit/{id}', [App\Http\Controllers\PermissionsController::class, 'edit'])->name('permission-edit');
Route::post('/permission-update/{id}', [App\Http\Controllers\PermissionsController::class, 'update'])->name('permission-update');
Route::get('/permission-delete/{id}', [App\Http\Controllers\PermissionsController::class, 'destroy'])->name('permission-delete');

//group routes
Route::get('/groups', [App\Http\Controllers\GroupController::class, 'index'])->name('groups');
Route::get('/groups/{id}', [App\Http\Controllers\GroupController::class, 'index']);
Route::get('/group-add', [App\Http\Controllers\GroupController::class, 'add'])->name('group-add');
Route::post('/group-create', [App\Http\Controllers\GroupController::class, 'create'])->name('group-create');
Route::get('/group-edit/{id}', [App\Http\Controllers\GroupController::class, 'edit'])->name('group-edit');
Route::post('/group-update/{id}', [App\Http\Controllers\GroupController::class, 'update'])->name('group-update');
Route::get('/group-delete/{id}', [App\Http\Controllers\GroupController::class, 'destroy'])->name('group-delete');


