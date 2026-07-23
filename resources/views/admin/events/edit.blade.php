@extends('admin.layout')

@section('title', 'Edit Event: ' . $event->title)

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.events.registrations.index', $event) }}" class="btn btn-outline-secondary">
        <i class="fas fa-clipboard-list"></i> Registrations ({{ $event->registrations()->count() }})
    </a>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-header">Event Details</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.events.update', $event) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.events._form')
            <button type="submit" class="btn btn-primary mt-3">Save Event</button>
        </form>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-header">Content Sections</div>
    <div class="card-body">
        <p class="text-muted small">Sections render in order below the event's About block (e.g. "Debate Motions", "Quiz Rubric").</p>

        @foreach ($event->sections as $section)
            <div class="border rounded p-3 mb-3">
                <form method="POST" action="{{ route('admin.events.sections.update', [$event, $section]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-2 mb-2">
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control" value="{{ $section->title }}" required>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="sort_order" class="form-control" value="{{ $section->sort_order }}" placeholder="Order">
                        </div>
                        <div class="col-md-2 d-flex gap-2">
                            <button type="submit" class="btn btn-outline-primary flex-fill">Save</button>
                        </div>
                    </div>
                    @include('admin.partials.rich-editor', [
                        'name' => 'body',
                        'id' => 'section-' . $section->id . '-body',
                        'value' => $section->body,
                        'height' => 220,
                    ])
                    <div class="row g-2 mt-2 align-items-center">
                        @if (! empty($section->image_path))
                            <div class="col-md-3">
                                <img src="{{ asset($section->image_path) }}" class="img-fluid rounded" style="height:80px;width:100%;object-fit:cover">
                            </div>
                            <div class="col-md-3 form-check">
                                <input type="checkbox" name="remove_image" value="1" class="form-check-input" id="remove_image_{{ $section->id }}">
                                <label class="form-check-label small" for="remove_image_{{ $section->id }}">Remove image</label>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <input type="file" name="image" class="form-control form-control-sm" accept="image/*">
                        </div>
                    </div>
                </form>
                <form method="POST" action="{{ route('admin.events.sections.destroy', [$event, $section]) }}" class="mt-2 js-confirm-delete" data-confirm-message="Remove this section?">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">Remove Section</button>
                </form>
            </div>
        @endforeach

        <div class="border rounded p-3 bg-light">
            <h6>Add Section</h6>
            <form method="POST" action="{{ route('admin.events.sections.store', $event) }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-2 mb-2">
                    <div class="col-md-8">
                        <input type="text" name="title" class="form-control" placeholder="Section title, e.g. Debate Motions" required>
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="sort_order" class="form-control" placeholder="Order">
                    </div>
                </div>
                @include('admin.partials.rich-editor', [
                    'name' => 'body',
                    'id' => 'section-new-body',
                    'value' => '',
                    'height' => 180,
                ])
                <div class="mt-2">
                    <label class="form-label small">Section Image (optional)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Add Section</button>
            </form>
        </div>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-header">Gallery Images</div>
    <div class="card-body">
        <div class="row g-3 mb-3">
            @forelse ($event->galleryImages as $image)
                <div class="col-md-3">
                    <div class="border rounded p-2">
                        <img src="{{ asset($image->image_path) }}" class="img-fluid rounded mb-2" style="height:120px;width:100%;object-fit:cover">
                        <form method="POST" action="{{ route('admin.events.gallery.update', [$event, $image]) }}" enctype="multipart/form-data" class="mb-2">
                            @csrf
                            @method('PUT')
                            <input type="text" name="caption" class="form-control form-control-sm mb-2" placeholder="Caption (optional)" value="{{ $image->caption }}">
                            <input type="file" name="image" class="form-control form-control-sm mb-2" accept="image/*">
                            <button type="submit" class="btn btn-sm btn-outline-primary w-100">Save</button>
                        </form>
                        <form method="POST" action="{{ route('admin.events.gallery.destroy', [$event, $image]) }}" class="js-confirm-delete" data-confirm-message="Remove this image?">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger w-100">Remove</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-12 text-muted">No gallery images yet.</div>
            @endforelse
        </div>

        <form method="POST" action="{{ route('admin.events.gallery.store', $event) }}" enctype="multipart/form-data" class="row g-2 align-items-end">
            @csrf
            <div class="col-md-5">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
            </div>
            <div class="col-md-5">
                <label class="form-label">Caption</label>
                <input type="text" name="caption" class="form-control">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection
