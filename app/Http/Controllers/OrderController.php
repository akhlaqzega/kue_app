<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Cake;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // =======================
    // USER SECTION
    // =======================

    public function checkout()
    {
        $cart = Auth::user()->activeCart;

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja Anda kosong.');
        }

        return view('orders.checkout', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'payment_method' => 'required|in:COD,Transfer',
        ]);

        $cart = Auth::user()->activeCart;

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja Anda kosong.');
        }

        // Check stock availability
        foreach ($cart->items as $item) {
            if ($item->cake->stock < $item->quantity) {
                return redirect()->route('cart.index')->with('error', 'Stok kue ' . $item->cake->name . ' tidak mencukupi.');
            }
        }

        // Create order
        $order = Order::create([
            'user_id'          => Auth::id(),
            'cart_id'          => $cart->id,
            'payment_method'   => $request->payment_method,
            'total_amount'     => $cart->total,
            'shipping_address' => $request->shipping_address,
            'status'           => 'pending',
        ]);

        // Update stock
        foreach ($cart->items as $item) {
            $item->cake->decrement('stock', $item->quantity);
        }

        // Deactivate cart
        $cart->update(['is_active' => false]);

return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function index()
    {
        $cakes = Cake::all();
        $orders = Auth::user()->orders()->latest()->get();

        return view('orders.index', compact('orders', 'cakes'));
    }

    public function show(Order $order)
    {
        // Cegah akses ke pesanan milik user lain
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('orders.show', compact('order'));
    }

    // =======================
    // ADMIN SECTION
    // =======================

    public function adminIndex()
    {
        $orders = Order::latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function adminShow(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Order $order, Request $request)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
}
