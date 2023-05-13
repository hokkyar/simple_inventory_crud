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
