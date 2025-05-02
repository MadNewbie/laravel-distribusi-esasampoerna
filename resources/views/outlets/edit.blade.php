@extends('layout')
@section('content')
<form action="{{route('outlets.update', $outlet->id)}}" method="post">
    @csrf
    @method('PUT')
    @include('outlets._form')
</form>
@endsection