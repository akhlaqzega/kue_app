<?php

namespace Database\Seeders;

use App\Models\Cake;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Admin KueKeu',
            'email' => 'admin@kue.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create sample user
        User::create([
            'name' => 'Customer Example',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Create sample cakes
        Cake::create([
            'name' => 'Red Velvet',
            'description' => 'Kue lembut dengan rasa vanilla dan coklat, dilapisi cream cheese frosting.',
            'price' => 120000,
            'stock' => 15,
            'image' => 'cakes/Red Velvet.jpg',
        ]);

        Cake::create([
            'name' => 'Chocolate Lava',
            'description' => 'Kue coklat dengan isian lelehan coklat yang lumer di mulut.',
            'price' => 95000,
            'stock' => 20,
            'image' => 'cakes/coklat.jpeg',
        ]);

        Cake::create([
            'name' => 'Tiramisu',
            'description' => 'Kue klasik Italia dengan lapisan mascarpone dan kopi.',
            'price' => 110000,
            'stock' => 12,
            'image' => 'cakes/Tiramisu.jpeg',
        ]);

        Cake::create([
    'name' => 'Strawberry Shortcake',
    'description' => 'Kue lembut dengan lapisan krim dan stroberi segar.',
    'price' => 130000,
    'stock' => 10,
    'image' => 'cakes/stroberi.jpeg',
]);

Cake::create([
    'name' => 'Lemon Tart',
    'description' => 'Kue tart dengan rasa lemon segar dan crust renyah.',
    'price' => 90000,
    'stock' => 8,
    'image' => 'cakes/lemon.jpeg',
]);

Cake::create([
    'name' => 'Black Forest',
    'description' => 'Kue coklat dengan lapisan ceri dan krim segar.',
    'price' => 125000,
    'stock' => 12,
    'image' => 'cakes/black.jpeg',
]);

Cake::create([
    'name' => 'Vanilla Cupcake',
    'description' => 'Cupcake lembut dengan topping vanilla frosting.',
    'price' => 35000,
    'stock' => 30,
    'image' => 'cakes/vanila.jpeg',
]);

Cake::create([
    'name' => 'Carrot Cake',
    'description' => 'Kue wortel klasik dengan cream cheese frosting.',
    'price' => 95000,
    'stock' => 10,
    'image' => 'cakes/carrot.jpeg',
]);

Cake::create([
    'name' => 'Mango Mousse',
    'description' => 'Kue mousse dengan rasa mangga segar dan lembut.',
    'price' => 105000,
    'stock' => 14,
    'image' => 'cakes/mango.jpeg',
]);

Cake::create([
    'name' => 'Pineapple Upside Down',
    'description' => 'Kue dengan topping nanas karamel dan tekstur lembut.',
    'price' => 110000,
    'stock' => 9,
    'image' => 'cakes/pineapple.jpeg',
]);

Cake::create([
    'name' => 'Blueberry Cheesecake',
    'description' => 'Cheesecake dengan topping blueberry segar dan lezat.',
    'price' => 120000,
    'stock' => 13,
    'image' => 'cakes/blubery.jpeg',
]);


        Cake::create([
            'name' => 'Cheesecake',
            'description' => 'Kue keju lembut dengan base crust biscuit.',
            'price' => 85000,
            'stock' => 18,
            'image' => 'cakes/Cheesecake.jpeg',
        ]);
    }
}