<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; color: #222;">
    <h2>New subscriber</h2>
    <p><strong>{{ $subscriber->email }}</strong> just subscribed to TANDS updates.</p>
    <p>
        <a href="{{ route('admin.subscribers.index') }}" style="display:inline-block; background:#03A3DE; color:#fff; padding:10px 24px; border-radius:6px; text-decoration:none; font-weight:bold;">Log in to view all subscribers</a>
    </p>
    <hr>
    <p style="font-size: 12px; color: #777;">This subscriber was added through the website and saved to the admin dashboard.</p>
</body>
</html>
