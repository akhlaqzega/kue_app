<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cake;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $cakesCount = Cake::count();

        return view('admin.dashboard', compact('totalOrders', 'pendingOrders', 'cakesCount'));
    }
}

