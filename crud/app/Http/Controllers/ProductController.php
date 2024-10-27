<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
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
        $companies = Company::all();
        return view('Product.create',['companies' => $companies]);
    }

    public function store(ProductStoreRequest $request)
    {
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
        $companies = Company::all();
        return view('Product.edit', compact('product'),['companies' => $companies]);
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
