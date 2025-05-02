<div class="mb-6">
    <div class="px-3">
        <label for="division" class="mb-2">
            Nama Outlet / Toko
        </label>
        @error('outlet_id')
            <div class="mb-3">
                {{ $message }}
            </div>
        @enderror
        <select name="outlet_id" id="outlet_id">
            <option value="null">Pilih Outlet / Toko</option>
            @foreach ($outlets as $id=>$name )
            <option value="{{$id}}" {{ isset($purchase_order) ? ($id == $purchase_order->outlet_id ? 'selected' : '' ) : '' }}>{{$name}}</option>
            @endforeach
        </select>
    </div>
    <div class="px-3">
        <button type="submit" class="btn btn-success btn-sm btn-round">
            Save
        </button>
        <a href="{{route('purchase_orders.index')}}" class="btn btn-warning btn-sm btn-round">
            Back
        </a>
    </div>
</div>