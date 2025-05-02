@extends('layout')
@section('content')
<h2>Detail Toko / Outlet</h2>
{{$outlet->name}}
<div class="px-3">
    <a href="{{route('outlets.index')}}" class="btn btn-warning btn-sm btn-round">
        Back
    </a>
</div>
@endsection