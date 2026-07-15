@extends('admin.layout')

@section('title', 'Message from ' . $message->full_name)

@section('content')
<div class="card shadow-sm" style="max-width:700px">
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">From</dt>
            <dd class="col-sm-9">{{ $message->full_name }}</dd>
            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></dd>
            <dt class="col-sm-3">Received</dt>
            <dd class="col-sm-9">{{ $message->created_at->format('d M Y H:i') }}</dd>
            <dt class="col-sm-3">Source</dt>
            <dd class="col-sm-9">{{ $message->source }}</dd>
            <dt class="col-sm-3">Emailed to info@tands.or.tz</dt>
            <dd class="col-sm-9">{{ $message->email_sent ? 'Yes' : 'No (check SMTP settings in .env)' }}</dd>
        </dl>
        <hr>
        <p style="white-space: pre-line;">{{ $message->message }}</p>
    </div>
    <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-outline-secondary">Back</a>
        <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" class="js-confirm-delete" data-confirm-message="Delete this message?">
            @csrf @method('DELETE')
            <button class="btn btn-outline-danger">Delete</button>
        </form>
    </div>
</div>
@endsection
