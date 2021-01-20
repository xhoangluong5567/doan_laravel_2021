<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ProductBrand;
use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        return api_success(
            array('data' => Brand::all())
        );
    }


    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return api_success(
            array('data' => $brand->products)
        );
    }

    public function search(Request $request, $id){
        $product_brand = Brand::find($id);
        $products = $product_brand->products->where('name', 'like', "%$product_brand");
        return api_success(
            array('data' => $products)
        );
    }
}