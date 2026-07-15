@extends('admin.layout')

@section('title', 'Testimonials')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Testimonial</a>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead><tr><th>Author</th><th>Message</th><th>Active</th><th></th></tr></thead>
            <tbody>
                @forelse ($testimonials as $testimonial)
                    <tr>
                        <td>{{ $testimonial->author_name }}</td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($testimonial->message), 90) }}</td>
                        <td>{!! $testimonial->is_active ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline js-confirm-delete" data-confirm-message="Delete this testimonial?">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted py-4">No testimonials yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
