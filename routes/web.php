<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessControl\RoleController;
use App\Http\Controllers\AccessControl\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth', 'prefix' => 'access-control', 'as' => 'user.'], function () {
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});