@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2>Keranjang Belanja</h2>
    </div>
</div>

@if($cart->items->isEmpty())
    <div class="alert alert-info">
        Keranjang belanja Anda kosong. <a href="{{ route('cakes.index') }}" class="alert-link">Lihat katalog kue</a>.
    </div>
@else
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kue</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart->items as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $item->cake->image ? asset('storage/' . $item->cake->image) : 'https://via.placeholder.com/100x100?text=No+Image' }}" width="50" height="50" class="rounded me-3" alt="{{ $item->cake->name }}">
                                            <div>
                                                <h6 class="mb-0">{{ $item->cake->name }}</h6>
                                                <small class="text-muted">Stok: {{ $item->cake->stock }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td>
                                        <form action="{{ route('cart.update', $item) }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->cake->stock }}" style="width: 60px;" class="form-control form-control-sm">
                                        </form>
                                    </td>
                                    <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $item) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ringkasan Belanja</h5>
                    <table class="table">
                        <tr>
                            <th>Total</th>
                            <td class="text-end">Rp {{ number_format($cart->total, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('checkout') }}" class="btn btn-pink w-100">Checkout</a>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection

@push('scripts')
<script>
    document.querySelectorAll('input[name="quantity"]').forEach(input => {
        input.addEventListener('change', function() {
            this.closest('form').submit();
        });
    });
</script>
@endpush