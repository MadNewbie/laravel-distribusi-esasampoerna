<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;
use Validate;

class WarehouseController extends Controller
{
    public function index() {
        $warehouses = Warehouse::latest()->paginate(10);

        return view('warehouses.index', compact('warehouses'));
    }

    public function create() {
        return view('warehouses.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        Warehouse::create([
            'name' => $request->name,
        ]);

        return redirect()->route('warehouses.index')->with(['success' => 'Data saved']);
    }

    public function show($id) {
        $warehouse = Warehouse::find($id);

        return view('warehouses.show', compact('warehouse'));
    }

    public function edit($id) {
        $warehouse = Warehouse::find($id);

        return view('warehouses.edit', compact('warehouse'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
        ]);

        $warehouse = Warehouse::find($id);

        $warehouse->name = $request['name'];
        $warehouse->save();

        return redirect()->route('warehouses.index')->with(['success' => 'Data updated']);        
    }

    public function destroy($id) {
        $warehouse = Warehouse::findOrFail($id);

        $warehouse->delete();

        return redirect()->route('warehouses.index')->with(['success' => 'Data has been deleted']);
    }
}
