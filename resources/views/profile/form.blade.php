<div class="form-group">
    <label for="full_name">Full Name</label>
    <input type="text" name="full_name" id="full_name" class="form-control" value="{{ $profile->full_name ?? old('full_name') }}">

    @error('full_name')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="role">Role</label>
    <input type="text" name="role" id="role" class="form-control" value="{{ $profile->role ?? old('role') }}">

    @error('role')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="about">About</label>
    <textarea name="about" id="about" rows="3" class="form-control">{{ $profile->about ?? old('about') }}</textarea>

    @error('about')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="image">image</label>
    <input type="file" name="image" id="image" class="form-control">

    @error('image')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
</div>