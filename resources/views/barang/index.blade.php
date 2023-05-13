@extends('layouts.logged')

@section('title', 'Kelola Barang')

@section('content')

    <h1 class="fs-3">Kelola Data Barang</h1>
    <p class="text-muted">Silahkan kelola barang di toko anda.</p>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show fw-medium" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/barang/create" class="btn btn-success"><i class="bi bi-plus-circle"></i> Tambah Barang</a>
    <div class="bg-white rounded p-4 my-3">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Stok Barang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $i => $b)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $b->nama_barang }}</td>
                        <td>{{ $b->stok }}</td>
                        <td>
                            <a href="{{ route('barang.show', $b->id) }}" class="btn btn-primary ">Show</a>
                            <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning ">Edit</a>
                            <form action="{{ route('barang.destroy', $b->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Anda yakin ingin menghapus data ini?')" type="submit"
                                    class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mb-5"></div>
@endsection
