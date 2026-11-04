@extends('admin.layout')

@section('title', 'Site Settings')

@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}">
    @csrf
    @method('PUT')

    <div class="card shadow-sm mb-4">
        <div class="card-header">About Page Content</div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Intro Paragraph</label>
                <textarea name="about_intro" class="form-control" rows="3">{{ old('about_intro', $settings['about_intro']) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Mission</label>
                <textarea name="about_mission" class="form-control" rows="3">{{ old('about_mission', $settings['about_mission']) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Vision</label>
                <textarea name="about_vision" class="form-control" rows="3">{{ old('about_vision', $settings['about_vision']) }}</textarea>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header">Contact Information</div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone', $settings['contact_phone']) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">WhatsApp Number</label>
                    <input type="text" name="whatsapp_number" class="form-control" placeholder="e.g. +255 787 225 427" value="{{ old('whatsapp_number', $settings['whatsapp_number']) }}">
                    <div class="form-text">Used by the "Chat with us on WhatsApp" button. Leave blank to use the phone number above.</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Public Contact Email</label>
                    <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $settings['contact_email']) }}">
                </div>
                <div class="col-md-8">
                    <label class="form-label">Address</label>
                    <input type="text" name="contact_address" class="form-control" value="{{ old('contact_address', $settings['contact_address']) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">P.O. Box</label>
                    <input type="text" name="contact_po_box" class="form-control" value="{{ old('contact_po_box', $settings['contact_po_box']) }}">
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header">Social Links</div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label"><i class="fab fa-instagram"></i> Instagram URL</label>
                    <input type="url" name="social_instagram_url" class="form-control" value="{{ old('social_instagram_url', $settings['social_instagram_url']) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label"><i class="fab fa-twitter"></i> Twitter/X URL</label>
                    <input type="url" name="social_twitter_url" class="form-control" value="{{ old('social_twitter_url', $settings['social_twitter_url']) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label"><i class="fab fa-facebook-f"></i> Facebook URL</label>
                    <input type="url" name="social_facebook_url" class="form-control" value="{{ old('social_facebook_url', $settings['social_facebook_url']) }}">
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save Settings</button>
</form>
@endsection
