<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /*
    *   Home page
    */
    public function homePage() {
        // dd(Product::paginate(2));
        return view("products.home" , ["products" => Product::paginate(6)]);
    }
    /*
    *   Creating and storing pages
    */
    public function productCreate() {
        return view("products.create", [
            "type" => "Publish",
            "action" => route("product.create"),
            "product" => "NONE",
        ]);
    }

    public function productStore() {
        $validated = request()->validate([
            "title" => "required",
            "description" => "required",
            "photo_path" => "mimes:jpg,png|"
        ]);

        $product = Product::create($validated);
        if(request()->photo_path == null) {
            $product->save();
            return redirect(route("home"));
        }
        else {

            $newImageName = rand() . "_" . time() . "." .request()->photo_path->extension();
            request()->photo_path->move(public_path("/images"), "$newImageName");

            $product->photo_path = "/images/$newImageName";
            $product->save();

            return redirect(route("home"));
        }

    }
    /*
    *   Editing and updating pages
    */

    public function productEdit($id) {
        return view("products.edit" , [
            "type" => "Update",
            "product" => Product::where("id" , $id)->first(),
            "action" => route("product.update", $id),
            ]);
    }

    public function productUpdate($id) {
        Product::where("id", $id)->update([
            "title" => request()->title,
            "description" => request()->description
        ]);
        return redirect(route("home"));
    }

    public function deleteProduct($id) {
        Product::where("id", $id)->delete();
        return redirect(route("home"));
    }
}
