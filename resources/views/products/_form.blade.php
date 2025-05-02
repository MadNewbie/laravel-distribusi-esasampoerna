<div class="mb-6">
    <div class="px-3">
        <label for="division" class="mb-2">
            Pemasok / Vendor
        </label>
        @error('vendor_id')
            <div class="mb-3">
                {{ $message }}
            </div>
        @enderror
        <select name="vendor_id" id="vendor_id">
            <option value="null">Pilih Vendor / Pemasok</option>
            @foreach ($vendors as $id=>$name )
            <option value="{{$id}}" {{ isset($product) ? ($id == $product->vendor_id ? 'selected' : '' ) : '' }}>{{$name}}</option>
            @endforeach
        </select>
    </div>
    <div class="px-3">
        <label for="name" class="mb-2">
            Nama Produk
        </label>
        @error('name')
            <div class="mb-3">
                {{ $message }}
            </div>
        @enderror
        <input type="text" class="py-3 px-4 mb-3 form-control" id="name" placeholder="Nama Produk" name="name" value="{{ isset($product) ? old('name',$product->name) : old('name') }}">
    </div>
    <div class="px-3">
        <button type="submit" class="btn btn-success btn-sm btn-round">
            Save
        </button>
        <a href="{{route('products.index')}}" class="btn btn-warning btn-sm btn-round">
            Back
        </a>
    </div>
</div>