<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; color: #222;">
    <h2>Thanks for reaching out, {{ $contactMessage->full_name }}!</h2>
    <p>We've received your message and someone from Tanzania National Debate Society will get back to you soon. Here's a copy of what you sent:</p>
    <p style="white-space: pre-line; background:#f4f6f9; padding:14px 18px; border-radius:8px;">{{ $contactMessage->message }}</p>
    <hr>
    <p style="font-size: 12px; color: #777;">If you didn't send this message, you can ignore this email or contact us at info@tands.or.tz.</p>
</body>
</html>
