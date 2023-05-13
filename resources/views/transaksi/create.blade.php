@extends('layouts.logged')

@section('title', 'Kelola Transaksi')

@section('content')
    <h1 class="fs-3 text-center">Tambah Data Transaksi</h1>
    <div class="w-50 mx-auto bg-white rounded p-4 my-3">
        <div class="mb-3">
            <form action="/transaksi" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                    <input name="tanggal_transaksi" type="date" class="form-control" id="tanggal_transaksi"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="jenis_transaksi" class="form-label">Jenis Transaksi</label>
                    <div class="form-check">
                        <input value="masuk" class="form-check-input" type="radio" name="jenis_transaksi" id="masuk"
                            checked>
                        <label class="form-check-label" for="masuk">
                            MASUK
                        </label>
                    </div>
                    <div class="form-check">
                        <input value="keluar" class="form-check-input" type="radio" name="jenis_transaksi" id="keluar">
                        <label class="form-check-label" for="keluar">
                            KELUAR
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                    <input name="jumlah_barang" type="number" min="0" class="form-control" id="jumlah_barang"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="id_barang" class="form-label">Nama Barang</label>
                    <select name="id_barang" class="form-select" aria-label="Default select example">
                        @foreach ($barang as $b)
                            <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_karyawan" class="form-label">Nama Karyawan</label>
                    <select name="id_karyawan" class="form-select" aria-label="Default select example">
                        @foreach ($karyawan as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_karyawan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="/transaksi" style="text-decoration: none;" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    <div class="mb-5"></div>
@endsection
