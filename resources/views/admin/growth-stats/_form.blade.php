<div class="mb-3">
    <label class="form-label">Label</label>
    <input type="text" name="label" class="form-control" value="{{ old('label', $stat->label ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Icon Class (Font Awesome)</label>
    <input type="text" name="icon_class" class="form-control" placeholder="fas fa-school" value="{{ old('icon_class', $stat->icon_class ?? 'fas fa-chart-line') }}" required>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Value</label>
        <input type="number" name="value" class="form-control" value="{{ old('value', $stat->value ?? 0) }}" required min="0">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Suffix</label>
        <input type="text" name="suffix" class="form-control" value="{{ old('suffix', $stat->suffix ?? '+') }}">
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Sort Order</label>
    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $stat->sort_order ?? 0) }}">
</div>
<div class="mb-3 form-check">
    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" {{ (old('is_active', $stat->is_active ?? true)) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Active</label>
</div>
