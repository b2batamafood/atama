<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\QuickbookCredential;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'firstname' => 'Madelaine',
            'lastname' => 'Fuentes',
            'company' => 'Wings Corp',
            'email' => 'vickyfarenza@gmail.com',
            'country' => 'Switzerland',
            'state' => 'Bellinzona',
            'city' => 'Bahnhofstrasse',
            'zipcode' => '6500',
            'address' => 'Obere 3',
            'phone' => '0918672675',
            'tax_id' => '321',
            'password' => 'admin123'
        ]);
        $this->call([
            QuickbookCredential::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
