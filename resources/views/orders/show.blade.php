@extends('layouts.app')

@section('title', 'Detail Pesanan #' . $order->id)

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2>Detail Pesanan #{{ $order->id }}</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Item Pesanan</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kue</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->cart->items as $item)
                            <tr>
                                <td>{{ $item->cake->name }}</td>
                                <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total</th>
                            <th>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Informasi Pesanan</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Status:</span>
                        <span class="badge bg-{{ 
                            $order->status == 'completed' ? 'success' : 
                            ($order->status == 'cancelled' ? 'danger' : 'warning') 
                        }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tanggal Pesanan:</span>
                        <span>{{ $order->created_at->format('d M Y H:i') }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Metode Pembayaran:</span>
                        <span>{{ $order->payment_method }}</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Alamat Pengiriman</h5>
                <p>{{ $order->shipping_address }}</p>
            </div>
        </div>
    </div>
</div>
@endsection