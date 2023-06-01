<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
  public function index()
  {
    $karyawan = Karyawan::all();
    return view('karyawan.index', compact('karyawan'));
  }

  public function create()
  {
    return view('karyawan.create');
  }

  public function store(Request $request)
  {
    // nama karyawan minimal 10 karakter dan maksimal 30 karakter
    $karyawanLength = strlen($request->nama_karyawan);
    if ($karyawanLength < 10 || $karyawanLength > 30) {
      return redirect('/karyawan/create')->with('error', 'Nama karyawan minimal 10 karakter dan maksimal 30 karakter');
    }
    // email karyawan harus disertakan '@' dan tidak boleh kosong
    if (strpos($request->email, '@') === false || strlen($request->email) <= 0) {
      return redirect('/karyawan/create')->with('error', "Email harus disertakan '@' dan tidak boleh kosong");
    }
    // nomor telepon minimal 10 karakter dan maksimal 13 karakter
    $teleponLength = strlen($request->telepon);
    if ($teleponLength < 10 || $teleponLength > 13) {
      return redirect('/karyawan/create')->with('error', 'Nomor telepon minimal 10 karakter dan maksimal 13 karakter');
    }

    $karyawan = new Karyawan([
      'nama_karyawan' => $request->nama_karyawan,
      'telepon' => $request->telepon,
      'email' => $request->email
    ]);
    $karyawan->save();

    return redirect('/karyawan')->with('success', 'Berhasil menambahkan data karyawan.');
  }

  public function show(string $id)
  {
    $karyawan = Karyawan::find($id);
    return view('karyawan.show', compact('karyawan'));
  }

  public function edit(string $id)
  {
    $karyawan = Karyawan::find($id);
    return view('karyawan.edit', compact('karyawan'));
  }

  public function update(Request $request, string $id)
  {
    $karyawan = Karyawan::find($id);
    $karyawan->nama_karyawan = $request->nama_karyawan;
    $karyawan->telepon = $request->telepon;
    $karyawan->email = $request->email;
    $karyawan->save();
    return redirect('/karyawan')->with('success', 'Data karyawan berhasil diperbarui.');
  }

  public function destroy(string $id)
  {
    $karyawan = Karyawan::find($id);
    $karyawan->delete();
    return redirect('/karyawan')->with('success', 'Data karyawan berhasil dihapus.');
  }
}
