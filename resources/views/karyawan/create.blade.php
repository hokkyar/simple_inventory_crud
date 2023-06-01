@extends('layouts.logged')

@section('title', 'Kelola Karyawan')

@section('content')
    <h1 class="fs-3 text-center">Tambah Data Karyawan</h1>
    @if (session('error'))
        <div class="w-50 mx-auto alert alert-danger alert-dismissible fade show fw-medium" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="w-50 mx-auto bg-white rounded p-4 my-3">
        <div class="mb-3">
            <form action="/karyawan" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                    <input name="nama_karyawan" type="text" class="form-control" id="nama_karyawan"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Karyawan</label>
                    <input name="email" type="text" min="0" class="form-control" id="email"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Nomor Telepon</label>
                    <input name="telepon" type="text" min="0" class="form-control" id="telepon"
                        aria-describedby="emailHelp">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="/karyawan" style="text-decoration: none;" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    <div class="mb-5"></div>
@endsection
