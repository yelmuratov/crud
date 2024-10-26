<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    public function index()
    {   
        $products = Product::paginate(10);
        return view('Product.index', ['products' => $products]);
    }

    public function create()
    {
        return view('Product.create');
    }

    public function store(ProductStoreRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('Product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('Product.edit', compact('product'));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {       
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = Product::where('name', 'like', '%'.$search.'%')->paginate(5);
        return view('Product.index', ['products' => $products]);
    }
}
