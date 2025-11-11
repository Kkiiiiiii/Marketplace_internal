@extends('admin.layout')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">📂 Daftar Kategori</h2>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form Tambah Kategori --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form action="{{ route('kategori-store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-8">
                    <input type="text" name="nama_kategori" class="form-control" placeholder="Masukkan nama kategori" required>
                </div>
                <div class="col-md-4">
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
                <thead class="table" style="background-color: #21295c; color: white;">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori as $index => $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->nama_kategori }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted">Belum ada kategori.</td>
                        </tr>
                    @endforelse
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
    });
</script>
@endpush
@endsection
