<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index() {
        $list = Product::get();
        return view('webshop', compact("list"));
    }
    function index_homepage() {
        $list = Product::get();
        return view('homepage', compact("list"));
    }

    function addToCart(Product $product, Request $request) {
        if(!$request->session()->has('cart')) {
            $request->session()->put('cart', []);
        }
        $qtty = $request->qtty?$request->qtty:1;
        $request->session()->put('cart.'.$product->id, ['product'=>$product, 'qtty'=>$qtty, 'subtotal'=>$qtty * $product->price]);
        // dump($request->session()->get('cart'));
        // $request->session()->forget('cart');
        return redirect()->back()->with('succes', 'Kosárba');
    }

    function cart() {
        return view('cart');
    }

    function clearCart(Request $request) {
        $request->session()->forget('cart');
        return redirect()->back();
    }

    function productView($id) {
        $product = Product::findOrFail($id);
        return view('product', compact('product'));
    }

}
