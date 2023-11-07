<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view("admin.orders.index", compact("orders"));
    }

    public function view($id)
    {
        $orders = Order::where("id", $id)->first();
        return view("admin.orders.view", compact("orders"));
    }

    public function updateOrder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->status;
        $orders->update();

        return redirect("orders")->with("success", "Order update successfully");
    }

    public function orderHistory()
    {
        $orders = Order::where("status", "1")->get();
        return view("admin.orders.history", compact("orders"));
    }

    public function payment(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->status;
        if ($request->hasFile('payment_image')) {
            $path = 'assets/uploads/payment/' . $orders->payment_image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('payment_image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . "." . $ext; #ekstensi gambar(png, jpg, dll.)
            $file->move("assets/uploads/payment/", $fileName);
            $orders->payment_image = $fileName;
        }
        $orders->update();

        return redirect("my-orders")->with("success", "Payment successfully");
    }
}
