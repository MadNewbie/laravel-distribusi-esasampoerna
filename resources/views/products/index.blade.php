@extends('layout')

@section('content')
<h2>Produk</h2>
<a class="btn btn-primary btn-sm btn-round" href="{{route('products.create')}}">Add</a>
<table class="table table-hover table-stripped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Pemasok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->vendor->name}}</td>
            <td>
                <form action="{{route('products.destroy',$product->id)}}" method="POST" onsubmit="return confirm('Apakah anda yakin menghapus data ini?')">
                    <a href="{{route('products.edit', $product->id)}}" class="btn btn-warning btn-xs">Ubah</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <div class="mt-3">Belum Ada Data Produk</div>
        @endforelse
    </tbody>
</table>
@endsection