<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    public function store(Request $request)
    {
        $products = new Product();

        #uploadImageCondition
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . "." . $ext; # ekstensi gambar(png, jpg, dll.)
            $file->move("assets/uploads/product/", $fileName);
            $products->image = $fileName;
        }

        $products->category_id = $request->category_id;
        $products->name = $request->name;
        $products->slug = $request->slug;
        $products->small_description = $request->small_description;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->qty = $request->qty;
        $products->status = $request->status == TRUE ? "1" : "0";
        $products->trending = $request->trending == TRUE ? "1" : "0";

        $products->save();
        return redirect('products')->with("success", "Product added successfully");
    }

    public function edit($id)
    {
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.product.edit', compact('product', 'category'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/product/' . $product->image;
            if (File::exists($path))
            {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . "." . $ext; # ekstensi gambar(png, jpg, dll.)
            $file->move("assets/uploads/product/", $fileName);
            $product->image = $fileName;
        }
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->status = $request->status == TRUE ? "1" : "0";
        $product->trending = $request->trending == TRUE ? "1" : "0";

        $product->update();
        return redirect('products')->with('success', 'Product update succesfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $path = 'assets/uploads/product/' . $product->image;
        if ($product->image) {
            if (File::exists($path))
            {
                File::delete($path);
            }
        }

        $product->delete();
        return redirect('products')->with('success', 'Product has been deleted successfully');
    }
}
