<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $routes = Route::getRoutes();
        foreach ($routes as $route)
        {
            echo $route->getName()."\n";
        }
        $category = Category::latest()->get();
        return view('admin.category.all_category',compact('category'));
    }

    public function CreateCategory()
    {
        return view('admin.category.category_create');
    }

    public function store(Request $request)
    {
       $request->validate([
          'name'=>'required',
       ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');

        $category->save();

        // Redirect to the list of blog posts with a success message
        $notification = array(
            'message' => 'Category successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edit($prefix, $id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update($prefix, Request $request, $id)
    {
        $request->validate([
           'name'
        ]);

        $category = Category::find($id);

        $category->name = $request->input('name');
        $category->description = $request->input('description');

        // Handle image upload
        if ($request->file('category_image')) {
            $file = $request->file('category_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/category_images'), $filename);
            $category->category_image = $filename;
        }

        // Save the updated category
        $category->save();

        // Redirect back with success message
        $notification = [
            'message' => 'Category updated successfully',
            'alert-type' => 'success'
        ];

        return redirect('admin/admin/category/all')->with($notification);

    }

    public function destroy($prefix, $id)
    {
        dd($id);
    }

}
