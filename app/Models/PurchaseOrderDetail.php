<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderDetail extends Model
{
    protected $fillable = [
        'purchase_order_id',
        'product_id',
        'warehouse_id',
        'stock',
    ];

    public function purchase_order(){
        return $this->belongsTo(PurchaseOrderDetail::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
}
