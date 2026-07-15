@extends('admin.layout')

@section('title', 'Events')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> New Event</a>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug / URL</th>
                    <th>Series</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Published</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td><code>/{{ $event->slug }}</code></td>
                        <td>{{ $event->series }} {{ $event->year }}</td>
                        <td><span class="badge bg-secondary text-uppercase">{{ $event->status }}</span></td>
                        <td>{{ optional($event->event_date)->format('d M Y') }}</td>
                        <td>
                            @if ($event->is_published)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <a href="{{ route('admin.events.registrations.index', $event) }}" class="btn btn-sm btn-outline-secondary">Registrations</a>
                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline js-confirm-delete" data-confirm-message="Delete this event? This also deletes its sections and gallery images.">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">No events yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $events->links() }}</div>
@endsection
