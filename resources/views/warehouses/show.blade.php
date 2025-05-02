@extends('layout')
@section('content')
<h2>Detail Gudang</h2>
{{$warehouse->name}}
<div class="px-3">
    <a href="{{route('warehouses.index')}}" class="btn btn-warning btn-sm btn-round">
        Back
    </a>
</div>
@endsection