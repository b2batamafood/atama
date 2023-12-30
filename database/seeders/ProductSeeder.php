<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {

        Product::insert([
           [
               'code' => '800002E1-1688915124',
               'name' => 'AT-20002',
               'description' => 'COCONUT MILK CHAOKOH 6 X 98OZ',
               'barcode' => '8',
               'price' => 81000000000000,
               'cost' => 28,
               'tax' => 8,
               'photo_url' => 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/800003F9-1690223174_AT-20030',

               'category_id' => 1,
               'brand_id' => 1,
           ],
            [
                'code' => '800002FB-1688918484',
                'name' => 'AT-30002',
                'description' => 'MILKITA MILK CANDY STRAWBERRY 30CT 12 x 4.23oz',
                'barcode' => '8',
                'price' => 8200000000000,
                'cost' => 22,
                'tax' => 2,
                'photo_url' => 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/80000388-1689549869_AT-22009',

                'category_id' => 2,
                'brand_id' => 2,
            ],
        ]);

    }
}
