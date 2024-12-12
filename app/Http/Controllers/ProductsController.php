<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('home', compact('products'));
    }

    public function Product()
    {
        $products = Product::all();

        return view('product', compact('products'));
    }

    public function myProduct()
    {
        $products = Product::all();
        $includeView = 'layouts.myProductList';

        return view('layouts/MyProducts', compact('products', 'includeView'));
    }

    public function detail($product)
    {
        $products = Product::findOrFail($product);
        
        return view('layouts/details', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:30',
            'price' => 'required|numeric',
            'product_description' => 'required|string|max:255',
            'image' => 'required|image|mimes:PNG,jpeg,png,jpg,gif|max:2000048',
        ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->product_description = $request->product_description;

        $imageName = $request->image->getClientOriginalName();  
        $request->image->move(public_path('images/Products-Images'), $imageName);
        $product->image = $imageName;
        
        $product->save();

        return redirect()->route('MyProducts');
    }

    public function drop($id)
    {
        Product::destroy($id);

        return redirect()->route('MyProducts');
    }
}
