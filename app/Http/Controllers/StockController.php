<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('stock.index',compact('products'));
    }
    
    public function addStock(Request $request){
        Stock::create($request->all());

        return response()->json([
            'success' => true
        ]);
    }
    
    public function getStocks(){
        $stocks = Stock::all();
        
        foreach ($stocks as $key => $stock) {
            $data[$key]['id'] = $stock->id;
            $data[$key]['stock'] = $stock->stock;
            $data[$key]['product_name'] = $stock->product->name;
        }
        
        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }
    

    public function getSingleData(Request $request){
        $stock = Stock::find($request->id);

        return response()->json([
            'success' => true,
            'data' => $stock,
        ]);

    }
    
    
    public function updateStock(Request $request){
        Stock::find($request->id)->update($request->all());

        return response()->json([
            'success' => true
        ]);
    }

    
    public function deleteStock(Request $request){
        Stock::find($request->id)->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
