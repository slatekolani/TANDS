@extends('admin.layout')

@section('title', 'Growth Stats')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.growth-stats.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Stat</a>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead><tr><th>Icon</th><th>Label</th><th>Value</th><th>Active</th><th></th></tr></thead>
            <tbody>
                @forelse ($stats as $stat)
                    <tr>
                        <td><i class="{{ $stat->icon_class }}"></i></td>
                        <td>{{ $stat->label }}</td>
                        <td>{{ $stat->value }}{{ $stat->suffix }}</td>
                        <td>{!! $stat->is_active ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.growth-stats.edit', $stat) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.growth-stats.destroy', $stat) }}" method="POST" class="d-inline js-confirm-delete" data-confirm-message="Delete this stat?">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">No stats yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
