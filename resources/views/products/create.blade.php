@extends('layout')
@section('content')
<form action="{{route('products.store')}}" method="post">
    @csrf
    @include('products._form')
</form>
@endsection