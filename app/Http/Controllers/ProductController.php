<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormValidate;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /*
    *   Storing image and returning path
    */
    protected function storeImage($extension)
    {
        $newImageName = rand() . "_" . time() . ".$extension" ;
        request()->photo_path->move(public_path("/images"), "$newImageName");

        return "/images/$newImageName";
    }

    /*
    *   Deleting Product
    */
    public function delete(Product $product)
    {
        $this->authorize("actions", $product);
        if($product->photo_path != "/images/default.png")
        {
            File::delete(public_path($product->photo_path));
        }

        $product->delete();
        return redirect("/");
    }

    /*
    *   Home page
    */
    public function homePage()
    {
        return view("products.home" , [
            "products" => Product::where("user_id", auth()->id())->latest()->paginate(4),
        ]);
    }

    /*
    *   Display Form to create product
    */
    public function create()
    {
        return view("products.create", [
            "type" => "Publish",
            "action" => route("product.create"),
            "product" => null
        ]);
    }

    /*
    *   Storing submitted form in DB
    */
    public function store(ProductFormValidate $request)
    {
        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            "photo_path" => request()->photo_path != null ? $this->storeImage(request()->photo_path->extension()) : "/images/default.png",
            'user_id' => auth()->user()->id,
            'price' => $request->price,

        ]);
        return redirect("/");
    }

    /*
    *   Display form to edit selected product
    */
    public function edit(Product $product)
    {
        $this->authorize("actions", $product);
        return view("products.edit" , [
            "type" => "Update",
            "product" => $product,
            "action" => route("product.update", $product->id),
        ]);
    }

    /*
    *   Updating product with new submitted information
    */
    public function update(ProductFormValidate $request, Product $product)
    {
        $this->authorize("actions", $product);
        if(request()->photo_path != null && $product->photo_path != "/images/default.png") {
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
