@extends('layout')
@section('content')
<form action="{{route('products.update', $product->id)}}" method="post">
    @csrf
    @method('PUT')
    @include('products._form')
</form>
@endsection