<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validate;
use App\Models\PurchaseOrder;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\PurchaseOrderDetail;

class PurchaseOrderController extends Controller
{
    public function index() {
        $purchase_orders = PurchaseOrder::latest()->paginate(10);

        return view('purchase_orders.index', compact('purchase_orders'));
    }

    public function create() {
        $outlets = Outlet::pluck('name','id');
        $warehouses = Warehouse::pluck('name','id');
        $products = Product::pluck('name','id');
        return view('purchase_orders.create', compact('outlets', 'warehouses', 'products'));
    }

    public function store(Request $request) {
        $request->validate([
            'outlet_id' => 'required',
        ]);

        $purchaseOrder = PurchaseOrder::create([
            'outlet_id' => $request->outlet_id,
        ]);

        $details = $request->purchase_order_details;

        foreach ($details as $detail) {
            PurchaseOrderDetail::create([
                'purchase_order_id' => $purchaseOrder->id,
                'product_id' => $detail->product_id,
                'warehouse_id' => $detail->warehouse_id,
                'stock' => $detail->stock,
            ]);
        }

        return redirect()->route('purchase_orders.index')->with(['success' => 'Data saved']);
    }

    public function show($id) {
        $purchase_order = PurchaseOrder::find($id);
        return view('purchase_orders.show', compact('purchase_order'));
    }

    public function edit($id) {
        $purchase_order = PurchaseOrder::find($id);
        $outlets = Outlet::pluck('name','id');
        $warehouses = Warehouse::pluck('name','id');
        $products = Product::pluck('name','id');
        return view('purchase_orders.edit', compact('purchase_order', 'outlets', 'warehouses', 'products'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'outlet_id' => 'required',
        ]);

        $purchase_order = PurchaseOrder::find($id);

        $details = $request->purchase_order_details;

        $purchase_order->outlet_id = $request->outlet_id;

        $purchase_order_details = $purchase_order->purchase_order_details;

        $res = true;

        DB::beginTransaction();
        foreach($purchase_order_details as $detail) {
            $detail->product_id = $details->product_id;
            $detail->warehouse_id = $details->warehouse_id;
            $detail->stock = $details->stock;
            $res &= $detail->save();
        }
        $res &= $purchase_order->save();
        $res ? DB::commit() : DB::rollback();
        return redirect()->route('purchase_orders.index')->with($res ? ['success' => 'Data saved'] : ['error' => 'Data not updated']);
    }

    public function destroy($id) {
        $purchase_order = PurchaseOrder::findOrFail($id);

        DB::beginTransaction();
        $res = true;
        foreach($purchase_order->purchase_order_details as $detail) {
            $res &= $detail->delete();
        }
        $res &= $purchase_order->delete();
        $res ? DB::commit() : DB::rollback();
        return redirect()->route('purchase_orders.index')->with($res ? ['success' => 'Data has been deleted'] : ['error' => 'Data can not be deleted']);
    }
}
