<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\Water_QualityController;
use App\Http\Controllers\Admin\Water_UsageController;
use App\Http\Controllers\Admin\WellsController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Admin

Route::middleware(['web', 'auth', 'checkadmin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::resource('/wells', WellsController::class)->names([
        'index' => 'admin.wells.index',
        'create' => 'admin.wells.create',
        'store' => 'admin.wells.store',
        'edit' => 'admin.wells.edit',
        'update' => 'admin.wells.update',
        'show' => 'admin.wells.show',
        'destroy' => 'admin.wells.destroy',
    ]);


    Route::resource('/water_quality', Water_QualityController::class)->names([
        'index' => 'admin.water_quality.index',
        'create' => 'admin.water_quality.create',
        'store' => 'admin.water_quality.store',
        'edit' => 'admin.water_quality.edit',
        'update' => 'admin.water_quality.update',
        'destroy' => 'admin.water_quality.destroy',
    ]);

    Route::resource('/water_usage', Water_UsageController::class)->names([
        'index' => 'admin.water_usage.index',
        'create' => 'admin.water_usage.create',
        'store' => 'admin.water_usage.store',
        'edit' => 'admin.water_usage.edit',
        'update' => 'admin.water_usage.update',
        'destroy' => 'admin.water_usage.destroy',
    ]);


    Route::resource('/report', ReportController::class)->names([
        'index' => 'admin.reports.index',
    ]);

    Route::resource('/users', UsersController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'show' => 'admin.users.show',
        'destroy' => 'admin.users.destroy',
    ]);
});


// User
Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/client', [ClientController::class, 'index'])->name('client');
