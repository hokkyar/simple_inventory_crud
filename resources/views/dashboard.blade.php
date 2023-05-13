@extends('layouts.logged')

@section('title', 'Dashboard')

@section('content')
    <style>
        .card a {
            transition: .3s
        }

        .card a:hover {
            opacity: .8;
        }
    </style>

    <h1 class="fs-3">Selamat datang di Dashboard!</h1>
    <p class="text-muted">Silahkan pilih menu untuk mengelola data.</p>
    <div class="d-flex justify-content-evenly py-3 my-3 ">
        <div class="card" style="width: 18rem;">
            <a class="bg-primary text-white py-2 rounded" href="/barang" style="text-decoration: none; color: inherit">
                <div class="card-body text-center">
                    <i class="bi bi-diagram-2-fill" style="font-size: 80px;"></i>
                    <h5 class="card-title fs-4">
                        Kelola Barang
                    </h5>
                </div>
            </a>
        </div>
        <div class="card" style="width: 18rem;">
            <a class="bg-success text-white py-2 rounded" href="/karyawan" style="text-decoration: none; color: inherit">
                <div class="card-body text-center">
                    <i class="bi bi-people-fill" style="font-size: 80px;"></i>
                    <h5 class="card-title fs-4">
                        Kelola Karyawan
                    </h5>
                </div>
            </a>
        </div>
        <div class="card" style="width: 18rem;">
            <a class="bg-secondary text-white py-2 rounded" href="/transaksi" style="text-decoration: none; color: inherit">
                <div class="card-body text-center">
                    <i class="bi bi-clipboard-data" style="font-size: 80px;"></i>
                    <h5 class="card-title fs-4">
                        Kelola Transaksi
                    </h5>
                </div>
            </a>
        </div>
    </div>
    <div class="mb-5"></div>
@endsection
