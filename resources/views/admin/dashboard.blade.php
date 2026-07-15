@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex align-items-center gap-3 mb-4">
    <img src="{{ asset('/Logo/TANDS LOGO.png') }}" alt="Tanzania National Debate Society Logo" style="height:64px;width:auto;background:#fff;border-radius:8px;padding:6px;box-shadow:0 1px 3px rgba(0,0,0,.08);">
    <div>
        <h5 class="mb-0">Tanzania National Debate Society</h5>
        <div class="text-muted small">Admin Dashboard</div>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Total Events</div>
                <div class="fs-3 fw-bold">{{ $stats['events'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Published Events</div>
                <div class="fs-3 fw-bold">{{ $stats['published_events'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Active Subscribers</div>
                <div class="fs-3 fw-bold">{{ $stats['subscribers'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Unread Messages</div>
                <div class="fs-3 fw-bold">{{ $stats['unread_messages'] }}</div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Recent Contact Messages</span>
        <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-sm btn-outline-primary">View all</a>
    </div>
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead>
                <tr><th>Name</th><th>Email</th><th>Received</th><th></th></tr>
            </thead>
            <tbody>
                @forelse ($recentMessages as $message)
                    <tr>
                        <td>{{ $message->full_name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->created_at->diffForHumans() }}</td>
                        <td>
                            @if (! $message->is_read)
                                <span class="badge bg-warning text-dark">Unread</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted py-3">No messages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
