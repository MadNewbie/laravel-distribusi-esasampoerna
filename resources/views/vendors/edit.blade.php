@extends('layout')
@section('content')
<form action="{{route('vendors.update', $vendor->id)}}" method="post">
    @csrf
    @method('PUT')
    @include('vendors._form')
</form>
@endsection