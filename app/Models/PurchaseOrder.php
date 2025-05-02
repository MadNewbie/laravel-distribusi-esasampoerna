<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'outlet_id',
    ];

    public function purchase_order_details(){
        return $this->hasMany(PurchaseOrderDetail::class);
    }

    public function outlet(){
        return $this->belongsTo(Outlet::class);
    }
}
