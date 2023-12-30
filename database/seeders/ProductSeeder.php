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
                'description' => 'SFC FRUIT SODA - PLUM 4 x 6 x 350ml',
                'barcode' => '8',
                'price' => 28.8,
                'cost' => 21.79,
                'tax' => 0,
                'photo_url' => 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/800002E1-1688915124_AT-20002',
 
                'category_id' => 1,
                'brand_id' => 1,
            ],
            [
                'code' => '800002F9-1688918340',
                'name' => 'AT-30004',
                'description' => 'MILKITA MILK CANDY CHOCOLATE 30CT 12 x 4.23oz',
                'barcode' => '8',
                'price' => 22.2,
                'cost' => 18.65,
                'tax' => 0,
                'photo_url' => 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/800002F9-1688918340_AT-30004',

                'category_id' => 2,
                'brand_id' => 9,
            ],
            [
                'code' => '800002E6-1688916474',
                'name' => 'AT-50003',
                'description' => 'NOH FOODS CHINESE BARBECUE (CHAR SIU) 24 X 2.5OZ',
                'barcode' => '73562000207',
                'price' => 36,
                'cost' => 29.25,
                'tax' => 0,
                'photo_url' => 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/800002E6-1688916474_AT-50003',

                'category_id' => 7,
                'brand_id' => 7,
            ],
            [
                'code' => '8000034F-1689361632',
                'name' => 'AT-30165',
                'description' => "LAURA'S BISCOCHO DE MANILA 32/175G",
                'barcode' => 'QB:0103479800847',
                'price' => 48,
                'cost' => 40,
                'tax' => 0,
                'photo_url' => 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/8000034F-1689361632_AT-30165',

                'category_id' => 3,
                'brand_id' => 10,
            ],
            [
                'code' => '80000329-1689088877',
                'name' => 'AT-20041',
                'description' => 'CARABAO ENERGY DRINK 50gb x 5.07fl.oz(150ml)',
                'barcode' => 'QB:0103479800809',
                'price' => 27.5,
                'cost' => 44.5,
                'tax' => 0,
                'photo_url' => 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/80000329-1689088877_AT-20041',

                'category_id' => 1,
                'brand_id' => 8,
            ],
        ]);

    }
}
