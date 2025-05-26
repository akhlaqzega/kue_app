@extends('layouts.app')

@section('title', $cake->name)

@section('content')
<div class="row">
    <div class="col-md-6">
        <img src="{{ $cake->image ? asset('storage/' . $cake->image) : 'https://via.placeholder.com/600x400?text=No+Image' }}" class="img-fluid rounded" alt="{{ $cake->name }}">
    </div>
    <div class="col-md-6">
        <h2>{{ $cake->name }}</h2>
        <p class="text-muted">{{ $cake->description }}</p>
        <p class="h4 text-pink">Rp {{ number_format($cake->price, 0, ',', '.') }}</p>
        <p>
            <span class="badge bg-{{ $cake->stock > 0 ? 'success' : 'danger' }}">
                {{ $cake->stock > 0 ? 'Tersedia' : 'Habis' }}
            </span>
        </p>
        
        @auth
            @if($cake->stock > 0)
                <form action="{{ route('cart.add', $cake) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <input type="number" name="quantity" value="1" min="1" max="{{ $cake->stock }}" class="form-control">
                        </div>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-pink">Tambah ke Keranjang</button>
                        </div>
                    </div>
                </form>
            @endif
        @else
            <div class="alert alert-warning mt-4">
                Silakan <a href="{{ route('login') }}" class="alert-link">login</a> untuk menambahkan kue ke keranjang.
            </div>
        @endauth
    </div>
</div>
@endsection