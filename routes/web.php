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

//route barang
Route::get('/barang', [barangcontroller::class, "index"])->name('barang');
Route::post('/barang/tambah', [barangcontroller::class, "store"])->name('simpan_barang');
Route::get('/barang/tambah', [barangcontroller::class, "create"])->name('tambah_barang');
Route::get('/barang/edit/{barang}', [barangcontroller::class, "edit"])->name('edit_barang');
Route::put('/barang/edit/{barang}', [barangcontroller::class, "update"])->name('update_barang');
Route::delete('/barang/{barang}', [barangcontroller::class, "destroy"])->name('hapus_barang');
//Route::put('/barang/tambah/{barang}', [barangcontroller::class, "incrementid"])->name('increment');

Route::get('/sales', [transaksi_penjualancontroller::class, "index"]);

Route::get('/memo', [memorialcontroller::class, "index"]);

Route::get('/penyesuaian', [jurnal_penyesuaiancontroller::class, "index"]);

Route::get('/purch', [transaksi_pembeliancontroller::class, "index"]);

Route::get('/bukti_kas_keluar', [bukti_kas_keluarcontroller::class, "index"]);

//route kas keluar
Route::get('/bukti_kas_keluar', [bukti_kas_keluarcontroller::class, "report"]);
Route::get('/jurnal_kas_keluar', [bukti_kas_keluarcontroller::class, "jurnal"]);
Route::get('/form_kas_keluar', [bukti_kas_keluarcontroller::class, "form"]);
Route::get('/nota_pembelian', [bukti_kas_keluarcontroller::class, 'nota']);

//route kas masuk
Route::get('/form_kas_masuk', [bukti_kas_masukcontroller::class, "form"]);
Route::get('/laporan_kas_masuk', [bukti_kas_masukcontroller::class, "report"]);
Route::get('/tabel_kas_masuk', [bukti_kas_masukcontroller::class, "tabel"]);
