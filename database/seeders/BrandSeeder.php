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
            // beverage
            ['name'=>'SFC', 'created_at' => now(),'updated_at' => now()],

            // candy
            ['name'=>'MILKITA', 'created_at' => now(),'updated_at' => now()],

            // snack
            ['name'=>'CHEETOS', 'created_at' => now(),'updated_at' => now()],

            // noodle
            ['name'=>'UFC', 'created_at' => now(),'updated_at' => now()],

            // can food
            ['name'=>'SEARAM', 'created_at' => now(),'updated_at' => now()],

            // dessert
            ['name'=>'SHT ZERO', 'created_at' => now(),'updated_at' => now()],

            // condiment
            ['name'=>'NOH FOODS', 'created_at' => now(),'updated_at' => now()],

            // sauce
            ['name'=>'JUFRAN', 'created_at' => now(),'updated_at' => now()],

            // cooking oil
            ['name'=>'HJH ORCHID', 'created_at' => now(),'updated_at' => now()],

            ['name'=>'PARROT', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'FOCO', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'COJO-COJO', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'SIJI', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'MOGU', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'CARABAO', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'LAURA', 'created_at' => now(),'updated_at' => now()],
        ]);
    }
}
