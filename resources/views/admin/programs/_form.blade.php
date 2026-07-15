<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $program->title ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Icon Class (Font Awesome)</label>
    <input type="text" name="icon_class" class="form-control" placeholder="fas fa-trophy" value="{{ old('icon_class', $program->icon_class ?? 'fas fa-star') }}" required>
    <div class="form-text">Browse icons at <a href="https://fontawesome.com/v5/search?m=free" target="_blank">fontawesome.com</a>, e.g. "fas fa-trophy".</div>
</div>
<div class="mb-3">
    <label class="form-label">Icon Color</label>
    <input type="text" name="icon_color" class="form-control" placeholder="gold / #ff0000" value="{{ old('icon_color', $program->icon_color ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description', $program->description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Sort Order</label>
    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $program->sort_order ?? 0) }}">
</div>
<div class="mb-3 form-check">
    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" {{ (old('is_active', $program->is_active ?? true)) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Active</label>
</div>
