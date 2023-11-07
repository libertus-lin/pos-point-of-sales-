<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $users = User::count();
        $orderitems = OrderItem::count();
        $products = Product::count();
        $categories = Category::count();

        return view('admin.index', compact('users','orderitems','products','categories'));
    }

    public function viewProfile()
    {
        $users = User::all();
        return view('admin.profile.view', compact('users'));
    }
}
