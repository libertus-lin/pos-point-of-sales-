<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("admin.category.index", compact("categories"));
    }

    public function create()
    {
        return view("admin.category.create");
    }

    public function store(Request $request)
    {
        $category = new Category();

        #uploadImageCondition
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . "." . $ext; #ekstensi gambar(png, jpg, dll.)
            $file->move("assets/uploads/category/", $fileName);
            $category->image = $fileName;
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status == TRUE ? "1" : "0";
        $category->popular = $request->popular == TRUE ? "1" : "0";

        $category->save();
        return redirect('categories')->with("success", "Category added successfully");
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . "." . $ext; #ekstensi gambar(png, jpg, dll.)
            $file->move("assets/uploads/category/", $fileName);
            $category->image = $fileName;
        }
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status == TRUE ? '1' : '0';
        $category->popular = $request->popular == TRUE ? "1" : "0";

        $category->update();
        return redirect('categories')->with('success', 'Category update succesfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category->image) {
            $path = 'assets/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $category->delete();
        return redirect('categories')->with('success', 'Category has been deleted successfully');
    }
}
