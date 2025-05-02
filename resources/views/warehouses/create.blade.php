@extends('layout')
@section('content')
<form action="{{route('warehouses.store')}}" method="post">
    @csrf
    @include('warehouses._form')
</form>
@endsection