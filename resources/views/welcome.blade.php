@extends('layout')

@section('content')
<a href="{{route('vendors.index')}}" class="btn btn-secondary btn-sm">
    Pemasok
</a>
<a href="{{route('products.index')}}" class="btn btn-secondary btn-sm">
    Produk
</a>
<a href="{{route('outlets.index')}}" class="btn btn-secondary btn-sm">
    Toko
</a>
<a href="{{route('warehouses.index')}}" class="btn btn-secondary btn-sm">
    Gudang
</a>
<a href="{{route('purchase_orders.index')}}" class="btn btn-primary btn-sm">
    Order Pembelian / PO
</a>
</br>
<h2>Selamat Datang di Sistem Distribusi Sederhana</h2>
@endsection