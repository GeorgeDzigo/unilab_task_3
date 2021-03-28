<?php

namespace App\Http\Controllers;

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
    *   Validating request
    */
    protected function valid() {
        return request()->validate([
            "title" => "required",
            "description" => "required",
            "photo_path" => "mimes:jpg,png"
        ]);
    }

    /*
    *   Deleting Product
    */
    public function deleteProduct($id) {
        $product = Product::where("id", $id);
        File::delete(public_path($product->first()->photo_path));

        $product->delete();
        return redirect(route("home"));
    }

    /*
    *   Home page
    */
    public function homePage() {
        return view("products.home" , ["products" => Product::paginate(6)]);
    }

    /*
    *   Display Form to create product
    */
    public function productCreate() {
        return view("products.create", [
            "type" => "Publish",
            "action" => route("product.create"),
            "product" => "NONE",
        ]);
    }

    /*
    *   Storing submitted form in DB
    */
    public function productStore() {
        $product = Product::create($this->valid());

        if(request()->photo_path == null) {
            $product->save();
            return redirect(route("home"));
        }
        else {
            $product->photo_path = $this->storeImage(request()->photo_path->extension());
            $product->save();
            return redirect(route("home"));
        }
    }

    /*
    *   Display form to edit selected product
    */
    public function productEdit($id) {
        return view("products.edit" , [
            "type" => "Update",
            "product" => Product::where("id" , $id)->first(),
            "action" => route("product.update", $id),
            ]);
    }

    /*
    *   Updating product with new submitted information
    */
    public function productUpdate($id) {
        $this->valid();
        $product = Product::where("id", $id)->first();

        if(request()->photo_path !=null) {
            // unlink(public_path($product->first()->photo_path));
            File::delete(public_path($product->photo_path));
        }
        $product->update([
            "title" => request()->title,
            "description" => request()->description,
            "photo_path" => request("photo_path") != null ? $this->storeImage(request()->photo_path->extension()) : $product->photo_path,
        ]);

        return redirect(route("home"));
    }



}
