@extends('layouts.logged')

@section('title', 'Kelola Karyawan')

@section('content')
    <h1 class="fs-3">Kelola Data Karyawan</h1>
    <p class="text-muted">Silahkan kelola data karyawan anda.</p>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show fw-medium" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/karyawan/create" class="btn btn-success"><i class="bi bi-plus-circle"></i> Tambah Karyawan</a>
    <div class="bg-white rounded p-4 my-3">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Email Karyawan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan as $i => $k)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $k->nama_karyawan }}</td>
                        <td>{{ $k->email }}</td>
                        <td>
                            <a href="{{ route('karyawan.show', $k->id) }}" class="btn btn-primary ">Show</a>
                            <a href="{{ route('karyawan.edit', $k->id) }}" class="btn btn-warning ">Edit</a>
                            <form action="{{ route('karyawan.destroy', $k->id) }}" method="POST"
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
