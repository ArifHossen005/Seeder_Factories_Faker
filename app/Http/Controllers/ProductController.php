<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import the Product model

class ProductController extends Controller
{
    public function create()
    {
        return view('productAdd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('all.products')->with('success', 'Product added successfully!');
    }

    public function index()
    {
        $products = Product::paginate(10); // Retrieve products with pagination
        return view('productView', compact('products'));
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('productEdit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('all.products')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('all.products')->with('success', 'Product deleted successfully!');
    }
}
