<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Cake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Auth::user()->activeCart;
        
        if (!$cart) {
            $cart = Cart::create([
                'user_id' => Auth::id(),
                'is_active' => true,
            ]);
        }

        return view('cart.index', compact('cart'));
    }

    public function add(Cake $cake, Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $cake->stock,
        ]);

        $cart = Auth::user()->activeCart;

        if (!$cart) {
            $cart = Cart::create([
                'user_id' => Auth::id(),
                'is_active' => true,
            ]);
        }

        $existingItem = $cart->items()->where('cake_id', $cake->id)->first();

        if ($existingItem) {
            $existingItem->update([
                'quantity' => $existingItem->quantity + $request->quantity,
            ]);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'cake_id' => $cake->id,
                'quantity' => $request->quantity,
                'price' => $cake->price,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Kue berhasil ditambahkan ke keranjang!');
    }

    public function update(CartItem $cartItem, Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $cartItem->cake->stock,
        ]);

        $cartItem->update([
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui!');
    }

    public function remove(CartItem $cartItem)
    {
        $cartItem->delete();
        
        return redirect()->route('cart.index')->with('success', 'Kue berhasil dihapus dari keranjang!');
    }
    
}