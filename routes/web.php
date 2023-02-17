<?php

use App\Http\Controllers\akuncontroller;
use App\Http\Controllers\barangcontroller;
use App\Http\Controllers\bukti_kas_keluarcontroller;
use App\Http\Controllers\bukti_kas_masukcontroller;
use App\Http\Controllers\DashControl;
use App\Http\Controllers\jurnal_penyesuaiancontroller;
use App\Http\Controllers\memorialcontroller;
use App\Http\Controllers\transaksi_pembeliancontroller;
use App\Http\Controllers\transaksi_penjualancontroller;
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

Route::get('/', [DashControl::class, 'index']);

// Routing untuk akun
Route::get('/accounting/accounts', [akuncontroller::class, "index"])->name('accounts');
Route::post('/accounting/accounts', [akuncontroller::class, "store"])->name('save_account');
Route::get('/accounting/accounts/new', [akuncontroller::class, "create"])->name('create_account');
Route::get('/accounting/accounts/edit/{akun}', [akuncontroller::class, "edit"])->name('edit_account');
Route::put('/accounting/accounts/edit/{akun}', [akuncontroller::class, "update"])->name('update_account');
Route::delete('/accounting/accounts/delete/{akun}', [akuncontroller::class, "destroy"])->name('delete_account');

Route::get('/sales', [transaksi_penjualancontroller::class, "index"]);

Route::get('/penyesuaian', [jurnal_penyesuaiancontroller::class, "index"]);

Route::get('/barang', [barangcontroller::class, "index"]);

// route pembelian
Route::get('/purchase', [transaksi_pembeliancontroller::class, "index"])->name('purchase');
Route::get('/purchase/new', [transaksi_pembeliancontroller::class, "create"])->name('create_purchase');
Route::get('/purchase/detail/{transaksi_pembelian}', [transaksi_pembeliancontroller::class, "detail"])->name('detail_purchase');
Route::delete('/purchase/delete/{transaksi_pembelian}', [transaksi_pembeliancontroller::class, 'delete'])->name('delete_purchase');
Route::post('/purchase/save_transaksi', [transaksi_pembeliancontroller::class, "store"])->name('save_purchase');
Route::get('/cari_barang/{barang:id}', [transaksi_pembeliancontroller::class, "cari_barang"]);
Route::post('/purchase/save_detail', [transaksi_pembeliancontroller::class, "store_detail"])->name('save_detail_purchase');
Route::get('/purchase/get_detail', [transaksi_pembeliancontroller::class, "get_detail"])->name('get_detail_purchase');
Route::get('/purchase/validate_barang/{barang:id}', [transaksi_pembeliancontroller::class, "validate_barang"])->name('validate_barang');
Route::put('/purchase/update_detail', [transaksi_pembeliancontroller::class, "update_detail"])->name("update_detail");
Route::put('/purchase/update_detail_qty', [transaksi_pembeliancontroller::class, "update_detail_qty"])->name("update_detail_qty");
Route::delete('/purchase/delete_detail', [transaksi_pembeliancontroller::class, "delete_detail"])->name('delete_detail');

//route kas keluar
Route::get('/accounting/cash-out', [bukti_kas_keluarcontroller::class, "index"])->name('cash_out');
Route::post('/accounting/cash-out', [bukti_kas_keluarcontroller::class, "save"])->name('save_cash_out');
Route::get('/accounting/cash-out/new', [bukti_kas_keluarcontroller::class, "form"])->name('create_cash_out');
Route::get('/accounting/cash-out/get_transaction/{transaksi_pembelian:id}', [bukti_kas_keluarcontroller::class, 'get_transaction'])->name('get_transaction');
Route::get('/accounting/cash-out/print/{bukti_kas_keluar}', [bukti_kas_keluarcontroller::class, "report"])->name('report_cash_out');

//route kas masuk
Route::get('/form_kas_masuk', [bukti_kas_masukcontroller::class, "form"]);
Route::get('/laporan_kas_masuk', [bukti_kas_masukcontroller::class, "report"]);
Route::get('/tabel_kas_masuk', [bukti_kas_masukcontroller::class, "tabel"]);

// route jurnal memorial
Route::get('/accounting/memorial', [memorialcontroller::class, "index"])->name('memorial');
Route::get('/accounting/memorial/new', [memorialcontroller::class, "create"])->name('create_memorial');
Route::post('/accounting/memorial', [memorialcontroller::class, "store"])->name('save_memorial');
Route::get('/accounting/memorial/get_account_info/{id}', [memorialcontroller::class, 'get_account_info'])->name('get_account_info_memorial');
