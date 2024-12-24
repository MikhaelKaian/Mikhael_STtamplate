<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminControler;


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

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home')->middleware('auth');

Route::get('admin/home', [App\Http\Controllers\AdminControler::class, 'index'])->name('admin.home');

Route::get('pasiens', [App\Http\Controllers\AdminControler::class, 'pasiens'])->name('pasiens');

Route::post('pasiens', [App\Http\Controllers\AdminControler::class, 'submit_book'])->name('pasien.submit');

Route::patch('books/update', [App\Http\Controllers\AdminControler::class, 'update_book'])->name('admin.book.update');

Route::post('books/update/{id}', [App\Http\Controllers\AdminControler::class, 'delete_book'])->name('admin.book.delete');

Route::get('ajaxadmin/dataBuku/{id}', [App\Http\Controllers\AdminControler::class, 'getDataBuku']);

Route::post('books/delete/{id}', [App\Http\Controllers\AdminControler::class,'delete_book'])->name('admin.book.delete');

Route::get('print_books', [AdminControler::class, 'print_books'])->name('admin.print.books');

Route::get('books/export', [AdminControler::class, 'export'])->name('admin.book.export');
Route::post('books/import', [AdminControler::class, 'import'])->name('admin.book.import');