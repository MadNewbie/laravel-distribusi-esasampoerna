<div class="mb-6">
    <div class="px-3">
        <label for="name" class="mb-2">
            Nama Vendor
        </label>
        @error('name')
            <div class="mb-3">
                {{ $message }}
            </div>
        @enderror
        <input type="text" class="py-3 px-4 mb-3 form-control" id="name" placeholder="Nama Vendor" name="name" value="{{ isset($vendor) ? old('name',$vendor->name) : old('name') }}">
    </div>
    <div class="px-3">
        <button type="submit" class="btn btn-success btn-sm btn-round">
            Save
        </button>
        <a href="{{route('vendors.index')}}" class="btn btn-warning btn-sm btn-round">
            Back
        </a>
    </div>
</div>