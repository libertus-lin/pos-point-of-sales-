<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where("user_id", Auth::id())->get();
        return view("frontend.wishlist", compact("wishlist"));
    }

    public function addToWishlist(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->product_id;
            if (Product::find($product_id)) {
                $wish = new Wishlist;
                $wish->product_id = $product_id;
                $wish->user_id = Auth::id();
                $wish->save();

                return response()->json(['success' => "Product added to wishlist"]);
            } else {
                return response()->json(['success' => "Product doesn't exist"]);
            }
        } else {
            return response()->json(['success' => "Please login first"]);
        }
    }

    public function deleteToWishlist(Request $request)
    {
        if (Auth::check())
        {
            $prod_id = $request->prod_id;
            if (Wishlist::where("product_id", $prod_id)->where('user_id', Auth::id())->exists())
            {
                $wish = Wishlist::where("product_id", $prod_id)->where('user_id', Auth::id())->first();
                $wish->delete();
                return response()->json(['success' => "Item remove to wishlist"]);
            }
        } else {
            return response()->json(['success' => "Please login first"]);
        }
    }
}
