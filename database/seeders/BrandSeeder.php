<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Brand::insert([
            ['name'=>'BEVERAGE', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'MILKITA', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'WASUKA', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'MAMA', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'COCONUT MILK', 'created_at' => now(),'updated_at' => now()],
        ]);
    }
}
