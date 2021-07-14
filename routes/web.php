<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RegisteredUserController;
use App\Http\Controllers\Admin\AuthenticatedSessionController;
use App\Http\Controllers\SwitchUserController;

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('admin/dashboard', function () {
    return view('adminDashboard');
})->middleware(['auth:admin'])->name('admin.dashboard');

Route::get('admin-register', [RegisteredUserController::class, 'create'])
    ->middleware(['guest:admin', 'switchTo'])
    ->name('admin.register');

Route::post('registration', [RegisteredUserController::class, 'store'])
    ->middleware(['guest:admin', 'switchTo'])->name('registration');

Route::get('/admin-login', [AuthenticatedSessionController::class, 'create'])
    ->middleware(['guest:admin', 'switchTo'])
    ->name('admin.login');

Route::post('/admin-login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(['guest:admin', 'switchTo'])->name('loginAdmin');
    
Route::post('/admin-logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('admin.logout')
    ->middleware('auth:admin');

Route::get('/switch', [SwitchUserController::class, 'index'])
    ->middleware('ifAuth');

Route::post('switching', [SwitchUserController::class, 'store'])
    ->middleware('ifAuth')
    ->name('switching');
Route::get('please-login', function() {
    return view('pleaseLogin');
});

require __DIR__.'/auth.php';

