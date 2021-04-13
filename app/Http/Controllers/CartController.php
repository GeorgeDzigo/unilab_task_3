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

    public function add(Product $product)
    {
         if ($cart = Cart::where("user_id", auth()->id())->where("product_id", $product->id)->first()) {
            $cart->update([
                "quantity" => ++$cart->quantity,
                ]);
            return redirect(route("home"));
         }

        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => 1,
        ]);
        return redirect(route("home"));
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
