<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');

// route::get('/test', function(){
//     return "Hello";
// })->middleware('auth');


Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('admin/home', [App\Http\Controllers\AdminControler::class, 'index'])->name('home')->middleware('is_admin');
Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('admin/books', [App\Http\Controllers\AdminControler::class, 'books'])->name('admin.books')->middleware('is_admin');
Route::post('admin/books', [App\Http\Controllers\AdminControler::class, 'submit_book'])->name('admin.book.submit')->middleware('is_admin');
Route::post('admin/books', [App\Http\Controllers\AdminControler::class, 'update_book'])->name('admin.book.update')->middleware('is_admin');
Auth::routes();
