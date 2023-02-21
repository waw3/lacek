<?php

use App\Http\Controllers\Dashboard\PermissionsController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\BlogsController;
use Illuminate\Support\Facades\Auth;
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

// Example Routes

Route::get('/', function () {
    return redirect('/dashboard');
});

// Route::match(['get', 'post'], '/dashboard', function(){
//     return view('dashboard');
// });

Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');

Auth::routes();

Route::middleware(['auth', 'role:user|admin'])
    ->name('dashboard.')
    ->prefix('/dashboard')
    ->group(function(){
        Route::get('', [DashboardController::class, 'index'])->name('index');
        Route::resource('/users', UsersController::class);
        Route::resource('/roles', RolesController::class);
        Route::resource('/permissions', PermissionsController::class);
        Route::resource('/blogs', BlogsController::class);
});
