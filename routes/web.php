<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
  return view('home');
});

Route::get('/login', function () {
  return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
  if ($request->username == env('ADMIN_USERNAME') && $request->password == env('ADMIN_PASSWORD')) {
    $request->session()->regenerate();
    session(['user' => Auth::user()]);
    return redirect('/dashboard')->with('success', 'Login berhasil');
  } else {
    return redirect('/login')->withErrors(['Invalid username or password']);
  }
});

Route::delete('/login', function (Request $request) {
  Auth::logout();
  $request->session()->invalidate();
  $request->session()->regenerateToken();
  return redirect('/login');
});

Route::get('/dashboard', function () {
  return view('dashboard');
});
Route::resource('barang', BarangController::class);
Route::resource('karyawan', KaryawanController::class);
Route::resource('transaksi', TransaksiController::class);
