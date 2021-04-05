<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormValidate;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /*
    *   Storing image and returning path
    */
    protected function storeImage($extension) {
        $newImageName = rand() . "_" . time() . ".$extension" ;
        request()->photo_path->move(public_path("/images"), "$newImageName");

        return "/images/$newImageName";
    }

    /*
    *   Deleting Product
    */
    public function delete(Product $product) {
        File::delete(public_path($product->photo_path));
        $product->delete();

        return redirect("/");
    }

    /*
    *   Home page
    */
    public function homePage() {return view("products.home" , ["products" => Product::paginate(6)]);}

    /*
    *   Display Form to create product
    */
    public function create() {
        return view("products.create", [
            "type" => "Publish",
            "action" => route("product.create"),
            "product" => "NONE",
        ]);
    }

    /*
    *   Storing submitted form in DB
    */
    public function store(FormValidate $formValidate) {
        Product::create([
            'title' => $formValidate->title,
            'description' => $formValidate->description,
            "photo_path" => request()->photo_path != null ? $this->storeImage(request()->photo_path->extension()) : "./default.png",
            'user_id' => auth()->user()->id,
        ]);
        return redirect("/");
    }

    /*
    *   Display form to edit selected product
    */
    public function edit(Product $product) {
        return view("products.edit" , [
            "type" => "Update",
            "product" => $product,
            "action" => route("product.update", $product->id),
        ]);
    }

    /*
    *   Updating product with new submitted information
    */
    public function update(FormValidate $formValidate, Product $product) {
        if(request()->photo_path !=null) {
            unlink(public_path($product->photo_path));
        }

        $product->update([
            "title" => request()->title,
            "description" => request()->description,
            "photo_path" => request("photo_path") != null ? $this->storeImage(request()->photo_path->extension()) : $product->photo_path,
        ]);

        return redirect("/");
    }
}
