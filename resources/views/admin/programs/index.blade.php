@extends('admin.layout')

@section('title', 'Programs')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.programs.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Program</a>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead><tr><th>Icon</th><th>Title</th><th>Description</th><th>Active</th><th></th></tr></thead>
            <tbody>
                @forelse ($programs as $program)
                    <tr>
                        <td><i class="{{ $program->icon_class }}" style="color: {{ $program->icon_color ?? '#323366' }}"></i></td>
                        <td>{{ $program->title }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($program->description, 70) }}</td>
                        <td>{!! $program->is_active ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.programs.edit', $program) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" class="d-inline js-confirm-delete" data-confirm-message="Delete this program?">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">No programs yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
