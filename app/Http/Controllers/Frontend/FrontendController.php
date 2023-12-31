<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
// use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(15)->get();
        $trending_category = Category::where('popular', '1')->take(15)->get();
        return view("frontend.index", compact("featured_products", "trending_category"));
    }

    public function category()
    {
        $category = Category::where("status", "0")->get();
        return view("frontend.category", compact("category"));
    }

    public function viewCategory($slug)
    {
        if (Category::where("slug", $slug)->exists())
        {
            $category = Category::where("slug", $slug)->first();
            $products = Product::where("category_id", $category->id)->where('status', '0')->get();

            return view('frontend.products.index', compact('category','products'));
        }
        else {
            return redirect("/")->with("success","Slug doesnot exists");
        }
    }

    public function viewProduct($category_slug, $product_slug)
    {
        if (Category::where("slug", $category_slug)->exists())
        {
            if (Product::where("slug", $product_slug)->exists()) {
                $products = Product::where("slug", $product_slug)->first();
                return view('frontend.products.view', compact('products'));
            }
            else {
                return redirect("/")->with("success","The link was broken");
            }
        }
        else {
            return redirect("/")->with("success","No such category found");
        }
    }
}
