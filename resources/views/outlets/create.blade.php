@extends('layout')
@section('content')
<form action="{{route('outlets.store')}}" method="post">
    @csrf
    @include('outlets._form')
</form>
@endsection