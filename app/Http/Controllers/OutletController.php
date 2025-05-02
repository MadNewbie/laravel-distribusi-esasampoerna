<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use Validate;

class OutletController extends Controller
{
    public function index() {
        $outlets = Outlet::latest()->paginate(10);

        return view('outlets.index', compact('outlets'));
    }

    public function create() {
        return view('outlets.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        Outlet::create([
            'name' => $request->name,
        ]);

        return redirect()->route('outlets.index')->with(['success' => 'Data saved']);
    }

    public function show($id) {
        $outlet = Outlet::find($id);

        return view('outlets.show', compact('outlet'));
    }

    public function edit($id) {
        $outlet = Outlet::find($id);

        return view('outlets.edit', compact('outlet'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
        ]);

        $outlet = Outlet::find($id);

        $outlet->name = $request['name'];
        $outlet->save();

        return redirect()->route('outlets.index')->with(['success' => 'Data updated']);        
    }

    public function destroy($id) {
        $outlet = Outlet::findOrFail($id);

        $outlet->delete();

        return redirect()->route('outlets.index')->with(['success' => 'Data has been deleted']);
    }
}
