<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;

class CakeController extends Controller
{
    public function index()
    {
        $cakes = Cake::all();
        return view('cakes.index', compact('cakes'));
    }

    public function show(Cake $cake)
    {
        return view('cakes.show', compact('cake'));
    }

    // Admin methods
    public function adminIndex()
    {
     $cakes = Cake::latest()->paginate(10);
        
        return view('admin.cakes.index', compact('cakes'));
    }

    public function create()
    {
        return view('admin.cakes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('cake_images', 'public');
        }

        Cake::create($validated);

        return redirect()->route('admin.cakes.index')->with('success', 'Kue berhasil ditambahkan!');
    }

    public function edit(Cake $cake)
    {
        return view('admin.cakes.edit', compact('cake'));
    }

    public function update(Request $request, Cake $cake)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($cake->image) {
                Storage::disk('public')->delete($cake->image);
            }
            $validated['image'] = $request->file('image')->store('cake_images', 'public');
        }

        $cake->update($validated);

        return redirect()->route('admin.cakes.index')->with('success', 'Kue berhasil diperbarui!');
    }

    public function destroy(Cake $cake)
    {
        if ($cake->image) {
            Storage::disk('public')->delete($cake->image);
        }
        
        $cake->delete();
        return redirect()->route('admin.cakes.index')->with('success', 'Kue berhasil dihapus!');
    }
}