<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Validate;

class VendorController extends Controller
{
    public function index() {
        $vendors = Vendor::latest()->paginate(10);

        return view('vendors.index', compact('vendors'));
    }

    public function create() {
        return view('vendors.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        Vendor::create([
            'name' => $request->name,
        ]);

        return redirect()->route('vendors.index')->with(['success' => 'Data saved']);
    }

    public function show($id) {
        $vendor = Vendor::find($id);

        return view('vendors.show', compact('vendor'));
    }

    public function edit($id) {
        $vendor = Vendor::find($id);

        return view('vendors.edit', compact('vendor'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
        ]);

        $vendor = Vendor::find($id);

        $vendor->name = $request['name'];
        $vendor->save();

        return redirect()->route('vendors.index')->with(['success' => 'Data updated']);        
    }

    public function destroy($id) {
        $vendor = Vendor::findOrFail($id);

        $vendor->delete();

        return redirect()->route('vendors.index')->with(['success' => 'Data has been deleted']);
    }
}
