<?php

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

Route::get('/dashboard', function () {
    return view('pages.index');
})->name('dashboard');

Auth::routes();

// resource route
Route::resource('/class', ClassController::class);
Route::resource('/teacher', TeacherController::class);
Route::resource('/student', StudentController::class);
