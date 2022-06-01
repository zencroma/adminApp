<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all()->toArray();
        return array_reverse($products);
    }
    public function show($id){
        $product = Product::find($id);
        return response()->json($product);
    }
    public function store(Request $request){
        $product = new Product([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
            'description' => $request->input('description'),
        ]);
        $product->save();
        return response()->json('Product created successfully.');
    }
    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->detail = $request->input('detail');
        $product->description = $request->input('description');
        $product->save();
        return response()->json('Product updated successfully.');
    }
    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return response()->json('Product deleted successfully.');
    }
}
