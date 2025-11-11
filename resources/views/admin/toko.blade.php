@extends('admin.layout')
@section('content')
<div class="container mt-4">
    <h2>Tabel Toko</h2>
    <a href="" class="btn btn-primary mb-3">Tambah Toko</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Toko</th>
                <th>Nama Toko</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Kontak Toko</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($toko as $t)
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href="" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
