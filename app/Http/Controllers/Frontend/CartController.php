<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        $product_id = $request->product_id;
        $product_qty = $request->product_qty;

        if (Auth::check()) {
            $product_check = Product::where("id", $product_id)->first();
            if ($product_check) {
                if (Cart::where("product_id", $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['success' => $product_check->name . " Already added to cart"]);
                } else {
                    $cartItem = new Cart;
                    $cartItem->product_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_qty = $product_qty;

                    $cartItem->save();
                    return response()->json(['success' => $product_check->name . " Added to cart"]);
                }
            }
        } else {
            return response()->json(['success' => "Please login first"]);
        }
    }

    public function viewCart()
    {
        $cartItems = Cart::where("user_id", Auth::id())->get();
        return view("frontend.cart", compact("cartItems"));
    }

    public function updateToCart(Request $request)
    {
        $product_id = $request->prod_id;
        $product_qty = $request->prod_qty;

        if (Auth::check())
        {
            if (Cart::where("product_id", $product_id)->where('user_id', Auth::id())->exists())
            {
                $cart = Cart::where("product_id", $product_id)->where('user_id', Auth::id())->first();
                $cart->product_qty = $product_qty;
                $cart->update();
                return response()->json(['success' => "Quantity update successfully"]);
            }
        } else {
            return response()->json(['success' => "Please login first"]);
        }
    }

    public function deleteToCart(Request $request)
    {
        if (Auth::check())
        {
            $prod_id = $request->prod_id;
            if (Cart::where("product_id", $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = Cart::where("product_id", $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['success' => "Product deleted successfully"]);
            }
        } else {
            return response()->json(['success' => "Please login first"]);
        }
    }

    public function cartCount()
    {
        $cartCount = Cart::where("user_id", Auth::id())->count();
        return response()->json(['count' => $cartCount]);
    }

    public function wishlistCount()
    {
        $wishlistCount = Wishlist::where("user_id", Auth::id())->count();
        return response()->json(['count' => $wishlistCount]);
    }
}
