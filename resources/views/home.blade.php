@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <style>
        .card a {
            transition: .3s
        }

        .card a:hover {
            opacity: .8;
        }
    </style>

    <div class="d-flex justify-content-evenly py-3 my-3">
        <div>
            <h1 class="display-4">Selamat Datang!</h1>
            <p class="lead">Kelola data barang dengan lebih mudah.</p>
            <div class="d-flex gap-3">
                <div class="card" style="width: 18rem;">
                    <a class="bg-dark text-white" href="/login" style="text-decoration: none; color: inherit">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <i class="bi bi-door-open-fill"></i>
                                Login
                            </h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <img class="rounded-circle"
            src="https://th.bing.com/th/id/OIP.vyQ-v0HXZRcYefniqQhhdwHaHa?pid=ImgDet&w=612&h=612&rs=1" alt=""
            width="250">
    </div>
    <div class="mb-5"></div>
@endsection
