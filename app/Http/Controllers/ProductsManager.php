<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsManager extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::paginate(9);

        return view('products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addToCart($id)
    {
        $cart = new Carts();
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $id;
        if ($cart->save()) {
            return redirect()->back()->with('success', 'Product added to the cart successfully!');
        }
        return redirect()->back()->with('error', 'Something went wrong!!');
    }

    public function showCart()
    {
        $cartItems = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select(
                "carts.product_id",
                DB::raw("count(*) as quantity"),
                'products.title',
                'products.price',
                'products.image',
                'products.slug'
            )
            ->where("carts.user_id", auth()->user()->id)
            ->groupBy("carts.product_id", "products.title", "products.price", "products.image", "products.slug")->paginate(5);
        return view("cart", compact("cartItems"));
    }

    /**
     * Display the specified resource.
     */
    public function details($slug)
    {
        $products = Products::where('slug', $slug)->first();
        return view('details', ['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
