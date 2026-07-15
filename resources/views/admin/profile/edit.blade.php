@extends('admin.layout')

@section('title', 'Change Password')

@section('content')
<div class="card shadow-sm" style="max-width: 480px">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.profile.password') }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Current Password</label>
                <input type="password" name="current_password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" name="password" class="form-control" required minlength="8">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm New Password</label>
                <input type="password" name="password_confirmation" class="form-control" required minlength="8">
            </div>
            <button type="submit" class="btn btn-primary">Update Password</button>
        </form>
    </div>
</div>
@endsection
