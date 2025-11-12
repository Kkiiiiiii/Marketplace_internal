@extends('admin.layout')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">➕ Tambah User</h2>

    <form action="{{ route('user-store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kontak</label>
            <input type="text" name="kontak" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin-user') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
