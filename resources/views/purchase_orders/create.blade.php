@extends('layout')
@section('content')
<form action="{{route('purchase_orders.store')}}" method="post">
    @csrf
    @include('purchase_orders._form')
</form>
@endsection