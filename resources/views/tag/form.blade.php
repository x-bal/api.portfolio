<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $tag->name ?? old('name') }}">

    @error('name')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
</div>