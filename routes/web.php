<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\TokoController as AdminTokoController;
use App\Http\Controllers\admin\VerifikasiBarang as AdminVerifikasiBarangController;
use App\Http\Controllers\admin\MemberController as AdminMemberController;
use App\Http\Controllers\admin\TopupController as AdminTopupController;



use App\Http\Controllers\user\HomeController as UserHomeController;
use App\Http\Controllers\user\ProfilController as UserProfilController;
use App\Http\Controllers\user\TokoController as UserTokoController;
use App\Http\Controllers\user\VerifikasiTokoController as UserVerifikasiTokoController;
use App\Http\Controllers\user\VerifikasiSaldoController as UserVerifikasiSaldoController;
use App\Http\Controllers\user\TopupController as UserTopupController;
use App\Http\Controllers\user\KeranjangController as UserKerajangController;
use App\Http\Controllers\user\TransaksiController as UserTransaksiController;

use App\Http\Controllers\toko\HomeController as TokoHomeController;
use App\Http\Controllers\toko\BarangController as TokoBarangController;
use App\Http\Controllers\toko\PesananController as TokoPesananController;

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
    return view('web.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::get('home', [AdminHomeController::class, 'index'])->name('homeadmin');
    Route::resource('toko', AdminTokoController::class, ['as' => 'admin']);
    Route::resource('member', AdminMemberController::class, ['as' => 'admin']);
    Route::resource('verifikasibarang', AdminVerifikasiBarangController::class, ['as' => 'admin']);
    Route::resource('topup', AdminTopupController::class, ['as' => 'admin']);
});

Route::prefix('user')->group(function () {
    Route::get('home', [UserHomeController::class, 'index'])->name('homeuser');
    Route::get('cari', [UserHomeController::class, 'cari']);
    Route::resource('toko', UserTokoController::class, ['as' => 'user']);
    Route::resource('profil', UserProfilController::class, ['as' => 'user']);
    Route::resource('verifikasitoko', UserVerifikasiTokoController::class, ['as' => 'user'])->except(['index', 'destroy']);;
    Route::resource('verifikasi', UserVerifikasiSaldoController::class, ['as' => 'user'])->except(['index', 'destroy']);
    Route::resource('topup', UserTopupController::class, ['as' => 'user']);
    Route::resource('keranjang', UserKerajangController::class, ['as' => 'user']);
    Route::resource('transaksi', UserTransaksiController::class, ['as' => 'user']);
    Route::prefix('profil')->group(function () {

    });
});
Route::prefix('toko')->group(function(){
    Route::resource('home', TokoHomeController::class,['as' => 'toko']);
    Route::resource('barang', TokoBarangController::class,['as' => 'toko']);
    Route::resource('pesanan', TokoPesananController::class,['as' => 'toko']);
});
require __DIR__.'/auth.php';
