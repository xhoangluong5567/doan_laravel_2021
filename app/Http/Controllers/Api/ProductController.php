<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return api_success(
            array('data' => Product::all())
        );
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return api_success(
            array('data' => $product)
        );
    }

    public function search(Request $request){
        $key_word = $request->input('key_word');
        $products = Product::where('name', 'like', "%$key_word")->get();
        return api_success(
            array('data' => $products)
        );
    }
}