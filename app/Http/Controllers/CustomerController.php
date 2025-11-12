<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; // Add this line
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class CustomerController extends BaseController
{
    public function index()
    {
        $categories = Category::all();
        return view('createproduct', compact('categories'));
    }

    public function adminshow(){

        $products = Product::all();
        return view('dashboard', compact('products'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_quantity' => 'required|string|max:255',
            'product_price' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
            'product_description' => 'required|string|max:255',
            'product_image' => 'nullable|image|mimes:jpeg,png,gif,jpg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('product_image')) {
             $imageName = time() . '.' . $request->product_image->extension();
            $request->product_image->move(public_path('images'), $imageName);
        }

        
        Product::create([
            'product_name' => $request->input('product_name'),
            'product_quantity' => $request->input('product_quantity'),
            'product_price' => $request->input('product_price'),
            // 'product_price' => $request->product_category,
            'product_category' => $request->input('product_category'),
            'product_description' => $request->input('product_description'),
            'product_image' => $imageName,

        ]);

        return redirect()->back()->with('success', 'Product created successfully!');
    }
    public function edit($id){
        $product = Product::findOrFail($id);
        return view('editproduct',compact('product'));
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'product_name' => 'string|max:255',
            'product_quantity' => 'string|max:255',
            'product_price' => 'string|max:255',
            'product_category' => 'string|max:255',
            'product_description' => 'nullable|string',
            'product_image' => 'nullable|image|mimes:jpeg,png,gif,jpg|max:2048',
        ]);

           $imageName = null;
        if ($request->hasFile('product_image')) {
             $imageName = time() . '.' . $request->product_image->extension();
            $request->product_image->move(public_path('images'), $imageName);
        }

        $product = Product::findOrFail($id);
        $product->update([
            $product->product_name = $request->input('product_name'),
            $product->product_quantity = $request->input('product_quantity'),
            $product->product_price = $request->input('product_price'),
            $product->product_category = $request->input('product_category'),
            $product->product_description = $request->input('product_description'),
            'product_image' => $imageName,
        ]);
        return redirect()->route('productlist')->with('success', 'Product updated successfully!');
    }
    public function show(){

        $products=Product::all();
        return view('productlist',compact('products'));

    }
    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('productlist')->with('success', 'Product deleted successfully!');
    }

    
}
 