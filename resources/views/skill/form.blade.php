<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $skill->name ?? old('name') }}">

    @error('name')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="experience">Experience</label>
    <input type="text" name="experience" id="experience" class="form-control" value="{{ $skill->experience ?? old('experience') }}">

    @error('experience')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="logo">Logo</label>
    <input type="file" name="logo" id="logo" class="form-control">

    @error('logo')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
</div>