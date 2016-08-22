<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Category;
use Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|between:3,255|unique:categories']);
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect('admin/category');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, ['name' => 'required|between:3,255|unique:categories,name,' . $category->id]);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect('/admin/category/')->with('success', 'Updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/admin/category')->with('success', 'deleted!');
    }
}
