@extends('layout')
@section('content')
<form action="{{route('warehouses.update', $warehouse->id)}}" method="post">
    @csrf
    @method('PUT')
    @include('warehouses._form')
</form>
@endsection