<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('products.index');
    }
    
    public function getProducts(){
        $products = Product::all();

        return response()->json([
            'success' => true,
            'data' => $products,
        ]);
    }
    
    public function addProduct(Request $request){
        Product::create($request->all());

        return response()->json([
            'success' => true
        ]);
    }


    public function getSingleData(Request $request){
        $product = Product::find($request->id);

        return response()->json([
            'success' => true,
            'data' => $product,
        ]);

    }
    
    public function updateProduct(Request $request){
        Product::find($request->id)->update($request->all());

        return response()->json([
            'success' => true
        ]);
    }

    

    public function deleteProduct(Request $request){
        Product::find($request->id)->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
