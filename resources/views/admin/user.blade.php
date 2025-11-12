@extends('admin.layout')
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-center">Daftar User</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Form Tambah Kategori --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form action="{{ route('user-store') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-8">
                        <input type="text" name="nama_kategori" class="form-control" placeholder="Masukkan nama kategori"
                            required>
                    </div>
                    <div class="col-md-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-plus-circle"></i> Tambah Kategori
                        </button>
                    </div>
                </form>

            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped table-cust" id="kategoriTable">
                    <thead class="table" style="background-color: #21295c; color: white;">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kontak</th>
                            <th>Username</th>
                            <th>role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach ($user as $u)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->kontak }}</td>
                                <td>{{ $u->username }}</td>
                                <td>{{ $u->role }}</td>

                                <td>
                                    <a href="" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>


                                    <form action="" method="POST" style="display:inline;"
                                        onsubmit="return confirm('Yakin ingin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#kategoriTable').DataTable({
                    "ordering": false,
                    "searching": true
                });
            });
        </script>
    @endpush
@endsection
