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
        
        $qtty = $request->qtty?$request->qtty:1;
    
        if ($product->stock >= $qtty) {
            $cart = $request->session()->get('cart');
    
            if (isset($cart[$product->id])) {
                $cart[$product->id]['qtty'] += $qtty;
            } else {
                $cart[$product->id] = [
                    'product' => $product,
                    'qtty' => $qtty,
                    'subtotal' => $qtty * $product->price,
                ];
            }
    
            $request->session()->put('cart', $cart);
            
            // Készlet frissítése
            $product->stock -= $qtty;
            $product->reserved_stock += $qtty;
            $product->save();
            
            return response()->json([
                'status' => 'success',
                
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Nincs elegendő készlet a termékből!'
            ], 400); // 400-as kód, ha hibát okoz
        }
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
        
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
    
            
            foreach ($cart as $cartItem) {
                $product = Product::find($cartItem['product']->id); 
                $qtty = $cartItem['qtty']; 
    
                
                $product->stock += $qtty; 
                $product->reserved_stock -= $qtty; 
    
                $product->save(); 
            }
    
            
            $request->session()->forget('cart');
        }
    
        
        return redirect()->back()->with('success', 'A kosár kiürítve és a készletek visszaállítva.');
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

    function adminStock()
    {
        $list = Product::get();
        return view('admin_stock', compact("list"));
    }

    function adminProductEdit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin_edit', compact('product'), compact('categories'));
    }


    function adminProductUpdate(Request $request, $id)
    {

        $product = Product::findOrFail($id);




        $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'pack' => 'nullable|string|max:255',
            'from' => 'nullable|string|max:255',
            'taste' => 'nullable|string|max:255',
            'use' => 'nullable|string|max:255',
            'ingredients' => 'nullable|string',
            'categories' => 'array'
        ]);

        $product->update([
            'name' => $request->input('name'),
            'thumbnail' => $request->input('thumbnail'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'pack' => $request->input('pack'),
            'from' => $request->input('from'),
            'taste' => $request->input('taste'),
            'use' => $request->input('use'),
            'ingredients' => $request->input('ingredients')

        ]);

        $categoryIds = $request->input('category_id', []);
        $product->categories()->sync($categoryIds);

        return redirect()->route('adminedit', $id)->with('success', 'Sikeres frissítés');
    }

    function adminProductDelete($id)
    {

        $product = Product::findOrFail($id);

        $product->categories()->detach();

        $product->delete($id);

        return redirect()->route('productlist')->with('success', 'Sikeres törlés');
    }

    function adminCreateView()
    {
        $categories = Category::all();
        return view('admin_newproduct', compact('categories'));
    }

    function adminAddProduct(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required|string|max:225',
            'thumbnail' => 'required|string',
            'description' => 'required|string',
            'price' => 'nullable|numeric',
            'pack' => 'nullable|integer',
            'from' => 'nullable|string',
            'taste' => 'nullable|string',
            'use' => 'nullable|string',
            'ingredients' => 'nullable|string',
            'categories' => 'array'
        ]);

        $product = Product::create([
            'name' => $validateData['name'],
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

    function updateStock(Request $request, $id) {

        $validated = $request->validate([
            'stock' => 'required|integer|min:0'
        ]);

        $product = Product::findOrFail($id);

        $product->stock = $validated['stock'];
        $product->save();

        return redirect()->back();
    }
}
