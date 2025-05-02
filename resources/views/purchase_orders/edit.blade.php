@extends('layout')
@section('content')
<form action="{{route('purchase_orders.update', $purchase_order->id)}}" method="post">
    @csrf
    @method('PUT')
    @include('purchase_orders._form')
</form>
@endsection