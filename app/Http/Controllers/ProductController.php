<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        $list = Product::get();
        return view('webshop', compact("list"));
    }
    function index_homepage()
    {
        $list = Product::get();
        return view('homepage', compact("list"));
    }

    public function looseLeafTeas()
    {
        $category = Category::where('name', 'Szálas teák')->first();

        $products = $category->product;
        return view('tea', compact('products'));
    }

    function addToCart(Product $product, Request $request)
    {
        if (!$request->session()->has('cart')) {
            $request->session()->put('cart', []);
        }
        $qtty = $request->qtty ? $request->qtty : 1;
        $request->session()->put('cart.' . $product->id, ['product' => $product, 'qtty' => $qtty, 'subtotal' => $qtty * $product->price]);
        // dump($request->session()->get('cart'));
        // $request->session()->forget('cart');
        return redirect()->back()->with('succes', 'Kosárba');
    }

    function updateCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        if ($request->has('update_item')) {
            $itemKey = $request->input('update_item');
            $qtty = $request->input("items.$itemKey.qtty");

            if (isset($cart[$itemKey])) {
                $cart[$itemKey]['qtty'] = $qtty;
                $cart[$itemKey]['subtotal'] = $qtty * $cart[$itemKey]['product']->price;
            }
        }

        $request->session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Cart updated successfully');
    }

    function cart()
    {
        return view('cart');
    }

    function clearCart(Request $request)
    {
        $request->session()->forget('cart');
        return redirect()->back();
    }

    function productView($id)
    {
        $product = Product::findOrFail($id);
        return view('product', compact('product'));
    }
}
