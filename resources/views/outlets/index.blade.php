@extends('layout')

@section('content')
<h2>Toko / Outlet</h2>
<a class="btn btn-primary btn-sm btn-round" href="{{route('outlets.create')}}">Add</a>
<table class="table table-hover table-stripped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($outlets as $outlet)
        <tr>
            <td>{{$outlet->name}}</td>
            <td>
                <form action="{{route('outlets.destroy',$outlet->id)}}" method="POST" onsubmit="return confirm('Apakah anda yakin menghapus data ini?')">
                    <a href="{{route('outlets.edit', $outlet->id)}}" class="btn btn-warning btn-xs">Ubah</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <div class="mt-3">Belum Ada Data Toko / Outlet</div>
        @endforelse
    </tbody>
</table>
@endsection