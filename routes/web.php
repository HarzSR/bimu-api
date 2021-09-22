<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/admin/dashboard');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::match(['get', 'post'], '/iot-push', [App\Http\Controllers\InputController::class, 'store']);

Route::prefix('/admin')->namespace('Admin')->group(function ()
{
    Route::match(['get', 'post'], '/', [App\Http\Controllers\Admin\AdminController::class, 'login'])->name('Login');
    Route::group(['middleware' => ['admin']], function()
    {
        Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('Dashboard');
        Route::get('/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout']);
    });
});
