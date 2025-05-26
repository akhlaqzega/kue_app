@extends('layouts.app')

@section('title', 'Katalog Kue')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2 class="text-center">Katalog Kue</h2>
    </div>
</div>

<div class="row">
    @foreach($cakes as $cake)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ $cake->image ? asset('storage/' . $cake->image) : 'https://via.placeholder.com/300x200?text=No+Image' }}" class="card-img-top" alt="{{ $cake->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $cake->name }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($cake->description, 50) }}</p>
                    <p class="card-text fw-bold text-pink">Rp {{ number_format($cake->price, 0, ',', '.') }}</p>
                    <p class="card-text">
                        <span class="badge bg-{{ $cake->stock > 0 ? 'success' : 'danger' }}">
                            {{ $cake->stock > 0 ? 'Tersedia' : 'Habis' }}
                        </span>
                    </p>
                </div>
                <div class="card-footer bg-white">
                    <a href="{{ route('cakes.show', $cake) }}" class="btn btn-sm btn-pink">Detail</a>
                    @auth
                        @if($cake->stock > 0)
                            <form action="{{ route('cart.add', $cake) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-sm btn-outline-pink">+ Keranjang</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection