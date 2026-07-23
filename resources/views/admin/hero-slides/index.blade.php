@extends('admin.layout')

@section('title', 'Hero Slides')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.hero-slides.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Slide</a>
</div>

<div class="row g-3">
    @forelse ($slides as $slide)
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <img src="{{ asset($slide->image_path) }}" class="card-img-top" style="height:160px;object-fit:cover">
                <div class="card-body">
                    <div class="fw-semibold">{{ $slide->caption }}</div>
                    <div class="small text-muted">{{ $slide->description }}</div>
                    @unless ($slide->is_active)
                        <span class="badge bg-secondary mt-1">Hidden</span>
                    @endunless
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.hero-slides.edit', $slide) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form method="POST" action="{{ route('admin.hero-slides.destroy', $slide) }}" class="js-confirm-delete" data-confirm-message="Delete this slide?">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-muted">No slides yet.</div>
    @endforelse
</div>
@endsection
