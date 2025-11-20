@extends('admin.layout')
@section('content')
<style>
         table#userTable thead th {
            text-align: center;
            /* rata tengah horizontal */
            vertical-align: middle;
            /* rata tengah vertikal */
        }

        /* Styling untuk badge oval di dalam tabel */
        .circle-bg {
            background-color: green;
            color: white;
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            min-width: 60px;
            text-align: center;
            font-weight: 600;
            font-size: 0.6rem;
            white-space: nowrap;
            /* supaya teks tidak pecah ke baris baru */
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            /* efek sedikit shadow supaya naik */
            transition: background-color 0.3s ease;
        }
</style>
<div class="container my-5">
    <h3 class="mb-4">👤 Daftar User</h3>
    <hr>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('user-create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah User
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-cust align-middle" id="userTable">
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
                    <td><span class="circle-bg">{{ $u->username }}</span></td>
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
