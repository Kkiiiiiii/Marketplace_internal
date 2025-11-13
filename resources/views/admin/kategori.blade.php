@extends('admin.layout')
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4"> Daftar Kategori</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Form Tambah Kategori --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form action="{{ route('kategori-store') }}" method="POST" class="row g-3">
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

        {{-- Tabel Kategori --}}
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped table-cust" id="kategoriTable">
                    <thead class="table">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                {{-- Nama Kategori / Input Edit --}}
                                <td>
                                    <span class="kategori-nama">{{ $k->nama_kategori }}</span>
                                    <form action="{{ route('kategori-update',  Crypt::encrypt($k->id_kategori))  }}" method="POST"
                                        class="d-none edit-form">
                                        @csrf

                                        <div class="input-group">
                                            <input type="text" name="nama_kategori" value="{{ $k->nama_kategori }}"
                                                class="form-control" required>
                                            <button type="submit" class="btn btn-success btn-sm">Save</button>
                                            <button type="button"
                                                class="btn btn-secondary btn-sm cancel-edit">Cancel</button>
                                        </div>
                                    </form>
                                </td>

                                {{-- Aksi --}}
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm edit-btn">Edit</button>
                                    <form action="{{ route('kategori-delete',  Crypt::encrypt($k->id_kategori)) }}" method="POST"
                                        style="display:inline;" onsubmit="return confirm('Yakin ingin hapus?')">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
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

                // Toggle edit form
                $('.edit-btn').click(function() {
                    let row = $(this).closest('tr');
                    row.find('.kategori-nama').hide();
                    row.find('.edit-form').removeClass('d-none');
                    $(this).hide();
                });

                // Cancel edit
                $('.cancel-edit').click(function() {
                    let row = $(this).closest('tr');
                    row.find('.edit-form').addClass('d-none');
                    row.find('.kategori-nama').show();
                    row.find('.edit-btn').show();
                });
            });
        </script>
    @endpush
@endsection
