<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\User;
use App\Models\Product;
use App\Models\cart;
use phpDocumentor\Reflection\Types\Nullable;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $maxIterations = 6;

        return view('home', compact('products','maxIterations'));
    }

    public function Product()
    {
        $products = Product::all();
        $maxIterations = 'PHP_INT_MAX';

        return view('product', compact('products', 'maxIterations'));
    }

    public function myProduct(Request $request)
    {
        if(Auth::check()){
            $user = Auth::user();
            $products = Product::where('product_owner',$user->email)->get();

            if($user->email === 'admin@gmail.com'){
                $allUser = User::where('email', '!=', 'admin@gmail.com')->get(); 

                foreach($allUser as $perUser){
                    $allProduct = Product::where('product_owner',$perUser->email)->get();

                    $userProducts[$perUser->email] = $allProduct;
                }

                $includeView = 'admin.UserProductList';
                return view('admin/UserProducts', compact('products', 'includeView', 'userProducts', 'allUser'));
                // $allProduct = Product::whereIn('product_owner', $allUser->pluck('email'))->get();

            }else{
                $includeView = 'layouts.myProductList';
                return view('layouts/MyProducts', compact('products', 'includeView'));
            }
        }
        else{
            $includeView = 'layouts.loginWarning';
            return view('layouts/MyProducts', compact('includeView'));
        }

    }

    public function Cart(request $request)
    {
        if(Auth::check()){
            $user = Auth::user();
            $includeView = 'layouts.cartItem';
            $cart = cart::where('user_id',$user->id)->get();
            return view('Cart', compact('cart','includeView'));
        }
        else{
            $includeView = 'layouts.loginWarning';
            return view('Cart', compact('includeView'));
        }
        
    }

    public function detail($product)
    {
        $products = Product::with('User')->findOrFail($product);
        
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
        $product->product_owner = $request->product_owner;

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

    public function dropCart($id)
    {
        Cart::destroy($id);

        return redirect()->route('Cart');
    }

    public function addToCart(request $request)
    {
        $cart = new cart();
        $cart->user_id = auth()->id();
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->item_name = $request->product_name;

        $cart->save();

        return redirect()->route('Cart');
    }
}
