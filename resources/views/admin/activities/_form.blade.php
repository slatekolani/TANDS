<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $activity->title ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="4">{{ old('description', $activity->description ?? '') }}</textarea>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Image 1</label>
        <input type="file" name="image_1" class="form-control" accept="image/*">
        @isset($activity)
            @if ($activity->image_path_1)
                <img src="{{ asset($activity->image_path_1) }}" style="height:60px;margin-top:8px">
            @endif
        @endisset
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Image 2</label>
        <input type="file" name="image_2" class="form-control" accept="image/*">
        @isset($activity)
            @if ($activity->image_path_2)
                <img src="{{ asset($activity->image_path_2) }}" style="height:60px;margin-top:8px">
            @endif
        @endisset
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Sort Order</label>
    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $activity->sort_order ?? 0) }}">
</div>
<div class="mb-3 form-check">
    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" {{ (old('is_active', $activity->is_active ?? true)) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Active</label>
</div>
