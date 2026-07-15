<div class="mb-3">
    <label class="form-label">Image {{ isset($image) ? '(leave blank to keep current)' : '' }}</label>
    <input type="file" name="image" class="form-control" accept="image/*" @if(!isset($image)) required @endif>
    @isset($image)
        <img src="{{ Storage::url($image->image_path) }}" style="height:80px;margin-top:8px;border-radius:4px">
    @endisset
</div>
<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $image->title ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Caption</label>
    <input type="text" name="caption" class="form-control" value="{{ old('caption', $image->caption ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Sort Order</label>
    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $image->sort_order ?? 0) }}">
</div>
<div class="mb-3 form-check">
    <input type="checkbox" name="is_featured_home" class="form-check-input" id="is_featured_home" value="1" {{ (old('is_featured_home', $image->is_featured_home ?? false)) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_featured_home">Show on homepage gallery preview</label>
</div>
