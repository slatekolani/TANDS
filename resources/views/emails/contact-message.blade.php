<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; color: #222;">
    <h2>New message from the TANDS website</h2>
    <p><strong>{{ $contactMessage->full_name }}</strong> ({{ $contactMessage->email }}) sent a message through the {{ $contactMessage->source }} form.</p>
    <p>
        <a href="{{ route('admin.contact-messages.show', $contactMessage) }}" style="display:inline-block; background:#03A3DE; color:#fff; padding:10px 24px; border-radius:6px; text-decoration:none; font-weight:bold;">Log in to read the full message</a>
    </p>
    <hr>
    <p style="font-size: 12px; color: #777;">This message was submitted through the contact form on tands.or.tz and saved to the admin dashboard.</p>
</body>
</html>
