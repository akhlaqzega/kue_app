@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
<div class="container py-4">
    <div class="row mb-5">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-bold text-pink">Pesanan Saya</h2>
                <a href="{{ route('cakes.index') }}" class="btn btn-outline-pink">
                    <i class="fas fa-plus me-2"></i>Pesan Kue Baru
                </a>
            </div>
            <hr class="border-pink opacity-50">
        </div>
    </div>

    @if($orders->isEmpty())
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5">
                <img src="{{ asset('images/empty-order.svg') }}" alt="Empty order" class="img-fluid mb-4" style="max-height: 200px;">
                <h4 class="text-muted mb-3">Anda belum memiliki pesanan</h4>
                <p class="text-muted mb-4">Mulai pesan kue kesukaan Anda sekarang!</p>
                <a href="{{ route('cakes.index') }}" class="btn btn-pink px-4">
                    <i class="fas fa-shopping-bag me-2"></i>Lihat Katalog
                </a>
            </div>
        </div>
    @else
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">ID Pesanan</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Pembayaran</th>
                                <th>Status</th>
                                <th class="text-end pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr class="align-middle">
                                    <td class="ps-4 fw-bold text-pink">#{{ $order->id }}</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span>{{ $order->created_at->format('d M Y') }}</span>
                                            <small class="text-muted">{{ $order->created_at->format('H:i') }}</small>
                                        </div>
                                    </td>
                                    <td class="fw-bold">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                    <td>
                                        @if($order->payment_method == 'bank_transfer')
                                            <i class="fas fa-university me-2 text-primary"></i>Transfer Bank
                                        @elseif($order->payment_method == 'cash')
                                            <i class="fas fa-money-bill-wave me-2 text-success"></i>Tunai
                                        @else
                                            <i class="fas fa-credit-card me-2 text-info"></i>{{ ucfirst($order->payment_method) }}
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill bg-{{ 
                                            $order->status == 'completed' ? 'success' : 
                                            ($order->status == 'cancelled' ? 'danger' : 
                                            ($order->status == 'processing' ? 'info' : 'warning')) 
                                        }} py-2 px-3">
                                            <i class="fas fa-{{ 
                                                $order->status == 'completed' ? 'check-circle' : 
                                                ($order->status == 'cancelled' ? 'times-circle' : 
                                                ($order->status == 'processing' ? 'sync-alt' : 'clock')) 
                                            }} me-1"></i>
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-pink">
                                            <i class="fas fa-eye me-1"></i>Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

      
    @endif
</div>
@endsection