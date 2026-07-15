@extends('admin.layout')

@section('title', 'Registrations: ' . $event->title)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back to Event</a>
    <a href="{{ route('admin.events.registrations.export', $event) }}" class="btn btn-outline-secondary"><i class="fas fa-file-csv"></i> Export CSV</a>
</div>

<div class="card shadow-sm">
    <div class="card-header">Registrations for {{ $event->title }}</div>
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead>
                <tr>
                    <th>Name</th><th>Email</th><th>Phone</th><th>Gender</th><th>Age</th>
                    <th>School</th><th>Category</th><th>Amount Paid</th><th>Message</th><th>Registered</th><th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($registrations as $registration)
                    <tr>
                        <td>{{ $registration->name }}</td>
                        <td>{{ $registration->email }}</td>
                        <td>{{ $registration->phone }}</td>
                        <td>{{ $registration->gender ?: '—' }}</td>
                        <td>{{ $registration->age ?? '—' }}</td>
                        <td>{{ $registration->school ?: '—' }}</td>
                        <td>{{ $registration->category ?: '—' }}</td>
                        <td>{{ $registration->amount_paid !== null ? number_format($registration->amount_paid, 2) . ' TZS' : '—' }}</td>
                        <td>{{ Str::limit($registration->message, 60) ?: '—' }}</td>
                        <td>{{ $registration->created_at->format('d M Y H:i') }}</td>
                        <td class="text-end">
                            <form action="{{ route('admin.events.registrations.destroy', [$event, $registration]) }}" method="POST" class="d-inline js-confirm-delete" data-confirm-message="Remove this registration?">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="11" class="text-center text-muted py-4">No registrations yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $registrations->links() }}</div>
@endsection
