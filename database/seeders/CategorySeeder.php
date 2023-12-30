<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Category::insert([
           ['name'=>'Beverage', 'image' => 'beverage.jpg','created_at' => now(),'updated_at' => now()],
           ['name'=>'Candy', 'image' => 'candy.jpeg','created_at' => now(),'updated_at' => now()],
           ['name'=>'Snack', 'image' => 'snack.jpg','created_at' => now(),'updated_at' => now()],
           ['name'=>'Noodle', 'image' => 'noodle.jpg','created_at' => now(),'updated_at' => now()],
           ['name'=>'Can Food', 'image' => 'can_food.jpg','created_at' => now(),'updated_at' => now()],
           ['name'=>'Dessert', 'image' => 'dessert.jpeg','created_at' => now(),'updated_at' => now()],
           ['name'=>'Condiment', 'image' => 'condiments.jpg','created_at' => now(),'updated_at' => now()],
           ['name'=>'Sauce', 'image' => 'sauce.jpg','created_at' => now(),'updated_at' => now()],
           ['name'=>'Cooking Oil', 'image' => 'cooking_oil.jpeg','created_at' => now(),'updated_at' => now()],
        ]);
    }
}
