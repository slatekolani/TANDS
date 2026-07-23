<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $event->title ?? '') }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">URL Slug</label>
        <input type="text" name="slug" class="form-control" value="{{ old('slug', $event->slug ?? '') }}" required>
        <div class="form-text">Page will be at /events/{slug} (unless it matches a legacy shortcut route).</div>
    </div>

    @php
        $currentSeries = old('series', $event->series ?? '');
        $seriesIsNew = $currentSeries !== '' && ! $existingSeries->contains($currentSeries);
    @endphp
    <div class="col-md-4">
        <label class="form-label">Series (for nav grouping)</label>
        <select id="series_select" class="form-select" onchange="toggleSeriesInput()">
            <option value="">— None —</option>
            @foreach ($existingSeries as $seriesOption)
                <option value="{{ $seriesOption }}" {{ $currentSeries === $seriesOption ? 'selected' : '' }}>{{ $seriesOption }}</option>
            @endforeach
            <option value="__new__" {{ $seriesIsNew ? 'selected' : '' }}>+ Add new series&hellip;</option>
        </select>
        <input type="text" id="series_new" class="form-control mt-2" placeholder="New series code, e.g. NSDC"
            style="{{ $seriesIsNew ? '' : 'display:none' }}" value="{{ $seriesIsNew ? $currentSeries : '' }}">
        <div class="form-text">Pick the existing series this event belongs to (e.g. TNDC) so it groups correctly in the site's nav dropdown — only use "Add new series" for a genuinely new one.</div>
    </div>
    <script>
        function toggleSeriesInput() {
            const select = document.getElementById('series_select');
            const input = document.getElementById('series_new');
            if (select.value === '__new__') {
                select.removeAttribute('name');
                input.name = 'series';
                input.style.display = 'block';
            } else {
                select.setAttribute('name', 'series');
                input.removeAttribute('name');
                input.style.display = 'none';
            }
        }
        toggleSeriesInput();
    </script>
    <div class="col-md-2">
        <label class="form-label">Year</label>
        <input type="text" name="year" class="form-control" value="{{ old('year', $event->year ?? '') }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            @foreach (['upcoming', 'ongoing', 'past'] as $status)
                <option value="{{ $status }}" {{ (old('status', $event->status ?? 'upcoming') === $status) ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label class="form-label">Event Date</label>
        <input type="date" name="event_date" class="form-control" value="{{ old('event_date', optional($event->event_date ?? null)->format('Y-m-d')) }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Theme</label>
        <input type="text" name="theme" class="form-control" value="{{ old('theme', $event->theme ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Location</label>
        <input type="text" name="location" class="form-control" value="{{ old('location', $event->location ?? '') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $event->sort_order ?? 0) }}">
        <div class="form-text">Registration opens automatically on the public page once this event's status is "Upcoming" — registrants appear on the Registrations page once the event is saved.</div>
    </div>

    <div class="col-md-6">
        <label class="form-label">Banner Image</label>
        <input type="file" name="banner_image" class="form-control" accept="image/*">
        @if (! empty($event->banner_image))
            <img src="{{ asset($event->banner_image) }}" style="height:70px;margin-top:8px;border-radius:4px">
        @endif
    </div>
    <div class="col-md-6 d-flex align-items-end">
        <div class="form-check">
            <input type="checkbox" name="is_published" class="form-check-input" id="is_published" value="1" {{ (old('is_published', $event->is_published ?? true)) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_published">Published (visible on the site)</label>
        </div>
    </div>

    <div class="col-12">
        @include('admin.partials.rich-editor', [
            'name' => 'description',
            'label' => 'About / Description',
            'value' => old('description', $event->description ?? ''),
        ])
    </div>
</div>
