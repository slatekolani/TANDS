<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; color: #222;">
    <h2>A new event just went live: {{ $event->title }}</h2>
    @if ($event->theme)
        <p><strong>Theme:</strong> {{ $event->theme }}</p>
    @endif
    @if ($event->event_date || $event->location)
        <p>
            @if ($event->event_date)
                <strong>Date:</strong> {{ $event->event_date->format('d M Y') }}<br>
            @endif
            @if ($event->location)
                <strong>Location:</strong> {{ $event->location }}
            @endif
        </p>
    @endif
    @if ($event->isRegistrationOpen())
        <p>Registration is open now — secure your spot before it fills up.</p>
        <p>
            <a href="{{ $event->url }}#register" style="display:inline-block; background:#03A3DE; color:#fff; padding:10px 24px; border-radius:6px; text-decoration:none; font-weight:bold;">View event &amp; register</a>
        </p>
    @else
        <p>
            <a href="{{ $event->url }}" style="display:inline-block; background:#03A3DE; color:#fff; padding:10px 24px; border-radius:6px; text-decoration:none; font-weight:bold;">View event details</a>
        </p>
    @endif
    <hr>
    <p style="font-size: 12px; color: #777;">You're receiving this because you subscribed to updates on tands.or.tz.</p>
</body>
</html>
