@extends('layout')

@section('content')
<h2>Gudang</h2>
<a class="btn btn-primary btn-sm btn-round" href="{{route('warehouses.create')}}">Add</a>
<table class="table table-hover table-stripped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($warehouses as $warehouse)
        <tr>
            <td>{{$warehouse->name}}</td>
            <td>
                <form action="{{route('warehouses.destroy',$warehouse->id)}}" method="POST" onsubmit="return confirm('Apakah anda yakin menghapus data ini?')">
                    <a href="{{route('warehouses.edit', $warehouse->id)}}" class="btn btn-warning btn-xs">Ubah</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <div class="mt-3">Belum Ada Data Gudang</div>
        @endforelse
    </tbody>
</table>
@endsection