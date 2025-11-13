@extends('admin.layout')
@section('content')
<div class="container mt-4">
    <h3 class="mb-4">👤 Daftar User</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('user-create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah User
        </a>
    </div>

    <table class="table table-bordered table-striped table-cust" id="userTable">
        <thead class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kontak</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $u)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->kontak }}</td>
                <td>{{ $u->username }}</td>
                <td>{{ $u->role }}</td>
                <td>
                    <a href="{{ route('user-edit', Crypt::encrypt($u->id_user)) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil"></i> Edit</a>
                    <form action="{{ route('user-delete', Crypt::encrypt($u->id_user)) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin hapus?')">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
        "ordering": false,
        "searching": true,
        });
    });
</script>
@endpush
@endsection
