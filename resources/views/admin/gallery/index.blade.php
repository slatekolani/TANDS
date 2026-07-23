@extends('admin.layout')

@section('title', 'Gallery')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Image</a>
</div>

<div class="row g-3">
    @forelse ($images as $image)
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <img src="{{ asset($image->image_path) }}" class="card-img-top" style="height:150px;object-fit:cover">
                <div class="card-body">
                    <div class="fw-semibold">{{ $image->title ?: 'Untitled' }}</div>
                    <div class="small text-muted">{{ $image->caption }}</div>
                    @if ($image->is_featured_home)
                        <span class="badge bg-info mt-1">Featured on homepage</span>
                    @endif
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.gallery.edit', $image) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form method="POST" action="{{ route('admin.gallery.destroy', $image) }}" class="js-confirm-delete" data-confirm-message="Delete this image?">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-muted">No gallery images yet.</div>
    @endforelse
</div>

<div class="mt-3">{{ $images->links() }}</div>
@endsection
