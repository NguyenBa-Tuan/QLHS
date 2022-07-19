<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\StudentController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'check'])->name('login.handle');
Route::get('/logout', [LogoutController::class, 'index'])->name('logout');

Route::middleware('auth.admin')->prefix('admin')->group(function ()
{
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::resource('users', AdminController::class);
    Route::resource('courses', CourseController::class);
});

Route::resource('student', StudentController::class);
