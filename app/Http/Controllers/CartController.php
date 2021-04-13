<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartHistory;
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
            return redirect("/");
         }

        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => 1,
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

    public function delete(Product $product, CartHistory $cartHistory)
    {
        $inCartProduct = Cart::where("product_id", $product->id)->first();
        $cartHistory->create([
            "user_id" => auth()->id(),
            "product_id" => $product->id,
            "product_price" => $product->price,
            "quantity" => $inCartProduct->quantity,
        ]);
        $inCartProduct->delete();
        return redirect(route("cart.show"));
    }
}
