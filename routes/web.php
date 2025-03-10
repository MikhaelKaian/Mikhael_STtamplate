<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminControler;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\FaskesController;
use App\Http\Controllers\MalariaControler;
use App\Http\Controllers\SuperAdminController;

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

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Faskes "Pasies"

Route::get('admin/home', [App\Http\Controllers\AdminControler::class, 'index'])->name('admin.home');

Route::get('pasiens', [App\Http\Controllers\AdminControler::class, 'pasiens'])->name('pasiens');

Route::post('pasiens', [App\Http\Controllers\AdminControler::class, 'submit_book'])->name('pasien.submit');

// Faskes " Page Tindakan"

Route::get('admin/home', [App\Http\Controllers\TindakanController::class, 'index'])->name('admin.home');

Route::get('tindakans', [App\Http\Controllers\TindakanController::class, 'tindakans'])->name('tindakans');

Route::post('/tindakans/store', [TindakanController::class, 'store'])->name('tindakans.route');

//Admin / Dinkes "Faskes"

Route::get('admin/home', [App\Http\Controllers\FaskesController::class, 'index'])->name('admin.home')->middleware('is_admin');

Route::get('faskes', [App\Http\Controllers\FaskesController::class, 'faskes'])->name('faskes')->middleware('is_admin');

Route::post('faskes', [App\Http\Controllers\FaskesController::class, 'submit_faskes'])->name('faskes')->middleware('is_admin');

Route::patch('faskes', [App\Http\Controllers\FaskesController::class, 'update_faskes'])->name('faskes')->middleware('is_admin');

Route::get('/admin/ajaxadmin/dataBuku/{id}', [App\Http\Controllers\FaskesController::class, 'getDataBuku'])->middleware('is_admin');

Route::get('/faskes/delete/{id}', [\App\Http\Controllers\FaskesController::class, 'delete_faskes'])->name('faskes.delete')->middleware('is_admin');

//admin / Dinkes "Laporan Malaria"
Route::get('malaria-pasien', [App\Http\Controllers\MalariaControler::class, 'malariapasien'])->name('malaria')->middleware('is_admin');
Route::get('malaria-tindakan', [App\Http\Controllers\MalariaControler::class, 'malariatindakan'])->name('malaria')->middleware('is_admin');
Route::get('monitoring-tindakan', [App\Http\Controllers\SuperAdminController::class, 'malariatindakan'])->name('malaria')->middleware('is_superadmin');

Route::post('/tindakan/{id}/update-status', [SuperAdminController::class, 'updateStatusMonitoring'])->name('tindakan.update-status');

//export tindakan
Route::get('admin/malaria/export-excel', [App\Http\Controllers\MalariaControler::class, 'export'])->name('malaria.export-excel');