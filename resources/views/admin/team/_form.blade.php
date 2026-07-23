<div class="mb-3">
    <label class="form-label">Photo</label>
    <input type="file" name="photo" class="form-control" accept="image/*">
    @isset($member)
        @if ($member->photo_path)
            <img src="{{ asset($member->photo_path) }}" style="height:80px;margin-top:8px;border-radius:50%">
        @endif
    @endisset
</div>
<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $member->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Role / Title</label>
    <input type="text" name="role_title" class="form-control" value="{{ old('role_title', $member->role_title ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Bio</label>
    <textarea name="bio" class="form-control" rows="4">{{ old('bio', $member->bio ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Sort Order</label>
    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $member->sort_order ?? 0) }}">
</div>
<div class="mb-3 form-check">
    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" {{ (old('is_active', $member->is_active ?? true)) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Active</label>
</div>
