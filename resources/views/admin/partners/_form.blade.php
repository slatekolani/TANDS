<div class="mb-3">
    <label class="form-label">Logo</label>
    <input type="file" name="logo" class="form-control" accept="image/*">
    @isset($partner)
        @if ($partner->logo_path)
            <img src="{{ Storage::url($partner->logo_path) }}" style="height:60px;margin-top:8px">
        @endif
    @endisset
</div>
<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $partner->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description', $partner->description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Website URL</label>
    <input type="url" name="website_url" class="form-control" value="{{ old('website_url', $partner->website_url ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Sort Order</label>
    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $partner->sort_order ?? 0) }}">
</div>
<div class="mb-3 form-check">
    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" {{ (old('is_active', $partner->is_active ?? true)) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Active</label>
</div>
