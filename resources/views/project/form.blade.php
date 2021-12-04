<div class="form-group">
    <label for="name">Project Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $project->name ?? old('name') }}">

    @error('name')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" rows="3" class="form-control">{{ $project->description ?? old('description') }}</textarea>

    @error('description')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="tags">Tags</label>
    <select name="tags[]" id="tags" class="form-control choices multiple-remove" multiple>
        @foreach($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
        @if($project->id)
        @foreach($project->tags as $tag)
        <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
        @endif
    </select>

    @error('tags')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="thumbnail">Thumbnail</label>
    <input type="file" name="thumbnail" id="thumbnail" class="form-control">

    @error('thumbnail')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="link">Link</label>
    <input type="text" name="link" id="link" class="form-control" value="{{ $project->link ?? old('link') }}">

    @error('link')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
</div>