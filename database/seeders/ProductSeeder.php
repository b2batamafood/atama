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
                'code' => '80000329-1689088877',
                'name' => 'AT-20041',
                'description' => 'CARABAO ENERGY DRINK 50gb x 5.07fl.oz(150ml)',
                'barcode' => 'QB:0103479800809',
                'price' => 27.5,
                'cost' => 44.5,
                'tax' => 0,
                'photo_url' => 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/80000329-1689088877_AT-20041',

                'category_id' => 1,
                'brand_id' => 15,
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
                'brand_id' => 2,
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
                'brand_id' => 16,
            ],
            [
                'code' => '80000585-1696452410',
                'name' => 'AT-30135',
                'description' => 'Cheetos Corn Sticks (Japanese Steak Flavor) 50 x 60g',
                'barcode' => '6',
                'price' => 65,
                'cost' => 48,
                'tax' => 0,
                'photo_url' => 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/80000585-1696452410_AT-30119',

                'category_id' => 3,
                'brand_id' => 3,
            ],
            [
                'code' => '800002C7-1688782020',
                'name' => 'AT-31095',
                'description' => 'UFC FLOUR STICK CANTON 30/16 OZ',
                'barcode' => 'QB:0103479800711',
                'price' => 75,
                'cost' => 63,
                'tax' => 0,
                'photo_url' => 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/800002C7-1688782020_AT-31095',

                'category_id' => 4,
                'brand_id' => 4,
            ],
            [
                'code' => '800002DE-1688914697',
                'name' => 'AT-34001',
                'description' => 'SEARAM SARDINE (HOT), OVAL 24 x 15oz',
                'barcode' => '25225011112',
                'price' => 44.4,
                'cost' => 37.60,
                'tax' => 0,
                'photo_url' => 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/800002DE-1688914697_AT-34001',

                'category_id' => 5,
                'brand_id' => 5,
            ],
            [
                'code' => '80000490-1693756753',
                'name' => 'AT-40001',
                'description' => 'SHT Zero Taiwanness Grass Jelly (Mango) 2 pack x 280gr x 18',
                'barcode' => '6',
                'price' => 49.5,
                'cost' => 27,
                'tax' => 0,
                'photo_url' => 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/80000490-1693756753_AT-40001',

                'category_id' => 6,
                'brand_id' => 6,
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
                'code' => '80000309-1689042929',
                'name' => 'AT-51007',
                'description' => 'JUFRAN BANANA SAUCE KETCHUP (HOT BIG) 18/18.5 OZ',
                'barcode' => 'QB:0103479800777',
                'price' => 31.5,
                'cost' => 23.99,
                'tax' => 0,
                'photo_url' => 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/80000309-1689042929_AT-51007',

                'category_id' => 8,
                'brand_id' => 8,
            ],
            [
                'code' => '800004E0-1694304376',
                'name' => 'AT-53001',
                'description' => 'HJH Orchid Peanut Oil 6 x 1.8L',
                'barcode' => '6',
                'price' => 84,
                'cost' => 58.99,
                'tax' => 0,
                'photo_url' => 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/800004E0-1694304376_AT-53001',

                'category_id' => 9,
                'brand_id' => 9,
            ],
        ]);

    }
}
