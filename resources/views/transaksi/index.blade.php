@extends('layouts.logged')

@section('title', 'Kelola Transaksi')

@section('content')
    <h1 class="fs-3">Kelola Data Transaksi</h1>
    <p class="text-muted">Silahkan kelola data transaksi di toko anda.</p>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show fw-medium" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show fw-medium" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (count($barang) == 0 || count($karyawan) == 0)
        <button class="btn btn-success" disabled><i class="bi bi-plus-circle"></i> Tambah Transaksi</button>
        <p></p>
    @else
        <a href="/transaksi/create" class="btn btn-success"><i class="bi bi-plus-circle"></i> Tambah Transaksi</a>
    @endif

    <div class="bg-white rounded p-4 my-3">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Transaksi</th>
                    <th>Jenis Transaksi</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $i => $t)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $t->tanggal_transaksi }}</td>
                        @if ($t->jenis_transaksi == 'masuk')
                            <td class="text-success fw-medium">{{ strtoupper($t->jenis_transaksi) }}</td>
                        @else
                            <td class="text-danger">{{ strtoupper($t->jenis_transaksi) }}</td>
                        @endif
                        <td>{{ $t->barang->nama_barang }}</td>
                        <td>{{ $t->jumlah_barang }}</td>
                        <td>
                            <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-primary ">Show</a>
                            <a href="{{ route('transaksi.edit', $t->id) }}" class="btn btn-warning ">Edit</a>
                            <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST"
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
