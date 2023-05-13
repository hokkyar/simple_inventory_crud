<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Karyawan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
  public function index()
  {
    $transaksi = Transaksi::with('barang')->get();
    return view('transaksi.index', compact('transaksi'));
  }

  public function create()
  {
    $karyawan = Karyawan::all();
    $barang = Barang::all();
    return view('transaksi.create', compact('karyawan', 'barang'));
  }

  public function store(Request $request)
  {
    $barang = Barang::find($request->id_barang);
    try {
      if ($request->jenis_transaksi == 'masuk') {
        $barang->increment('stok', $request->jumlah_barang);
      } else {
        $barang->decrement('stok', $request->jumlah_barang);
      }
    } catch (\Exception $err) {
      return redirect('/transaksi')->with('error', 'Gagal menambah data transaksi');
    }

    $transaksi = new Transaksi([
      'tanggal_transaksi' => $request->tanggal_transaksi,
      'jenis_transaksi' => $request->jenis_transaksi,
      'id_barang' => $request->id_barang,
      'id_karyawan' => $request->id_karyawan,
      'jumlah_barang' => $request->jumlah_barang
    ]);
    $transaksi->save();

    return redirect('/transaksi')->with('success', 'Berhasil menambahkan data transaksi.');
  }

  public function show(string $id)
  {
    $transaksi = Transaksi::with('barang', 'karyawan')->find($id);
    return view('transaksi.show', compact('transaksi'));
  }

  public function edit(string $id)
  {
    $transaksi = Transaksi::with('barang', 'karyawan')->find($id);
    $barang = Barang::all();
    $karyawan = Karyawan::all();
    return view('transaksi.edit', compact('transaksi', 'barang', 'karyawan'));
  }

  public function update(Request $request, string $id)
  {
    $transaksi = Transaksi::find($id);
    $transaksi->tanggal_transaksi = $request->tanggal_transaksi;
    $transaksi->save();
    return redirect('/transaksi')->with('success', 'Data transaksi berhasil diperbarui.');
  }

  public function destroy(string $id)
  {
    $transaksi = Transaksi::find($id);
    $transaksi->delete();
    return redirect('/transaksi')->with('success', 'Data transaksi berhasil dihapus.');
  }
}
