@extends('layouts.admin')

@section('title', 'Kelola Kue')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h3>Daftar Kue</h3>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('admin.cakes.create') }}" class="btn btn-pink">+ Tambah Kue</a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cakes as $cake)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $cake->image) }}" alt="{{ $cake->name }}" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                    </td>
                    <td>{{ $cake->name }}</td>
                    <td>Rp {{ number_format($cake->price, 0, ',', '.') }}</td>
                    <td>{{ $cake->stock }}</td>
                    <td>
                        <a href="{{ route('admin.cakes.edit', $cake) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('admin.cakes.destroy', $cake) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kue ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
