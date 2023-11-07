<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        // validasiKetersediaanStokProduct
        $oldCartItems = Cart::where("user_id", Auth::id())->get();
        foreach ($oldCartItems as $item) {
            if (!Product::where("id", $item->product_id)->where("qty", ">=", $item->product_qty)->exists()) {
                $removeItem = Cart::where("user_id", Auth::id())->where("product_id", $item->product_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where("user_id", Auth::id())->get();

        return view("frontend.checkout", compact("cartItems"));
    }

    public function placeOrder(Request $request)
    {
        $order = new Order;
        $order->user_id = Auth::id();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone_number = $request->phone_number;
        $order->address = $request->address;
        $order->address_details = $request->address_details;
        $order->city = $request->city;
        $order->zip_code = $request->zip_code;
        $order->tracking_number = "TRANS" . rand(1111, 9999);
        $order->save();

        // Menghitung harga total
        $total = 0;
        $cartItemsTotal = Cart::where("user_id", Auth::id())->get();
        foreach ($cartItemsTotal as $prod) {
            $total += $prod->products->price;
        }

        $order->total_price = $total;
        $order->tracking_number = "TRANS" . rand(1111, 9999);
        $order->save();
        // End hitung total

        $cartItems = Cart::where("user_id", Auth::id())->get();
        foreach ($cartItems as $item) {
            OrderItem::create([
                "order_id" => $order->id,
                "product_id" => $item->product_id,
                "qty" => $item->product_qty,
                "price" => $item->products->price,
            ]);

            $product = Product::where("id", $item->product_id)->first();
            $product->qty = $product->qty - $item->product_qty;
            $product->update();
        }

        if (Auth::user()->address == NULL) {
            $user = User::where("id", Auth::id())->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->address = $request->address;
            $user->address_details = $request->address_details;
            $user->city = $request->city;
            $user->zip_code = $request->zip_code;

            $user->update();
        }

        $cartItems = Cart::where("user_id", Auth::id())->get();
        Cart::destroy($cartItems);
        return redirect('my-orders')->with("success", "Berhasil checkout, buka menu MENU ORDER");
    }
}
