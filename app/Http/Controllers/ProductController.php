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

    public function matchatea()
    {
        $category = Category::where('name', 'Matcha teák')->first();

        $products = $category->product;
        return view('matcha_page', compact('products'));
    }

    public function accessory()
    {
        $category = Category::where('name', 'Kiegészítők')->first();

        $products = $category->product;
        return view('accessory', compact('products'));
    }

    public function other()
    {
        $category = Category::where('name', 'Egyéb')->first();

        $products = $category->product;
        return view('other', compact('products'));
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

    // Admin

    function admin_product()
    {
        $list = Product::get();
        return view('admin_productlist', compact("list"));
    }

    function adminProductEdit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin_edit', compact('product'));
    }


    function adminProductUpdate(Request $request, $id) {

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('adminedit', $id)->with('success', 'Sikeres frissítés');

    }

    function adminProductDelete($id) {

        $product = Product::findOrFail($id);

        $product->categories()->detach();

        $product->delete($id);

        return redirect()->route('productlist')->with('success', 'Sikeres törlés');

    }

    function adminCreateView() {
        $categories = Category::all();
        return view('admin_newproduct', compact('categories'));
    }

    function adminAddProduct(Request $request) {

        $validateData = $request->validate([
            'name'=> 'required|string|max:225',
            'thumbnail' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'pack' => 'required|integer',
            'from' => 'required|string',
            'taste' => 'required|string',
            'use' => 'required|string',
            'ingredients' => 'required|string',
            'categories' => 'array'
        ]);

        $product = Product::create([
            'name'=> $validateData['name'],
            'thumbnail' => $validateData['thumbnail'],
            'description' => $validateData['description'],
            'price' => $validateData['price'],
            'pack' => $validateData['pack'],
            'from' => $validateData['from'],
            'taste' => $validateData['taste'],
            'use' => $validateData['use'],
            'ingredients' => $validateData['ingredients']
        ]);

        if ($request->has('categories')) {
            $product->categories()->attach($validateData['categories']);
        }

        return redirect()->route('productlist')->with('success', 'Sikeresen hozzáadtad a terméket!');

    }
}
