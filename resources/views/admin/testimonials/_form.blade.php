<div class="mb-3">
    <label class="form-label">Author Name</label>
    <input type="text" name="author_name" class="form-control" value="{{ old('author_name', $testimonial->author_name ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Message</label>
    <textarea name="message" class="form-control" rows="5" required>{{ old('message', $testimonial->message ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Sort Order</label>
    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}">
</div>
<div class="mb-3 form-check">
    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" {{ (old('is_active', $testimonial->is_active ?? true)) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Active</label>
</div>
