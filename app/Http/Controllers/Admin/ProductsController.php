<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with(['brand', 'category'])->get();
        $categories = Category::all();

        return view(
            'admin.products.index',
            [
                "title" => "Products",
                "products" => $products,
                "categories" => $categories,
            ]
        );
    }

    public function checkIfExist($request)
    {
        $product = $request->all();
        $product_code = $product['code'];

        $productExists = Product::where('code', $product_code)->exists();

        return $productExists;
    }

    public function createProduct(Request $request)
    {
        if ($this->checkIfExist($request) == 1) {
            return redirect('/admin/products')->with('error', 'Product Already In Database');
        } else {
            $new_product = $request->all();

            if ($request->has('category_id')) {
                // get the category name
                $category = $new_product['category_id'];

                // get the category fields based on the name
                $category_field = Category::where("name", $category)->first();

                // get the category ID
                $categoryID = $category_field->id;
                $new_product['category_id'] = $categoryID;
            }


            $brand = $new_product['brand_id'];
            // If brand exist in brand table
            if (Brand::where("name", $brand)->exists()) {
                $brand_field = Brand::where("name", $brand)->first();
                $brandID = $brand_field->id;
                $new_product['brand_id'] = $brandID;
            }
            // If brand doesnt exist in brand table (new brand)
            else {
                Brand::create(["name" => $brand]);

                $brand_field = Brand::where("name", $brand)->first();
                $brandID = $brand_field->id;
                $new_product['brand_id'] = $brandID;
            }

            Product::create($new_product);

            return redirect('/admin/products')->with('success', 'Product Added');
        }
    }
}
