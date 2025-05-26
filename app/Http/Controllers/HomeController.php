<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
    {
        // Ambil 3 kue, misal berdasarkan stok terbanyak atau terbaru
        $featuredCakes = Cake::take(3)->get();

        return view('home', compact('featuredCakes'));
    }
}