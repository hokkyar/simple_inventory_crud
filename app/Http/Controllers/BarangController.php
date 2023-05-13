<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
  public function index()
  {
    $barang = Barang::all();
    return view('barang.index', compact('barang'));
  }

  public function create()
  {
    return view('barang.create');
  }

  public function store(Request $request)
  {
    $barang = new Barang([
      'nama_barang' => $request->nama_barang,
      'harga_beli' => $request->harga_beli,
      'harga_jual' => $request->harga_jual,
      'stok' => $request->stok
    ]);
    $barang->save();

    return redirect('/barang')->with('success', 'Berhasil menambahkan barang.');
  }

  public function show(string $id)
  {
    $barang = Barang::find($id);
    return view('barang.show', compact('barang'));
  }

  public function edit(string $id)
  {
    $barang = Barang::find($id);
    return view('barang.edit', compact('barang'));
  }

  public function update(Request $request, string $id)
  {
    $barang = Barang::find($id);
    $barang->nama_barang = $request->nama_barang;
    $barang->harga_beli = $request->harga_beli;
    $barang->harga_jual = $request->harga_jual;
    $barang->stok = $request->stok;
    $barang->save();
    return redirect('/barang')->with('success', 'Barang berhasil diperbarui.');
  }

  public function destroy(string $id)
  {
    $barang = Barang::find($id);
    $barang->delete();

    return redirect('/barang')->with('success', 'Barang berhasil dihapus.');
  }
}
