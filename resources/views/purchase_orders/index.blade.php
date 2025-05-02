@extends('layout')

@section('content')
<h2>Order Pembelian</h2>
<a class="btn btn-primary btn-sm btn-round" href="{{route('purchase_orders.create')}}">Add</a>
<table class="table table-hover table-stripped">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama Outlet</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($purchase_orders as $purchase_order)
        <tr>
            <td>{{$purchase_order->created_at}}</td>
            <td>{{$purchase_order->outlet->name}}</td>
            <td>
                <form action="{{route('purchase_orders.destroy',$purchase_order->id)}}" method="POST" onsubmit="return confirm('Apakah anda yakin menghapus data ini?')">
                    <a href="{{route('purchase_orders.edit', $purchase_order->id)}}" class="btn btn-warning btn-xs">Ubah</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <div class="mt-3">Belum Ada Data Order Pembelian</div>
        @endforelse
    </tbody>
</table>
@endsection