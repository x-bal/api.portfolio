<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $contact->name ?? old('name') }}">

    @error('name')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="contact">Contact</label>
    <input type="text" name="contact" id="contact" class="form-control" value="{{ $contact->contact ?? old('contact') }}">

    @error('contact')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="link">Link</label>
    <input type="text" name="link" id="link" class="form-control" value="{{ $contact->link ?? old('link') }}">

    @error('link')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="icon">Icon</label>
    <input type="text" name="icon" id="icon" class="form-control" value="{{ $contact->icon ?? old('icon') }}">

    @error('icon')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
</div>