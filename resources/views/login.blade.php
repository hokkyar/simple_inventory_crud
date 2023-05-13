@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="d-flex justify-content-center mb-3">
        <div class="w-50 bg-white py-5 px-4 rounded">
            <h1 class="display-6 fw-medium">Login</h1>
            <p class="lead">Silahkan login terlebih dahulu.</p>
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            <form action="/login" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="username" class="form-label"><i class="bi bi-person-fill"></i> Username</label>
                    <input name="username" type="text" class="form-control" id="username" aria-describedby="emailHelp"
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"><i class="bi bi-lock-fill"></i> Password</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="/" style="text-decoration: none;">Kembali</a>
                </div>
            </form>
        </div>
    </div>
    <div class="mb-5"></div>
@endsection
