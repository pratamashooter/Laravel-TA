<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EspController;
use App\Http\Controllers\KelolaController;
use App\Http\Controllers\KelolaroleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\Sensor;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('login', function () {
    if(Auth::user()){
        return redirect()->route('dashboard');
    }
    return view('login');
})->name("form-login");

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['prefix' => 'telegram'], function() {
});


Route::get('data', [EspController::class,'datafront']);
Route::post('login', [LoginController::class,'login'])->name('login');
Route::get('logout', [LoginController::class,'logout'])->name('logout');

Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware('auth');

Route::get('kelolauser', [KelolaController::class,'kelolauser'])->name('kelolauser')->middleware('auth');
Route::get('createuser', [KelolaController::class,'createuser'])->name('createuser')->middleware('auth');
Route::post('store', [KelolaController::class,'store'])->name('store')->middleware('auth');
Route::get('edituser/{id}', [KelolaController::class,'edituser'])->name('edituser')->middleware('auth');
Route::post('update/{id}', [KelolaController::class,'update'])->name('update')->middleware('auth');
Route::get('delete/{id}', [KelolaController::class,'delete'])->name('delete')->middleware('auth');

Route::get('kelolarole', [KelolaroleController::class,'kelolarole'])->name('kelolarole')->middleware('auth');
Route::get('createrole', [KelolaroleController::class,'createrole'])->name('createrole')->middleware('auth');
Route::post('storerole', [KelolaroleController::class,'storerole'])->name('storerole')->middleware('auth');
Route::get('editrole/{id}', [KelolaroleController::class,'editrole'])->name('editrole')->middleware('auth');
Route::post('updaterole/{id}', [KelolaroleController::class,'updaterole'])->name('updaterole')->middleware('auth');
Route::get('deleterole/{id}', [KelolaroleController::class,'deleterole'])->name('deleterole')->middleware('auth');

Route::get('ajax_get_dashboard', [DashboardController::class, 'ajax_get_dashboard'])->name('ajax_get_dashboard')->middleware('auth');


