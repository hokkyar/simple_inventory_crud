@extends('layouts.logged')

@section('title', 'Kelola Transaksi')

@section('content')
    <h1 class="fs-3 text-center">Show Data Transaksi</h1>
    <div class="w-50 mx-auto bg-white rounded p-4 my-3">
        <div class="mb-3">
            <div class="mb-3">
                <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                <input value="{{ $transaksi->tanggal_transaksi }}" name="tanggal_transaksi" type="text" class="form-control"
                    id="tanggal_transaksi" aria-describedby="emailHelp" disabled>
            </div>
            <div class="mb-3">
                <label for="jenis_transaksi" class="form-label">Jenis Transaksi</label>
                <input value="{{ strtoupper($transaksi->jenis_transaksi) }}" name="jenis_transaksi" type="text"
                    class="form-control" id="jenis_transaksi" aria-describedby="emailHelp" disabled>
            </div>
            <div class="mb-3">
                <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                <input value="{{ $transaksi->jumlah_barang }}" name="jumlah_barang" type="number" min="0"
                    class="form-control" id="jumlah_barang" aria-describedby="emailHelp" disabled>
            </div>
            <div class="mb-3">
                <label for="id_barang" class="form-label">Nama Barang</label>
                <input value="{{ $transaksi->barang->nama_barang }}" name="id_barang" type="text" class="form-control"
                    id="id_barang" aria-describedby="emailHelp" disabled>
            </div>
            <div class="mb-3">
                <label for="id_karyawan" class="form-label">Nama Karyawan</label>
                <input value="{{ $transaksi->karyawan->nama_karyawan }}" name="id_karyawan" type="text"
                    class="form-control" id="id_barang" aria-describedby="emailHelp" disabled>
            </div>
            <a href="/transaksi" style="text-decoration: none;" class="btn btn-warning">Kembali</a>
        </div>
    </div>
    <div class="mb-5"></div>
@endsection
