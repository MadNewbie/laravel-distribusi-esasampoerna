@extends('layout')

@section('content')
<h2>Vendor / Pemasok</h2>
<a class="btn btn-primary btn-sm btn-round" href="{{route('vendors.create')}}">Add</a>
<table class="table table-hover table-stripped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($vendors as $vendor)
        <tr>
            <td>{{$vendor->name}}</td>
            <td>
                <form action="{{route('vendors.destroy',$vendor->id)}}" method="POST" onsubmit="return confirm('Apakah anda yakin menghapus data ini?')">
                    <a href="{{route('vendors.edit', $vendor->id)}}" class="btn btn-warning btn-xs">Ubah</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <div class="mt-3">Belum Ada Data Vendor / Pemasok</div>
        @endforelse
    </tbody>
</table>
@endsection