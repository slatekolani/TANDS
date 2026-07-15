@extends('admin.layout')

@section('title', 'Activities')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.activities.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Activity</a>
</div>

<div class="row g-3">
    @forelse ($activities as $activity)
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="fw-semibold">{{ $activity->title }}</div>
                    <div class="small text-muted">{{ \Illuminate\Support\Str::limit(strip_tags($activity->description), 120) }}</div>
                    @unless ($activity->is_active)
                        <span class="badge bg-secondary mt-1">Hidden</span>
                    @endunless
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.activities.edit', $activity) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form method="POST" action="{{ route('admin.activities.destroy', $activity) }}" class="js-confirm-delete" data-confirm-message="Delete this activity?">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-muted">No activities yet.</div>
    @endforelse
</div>
@endsection
