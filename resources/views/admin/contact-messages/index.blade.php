@extends('admin.layout')

@section('title', 'Contact Messages')

@section('content')
<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead><tr><th>Name</th><th>Email</th><th>Received</th><th>Status</th><th></th></tr></thead>
            <tbody>
                @forelse ($messages as $message)
                    <tr class="{{ $message->is_read ? '' : 'fw-semibold' }}">
                        <td>{{ $message->full_name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->created_at->format('d M Y H:i') }}</td>
                        <td>
                            @unless ($message->is_read)
                                <span class="badge bg-warning text-dark">Unread</span>
                            @endunless
                            @unless ($message->email_sent)
                                <span class="badge bg-secondary">Email not sent</span>
                            @endunless
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.contact-messages.show', $message) }}" class="btn btn-sm btn-outline-primary">View</a>
                            <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" class="d-inline js-confirm-delete" data-confirm-message="Delete this message?">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">No messages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $messages->links() }}</div>
@endsection
