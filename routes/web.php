<?php

use App\Http\Controllers\ApplicationsController;
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


Route::group(['middleware' => ["auth", "role:client"]], function (){
    Route::get('/applications', [ApplicationsController::class, 'index'])->name('applications');
    Route::post('/applications/store', [ApplicationsController::class, 'store'])->name('applications.store');
});

