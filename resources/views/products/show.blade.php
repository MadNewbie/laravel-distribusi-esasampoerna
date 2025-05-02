@extends('layout')
@section('content')
<h2>Detail Produk</h2>
{{$product->name}}
{{$product->vendor->name}}
<div class="px-3">
    <a href="{{route('product.index')}}" class="btn btn-warning btn-sm btn-round">
        Back
    </a>
</div>
@endsection