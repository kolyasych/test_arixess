<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\AdminController;
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
    return view('index');
})->name('home');

Auth::routes();

Route::group(['middleware'=> ['auth']], function () {
    Route::group(['middleware' => ["role:client"]], function (){
        Route::get('/applications', [ApplicationsController::class, 'index'])->name('applications');
        Route::post('/applications/store', [ApplicationsController::class, 'store'])->name('applications.store');
    });

    Route::group(['middleware' => ["role:manager"], 'prefix' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/application/{id}', [AdminController::class, 'showApplication'])->name('application.show');
        Route::get('/application/change-status/{id}', [AdminController::class, 'changeStatus'])->name('application.changeStatus');
    });
});


