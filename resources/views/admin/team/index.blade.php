@extends('admin.layout')

@section('title', 'Team')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.team.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Team Member</a>
</div>

<div class="row g-3">
    @forelse ($members as $member)
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                @if ($member->photo_path)
                    <img src="{{ asset($member->photo_path) }}" class="card-img-top" style="height:180px;object-fit:cover">
                @endif
                <div class="card-body">
                    <div class="fw-semibold">{{ $member->name }}</div>
                    <div class="small text-muted">{{ $member->role_title }}</div>
                    @unless ($member->is_active)
                        <span class="badge bg-secondary mt-1">Hidden</span>
                    @endunless
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.team.edit', $member) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form method="POST" action="{{ route('admin.team.destroy', $member) }}" class="js-confirm-delete" data-confirm-message="Delete this team member?">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-muted">No team members yet.</div>
    @endforelse
</div>
@endsection
