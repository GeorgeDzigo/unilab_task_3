<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /*
    *   Adding product to cart
    */

    public function add(Product $product, Cart $cart)
    {
        $cart->create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
        ]);
        return redirect("/");
    }

    /*
    * Showing users their cart
    */

    public function show()
    {
        return view("cart.home", [
            "products" => Cart::where("user_id", auth()->id())->get(),
        ]);
    }

    /*
    *   Deleting carted products
    */

    public function delete(Product $product)
    {
        Cart::where("product_id", $product->id)->first()->delete();
        return redirect(route("cart.show"));
    }
}
