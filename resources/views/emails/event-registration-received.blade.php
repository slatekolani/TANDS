<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; color: #222;">
    <h2>New registration for {{ $registration->event->title }}</h2>
    <p><strong>{{ $registration->name }}</strong> ({{ $registration->email }}, {{ $registration->phone }}) just registered for <strong>{{ $registration->category }}</strong>.</p>
    <p>
        <a href="{{ route('admin.events.registrations.index', $registration->event) }}" style="display:inline-block; background:#03A3DE; color:#fff; padding:10px 24px; border-radius:6px; text-decoration:none; font-weight:bold;">Log in to view full details</a>
    </p>
    <hr>
    <p style="font-size: 12px; color: #777;">Submitted through the registration form on tands.or.tz and saved to the admin dashboard under Events &rarr; Registrations.</p>
</body>
</html>
