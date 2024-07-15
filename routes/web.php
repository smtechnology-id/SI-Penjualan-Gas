<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('login');
});
Route::post('/loginPost', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


    Route::get('admin/dataBarang', [AdminController::class, 'dataBarang'])->name('admin.dataBarang');
    Route::get('admin/addBarang', [AdminController::class, 'addBarang'])->name('admin.addBarang');
    Route::post('/admin/addBarangPost', [AdminController::class, 'addBarangPost'])->name('admin.addBarangPost');
    Route::get('admin/updateBarang/{id}', [AdminController::class, 'updateBarang'])->name('admin.updateBarang');
    Route::post('/admin/updateBarangPost', [AdminController::class, 'updateBarangPost'])->name('admin.updateBarangPost');
    Route::get('/admin/deleteBarang/{id}', [AdminController::class, 'deleteBarang'])->name('admin.deleteBarang');



    Route::get('admin/dataPenjualan', [AdminController::class, 'dataPenjualan'])->name('admin.dataPenjualan');


    Route::get('admin/dataPembelian', [AdminController::class, 'dataPembelian'])->name('admin.dataPembelian');


    Route::get('admin/dataAdmin', [AdminController::class, 'dataAdmin'])->name('admin.dataAdmin');


    Route::get('admin/dataKonsumen', [AdminController::class, 'dataKonsumen'])->name('admin.dataKonsumen');
    Route::get('admin/addKonsumen', [AdminController::class, 'showAddKonsumenForm'])->name('admin.addKonsumen');
    Route::get('/admin/storeKonsumen/', [AdminController::class, 'storeKonsumen'])->name('admin.storeKonsumen');
    Route::get('/admin/konsumen/edit/{id}', [AdminController::class, 'editKonsumen'])->name('admin.editKonsumen');
    Route::post('/admin/konsumen/update/{id}', [AdminController::class, 'updateKonsumen'])->name('admin.updateKonsumen');
    Route::get('/admin/konsumen/delete/{id}', [AdminController::class, 'deleteKonsumen'])->name('admin.deleteKonsumen');
}); 