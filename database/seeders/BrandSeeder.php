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
            ['name'=>'SFC', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'PARROT', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'FOCO', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'COJO-COJO', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'SIJI', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'MOGU', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'NOH FOODS', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'CARABAO', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'MILKITA', 'created_at' => now(),'updated_at' => now()],
            ['name'=>'LAURA', 'created_at' => now(),'updated_at' => now()],
        ]);
    }
}
