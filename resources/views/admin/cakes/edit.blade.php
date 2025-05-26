@extends('layouts.admin')

@section('title', 'Edit Kue')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Kue</h5>
                
                <form action="{{ route('admin.cakes.update', $cake) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kue</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $cake->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $cake->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $cake->price }}" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="{{ $cake->stock }}" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @if($cake->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $cake->image) }}" alt="{{ $cake->name }}" width="100">
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-pink">Simpan Perubahan</button>
                    <a href="{{ route('admin.cakes.index') }}" class="btn btn-outline-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection