<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController
{
    public function categoryindex()
    {
        return view('createcategory');
    }
    public function categorystore(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_description' => 'required|string',
        ]);

        Category::create([
            'category_name' => $request->input('category_name'),
            'category_description' => $request->input('category_description'),
        ]);

        return redirect()->back()->with('success', 'Category created successfully!');
    }

    public function categoryedit($id)
    {
        $category = Category::findOrFail($id);
        return view('editcategory', compact('category'));
    }

    public function categoryupdate(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_description' => 'required|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'category_name' => $request->input('category_name'),
            'category_description' => $request->input('category_description'),
        ]);

        return redirect()->route('categorylist')->with('success', 'Category updated successfully!');
    }

    public function categoryshow()
    {
        $categories = Category::with('products')->get();
        return view('categorylist', compact('categories'));
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
    
}