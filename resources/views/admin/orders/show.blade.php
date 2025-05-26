@extends('layouts.admin')

@section('title', 'Detail Pesanan')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Pesanan #{{ $order->id }}</h2>

    <div class="card mb-4">
        <div class="card-header bg-pink text-white">Informasi Pelanggan</div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $order->user->name }}</p>
            <p><strong>Email:</strong> {{ $order->user->email }}</p>
            <p><strong>Alamat Pengiriman:</strong> {{ $order->shipping_address }}</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-pink text-white">Detail Pembayaran</div>
        <div class="card-body">
            <p><strong>Metode Pembayaran:</strong> {{ $order->payment_method }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Total:</strong> Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
            <p><strong>Tanggal Pesanan:</strong> {{ $order->created_at->format('d M Y, H:i') }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-pink text-white">Item Pesanan</div>
        <div class="card-body p-0">
         <table class="table mb-0">
    <thead>
        <tr>
            <th>Nama Kue</th>
            <th>Foto</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->cart->items as $item)
            <tr>
                <td>{{ $item->cake->name }}</td>
                <td>
                    <img src="{{ $item->cake->image ? asset('storage/' . $item->cake->image) : 'https://via.placeholder.com/80x80?text=No+Image' }}" 
                         alt="{{ $item->cake->name }}" 
                         style="width: 80px; height: auto; border-radius: 5px;">
                </td>
                <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

        </div>
    </div>

    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
