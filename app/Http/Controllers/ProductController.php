<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Product;
use Validate;

class ProductController extends Controller
{
    public function index() {
        $products = Product::latest()->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create() {
        $vendors = Vendor::pluck('name','id');
        return view('products.create', compact('vendors'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'vendor_id' => 'required',
        ]);

        Product::create([
            'name' => $request->name,
            'vendor_id' => $request->vendor_id,
        ]);

        return redirect()->route('products.index')->with(['success' => 'Data saved']);
    }

    public function show($id) {
        $product = Product::find($id);

        return view('products.show', compact('product'));
    }

    public function edit($id) {
        $product = Product::find($id);
        $vendors = Vendor::pluck('name','id');

        return view('products.edit', compact('vendors','product'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'vendor_id' => 'required',
        ]);

        $product = Product::find($id);

        $product->name = $request['name'];
        $product->vendor_id = $request['vendor_id'];
        $product->save();

        return redirect()->route('products.index')->with(['success' => 'Data updated']);        
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index')->with(['success' => 'Data has been deleted']);
    }
}
