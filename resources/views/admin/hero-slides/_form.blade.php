<div class="mb-3">
    <label class="form-label">Image {{ isset($slide) ? '(leave blank to keep current)' : '' }}</label>
    <input type="file" name="image" class="form-control" accept="image/*" @if(!isset($slide)) required @endif>
    @isset($slide)
        <img src="{{ Storage::url($slide->image_path) }}" style="height:80px;margin-top:8px;border-radius:4px">
    @endisset
</div>
<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="caption" class="form-control" value="{{ old('caption', $slide->caption ?? '') }}">
    <div class="form-text">Shown as the bold headline over this slide.</div>
</div>
<div class="mb-3">
    <label class="form-label">Description</label>
    <input type="text" name="description" class="form-control" value="{{ old('description', $slide->description ?? '') }}">
    <div class="form-text">Shown as the supporting line beneath the title.</div>
</div>
<div class="mb-3">
    <label class="form-label">Sort Order</label>
    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $slide->sort_order ?? 0) }}">
</div>
<div class="mb-3 form-check">
    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" {{ (old('is_active', $slide->is_active ?? true)) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Active</label>
</div>
