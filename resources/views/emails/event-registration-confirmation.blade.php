<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; color: #222;">
    <h2>You're registered, {{ $registration->name }}!</h2>
    <p>Thanks for registering for <strong>{{ $registration->event->title }}</strong>. Here's a copy of the details you submitted:</p>
    <p><strong>Name:</strong> {{ $registration->name }}</p>
    <p><strong>Email:</strong> {{ $registration->email }}</p>
    <p><strong>Phone:</strong> {{ $registration->phone }}</p>
    <p><strong>Gender:</strong> {{ $registration->gender }}</p>
    <p><strong>Age:</strong> {{ $registration->age }}</p>
    <p><strong>School:</strong> {{ $registration->school }}</p>
    <p><strong>Category:</strong> {{ $registration->category }}</p>
    <p><strong>Amount Paid:</strong> {{ number_format($registration->amount_paid, 2) }} TZS</p>
    @if ($registration->message)
        <p><strong>Message:</strong></p>
        <p style="white-space: pre-line;">{{ $registration->message }}</p>
    @endif
    @if ($registration->event->event_date || $registration->event->location)
        <hr>
        <p>
            @if ($registration->event->event_date)
                <strong>Date:</strong> {{ $registration->event->event_date->format('d M Y') }}<br>
            @endif
            @if ($registration->event->location)
                <strong>Location:</strong> {{ $registration->event->location }}
            @endif
        </p>
    @endif
    <hr>
    <p style="font-size: 12px; color: #777;">If you didn't request this registration, you can ignore this email or contact us at info@tands.or.tz.</p>
</body>
</html>
