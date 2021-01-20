<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('layouts.backend.products.index', array('products' => $products));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        return view('layouts.backend.products.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $filename = $request->images->getClientOriginalName();
        $product = new Product;
        $product->name = $request->name;
        $product->images = $filename;
        $product->phukien = $request->phukien;
        $product->price = $request->price;
        $product->baohanh = $request->baohanh;
        $product->khuyenmai = $request->khuyenmai;
        $product->tinhtrang = $request->tinhtrang;
        $product->desc = $request->desc;
        $product->brand_id = $request->brand_id;
        $product->save();
        $request->images->move(public_path('upload'),$filename);

        // $product = Product::create($request->all());
        if($product) {
            return redirect()->route('products.index');
        }
        return redirect()->route('products.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brands = Brand::all();
        $product = \App\Models\Product::find($id);
        return view('layouts.frontend.details', array('product' => $product, 'brand' => $brands));
    }


    public function showhang($id)
    {
        $brands = Brand::all();
        $product = \App\Models\Product::find($id);
        return view('layouts.frontend.details', array('product' => $product, 'brand' => $brands));
    }
    
    

//     public function getCategory();
//     brands = Brand::all();
//         $product = \App\Models\Product::find($id);
//         return view('layouts.frontend.details', array('product' => $product, 'brand' => $brands));

// }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $product = Product::find($id)   ;
    

        return view('layouts.backend.products.edit',array('product'=>$product));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->desc = $request['desc'];
        $product->images = $request['images'];
        $product->brand_id = $request['brand_id'];
        $product->save();
        if($product){
            return redirect()->route('products.index');
        }
        return redirect()->route('products.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
