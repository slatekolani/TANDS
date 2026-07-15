@extends('admin.layout')

@section('title', 'Partners')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Partner</a>
</div>

<div class="row g-3">
    @forelse ($partners as $partner)
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                @if ($partner->logo_path)
                    <img src="{{ Storage::url($partner->logo_path) }}" class="card-img-top p-3" style="height:120px;object-fit:contain">
                @endif
                <div class="card-body">
                    <div class="fw-semibold">{{ $partner->name }}</div>
                    <div class="small text-muted">{{ \Illuminate\Support\Str::limit($partner->description, 80) }}</div>
                    @unless ($partner->is_active)
                        <span class="badge bg-secondary mt-1">Hidden</span>
                    @endunless
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.partners.edit', $partner) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form method="POST" action="{{ route('admin.partners.destroy', $partner) }}" class="js-confirm-delete" data-confirm-message="Delete this partner?">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-muted">No partners yet.</div>
    @endforelse
</div>
@endsection
