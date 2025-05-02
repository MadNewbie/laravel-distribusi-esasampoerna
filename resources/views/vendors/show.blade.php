@extends('layout')
@section('content')
<h2>Detail Vendor / Pemasok</h2>
{{$vendor->name}}
<div class="px-3">
    <a href="{{route('vendors.index')}}" class="btn btn-warning btn-sm btn-round">
        Back
    </a>
</div>
@endsection