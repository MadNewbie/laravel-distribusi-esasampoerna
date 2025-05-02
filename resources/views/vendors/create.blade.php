@extends('layout')
@section('content')
<form action="{{route('vendors.store')}}" method="post">
    @csrf
    @include('vendors._form')
</form>
@endsection