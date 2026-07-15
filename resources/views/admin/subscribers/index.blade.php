@extends('admin.layout')

@section('title', 'Subscribers')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.subscribers.export') }}" class="btn btn-outline-secondary"><i class="fas fa-file-csv"></i> Export CSV</a>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead><tr><th>Email</th><th>Subscribed</th><th>Active</th><th></th></tr></thead>
            <tbody>
                @forelse ($subscribers as $subscriber)
                    <tr>
                        <td>{{ $subscriber->email }}</td>
                        <td>{{ optional($subscriber->subscribed_at)->format('d M Y H:i') }}</td>
                        <td>{!! $subscriber->is_active ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
                        <td class="text-end">
                            <form action="{{ route('admin.subscribers.destroy', $subscriber) }}" method="POST" class="d-inline js-confirm-delete" data-confirm-message="Remove this subscriber?">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted py-4">No subscribers yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $subscribers->links() }}</div>
@endsection
