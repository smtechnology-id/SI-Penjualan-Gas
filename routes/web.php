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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/loginPost', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/tentang', [AdminController::class, 'tentang'])->name('admin.tentang');


    Route::get('admin/dataBarang', [AdminController::class, 'dataBarang'])->name('admin.dataBarang');
    Route::get('admin/addBarang', [AdminController::class, 'addBarang'])->name('admin.addBarang');
    Route::post('/admin/addBarangPost', [AdminController::class, 'addBarangPost'])->name('admin.addBarangPost');
    Route::get('admin/updateBarang/{id}', [AdminController::class, 'updateBarang'])->name('admin.updateBarang');
    Route::post('/admin/updateBarangPost', [AdminController::class, 'updateBarangPost'])->name('admin.updateBarangPost');
    Route::get('/admin/deleteBarang/{id}', [AdminController::class, 'deleteBarang'])->name('admin.deleteBarang');



    Route::get('admin/dataPenjualan', [AdminController::class, 'dataPenjualan'])->name('admin.dataPenjualan');
    Route::get('admin/addPenjualan', [AdminController::class, 'addPenjualan'])->name('admin.addPenjualan');
    Route::get('admin/updatePenjualan/{id}', [AdminController::class, 'updatePenjualan'])->name('admin.updatePenjualan');
    Route::post('admin/addPenjualanPost', [AdminController::class, 'addPenjualanPost'])->name('admin.addPenjualanPost');
    Route::post('admin/updatePenjualanPost', [AdminController::class, 'updatePenjualanPost'])->name('admin.updatePenjualanPost');
    Route::get('/admin/deletePenjualan/{id}', [AdminController::class, 'deletePenjualan'])->name('admin.deletePenjualan');


    Route::get('admin/dataPembelian', [AdminController::class, 'dataPembelian'])->name('admin.dataPembelian');
    Route::get('admin/addPembelian', [AdminController::class, 'addPembelian'])->name('admin.addPembelian');
    Route::post('admin/addPembelianPost', [AdminController::class, 'addPembelianPost'])->name('admin.addPembelianPost');
    Route::get('admin/updatePembelian/{id}', [AdminController::class, 'updatePembelian'])->name('admin.updatePembelian');
    Route::post('admin/updatePembelianPost', [AdminController::class, 'updatePembelianPost'])->name('admin.updatePembelianPost');
    Route::get('admin/deletePembelian/{id}', [AdminController::class, 'deletePembelian'])->name('admin.deletePembelian');
    

    Route::get('admin/dataAdmin', [AdminController::class, 'dataAdmin'])->name('admin.dataAdmin');
    Route::get('admin/addAdmin', [AdminController::class, 'addAdmin'])->name('admin.addAdmin');
    Route::post('admin/addAdminPost', [AdminController::class, 'addAdminPost'])->name('admin.addAdminPost');
    Route::get('admin/updateAdmin/{id}', [AdminController::class, 'updateAdmin'])->name('admin.updateAdmin');
    Route::post('admin/updateAdminPost', [AdminController::class, 'updateAdminPost'])->name('admin.updateAdminPost');
    Route::get('admin/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.deleteAdmin');


    Route::get('admin/dataKonsumen', [AdminController::class, 'dataKonsumen'])->name('admin.dataKonsumen');
    Route::get('admin/addKonsumen', [AdminController::class, 'showAddKonsumenForm'])->name('admin.addKonsumen');
    Route::post('/admin/storeKonsumen/', [AdminController::class, 'storeKonsumen'])->name('admin.storeKonsumen');
    Route::get('/admin/konsumen/edit/{id}', [AdminController::class, 'editKonsumen'])->name('admin.editKonsumen');
    Route::post('/admin/konsumen/update/', [AdminController::class, 'updateKonsumen'])->name('admin.updateKonsumen');
    Route::get('/admin/deleteKonsumen/{id}', [AdminController::class, 'deleteKonsumen'])->name('admin.deleteKonsumen');

    Route::get('admin/laporanPenjualan', [AdminController::class, 'laporanPenjualan'])->name('admin.laporanPenjualan');
    Route::get('admin/laporanKonsumen', [AdminController::class, 'laporanKonsumen'])->name('admin.laporanKonsumen');
    Route::get('admin/laporanPembelian', [AdminController::class, 'laporanPembelian'])->name('admin.laporanPembelian');
    Route::get('admin/laporanPemasukan', [AdminController::class, 'laporanPemasukan'])->name('admin.laporanPemasukan');
}); 