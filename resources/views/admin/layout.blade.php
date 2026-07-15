<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - TANDS Admin</title>
    <link rel="icon" href="{{ asset('/Logo/TANDS LOGO.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { background-color: #f4f6f9; font-family: 'Poppins', sans-serif; }
        .admin-sidebar {
            width: 240px;
            min-height: 100vh;
            background: #323366;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }
        .admin-sidebar .brand {
            padding: 18px 20px;
            color: #fff;
            font-weight: 700;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }
        .admin-sidebar a {
            display: block;
            padding: 10px 20px;
            color: #d7d9ee;
            text-decoration: none;
            font-size: .92rem;
        }
        .admin-sidebar a:hover, .admin-sidebar a.active {
            background: #03A3DE;
            color: #fff;
        }
        .admin-sidebar .section-label {
            padding: 14px 20px 4px;
            color: #8b8dc0;
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .05em;
        }
        .admin-content {
            margin-left: 240px;
            padding: 24px;
        }
        .admin-topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .admin-sidebar { width: 100%; min-height: auto; position: relative; }
            .admin-content { margin-left: 0; }
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="admin-sidebar">
    <div class="brand"><i class="fas fa-comments"></i> TANDS Admin</div>
    <div class="section-label">Overview</div>
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fas fa-gauge-high"></i> Dashboard</a>

    <div class="section-label">Content</div>
    <a href="{{ route('admin.events.index') }}" class="{{ request()->routeIs('admin.events.*') ? 'active' : '' }}"><i class="fas fa-calendar-star"></i> Events</a>
    <a href="{{ route('admin.hero-slides.index') }}" class="{{ request()->routeIs('admin.hero-slides.*') ? 'active' : '' }}"><i class="fas fa-images"></i> Hero Slides</a>
    <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}"><i class="fas fa-photo-film"></i> Gallery</a>
    <a href="{{ route('admin.team.index') }}" class="{{ request()->routeIs('admin.team.*') ? 'active' : '' }}"><i class="fas fa-users"></i> Team</a>
    <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}"><i class="fas fa-quote-left"></i> Testimonials</a>
    <a href="{{ route('admin.partners.index') }}" class="{{ request()->routeIs('admin.partners.*') ? 'active' : '' }}"><i class="fas fa-handshake"></i> Partners</a>
    <a href="{{ route('admin.programs.index') }}" class="{{ request()->routeIs('admin.programs.*') ? 'active' : '' }}"><i class="fas fa-trophy"></i> Programs</a>
    <a href="{{ route('admin.activities.index') }}" class="{{ request()->routeIs('admin.activities.*') ? 'active' : '' }}"><i class="fas fa-chalkboard"></i> Activities</a>
    <a href="{{ route('admin.growth-stats.index') }}" class="{{ request()->routeIs('admin.growth-stats.*') ? 'active' : '' }}"><i class="fas fa-chart-line"></i> Growth Stats</a>
    <a href="{{ route('admin.settings.edit') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"><i class="fas fa-gear"></i> Site Settings</a>

    <div class="section-label">Inbox</div>
    <a href="{{ route('admin.subscribers.index') }}" class="{{ request()->routeIs('admin.subscribers.*') ? 'active' : '' }}"><i class="fas fa-envelope-open-text"></i> Subscribers</a>
    <a href="{{ route('admin.contact-messages.index') }}" class="{{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}"><i class="fas fa-inbox"></i> Contact Messages</a>

    <div class="section-label">Account</div>
    <a href="{{ route('admin.profile.edit') }}" class="{{ request()->routeIs('admin.profile.*') ? 'active' : '' }}"><i class="fas fa-key"></i> Change Password</a>
    <a href="{{ route('home') }}" target="_blank"><i class="fas fa-globe"></i> View Site</a>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" class="btn btn-link" style="display:block;width:100%;text-align:left;padding:10px 20px;color:#d7d9ee;text-decoration:none;border:0;">
            <i class="fas fa-right-from-bracket"></i> Logout
        </button>
    </form>
</div>

<div class="admin-content">
    <div class="admin-topbar">
        <h4 class="mb-0">@yield('title', 'Dashboard')</h4>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.js"></script>
<script>
    // Auto-mount a Quill editor on every [data-rich-editor] element, syncing
    // its HTML into the sibling hidden textarea named in data-input on every
    // keystroke and right before the enclosing form submits.
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-rich-editor]').forEach(function (mount) {
            const input = document.getElementById(mount.dataset.input);
            const quill = new Quill(mount, { theme: 'snow' });
            quill.root.innerHTML = input.value;
            quill.on('text-change', function () { input.value = quill.root.innerHTML; });
            const form = mount.closest('form');
            if (form) {
                form.addEventListener('submit', function () { input.value = quill.root.innerHTML; });
            }
        });
    });
</script>

{{-- SweetAlert2: success toast after a create/update/delete, a confirm
     dialog before any destructive delete, and an error toast when a form
     comes back with validation errors. --}}
@if (session('status'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: @json(session('status')),
            showConfirmButton: false,
            timer: 2800,
            timerProgressBar: true,
        });
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: 'Please fix the highlighted errors',
            showConfirmButton: false,
            timer: 3200,
            timerProgressBar: true,
        });
    </script>
@endif

<script>
    // Every destructive delete form carries data-confirm-message instead of
    // a native confirm() call, so it gets a consistent SweetAlert dialog.
    document.addEventListener('submit', function (e) {
        const form = e.target;
        if (!form.classList || !form.classList.contains('js-confirm-delete')) return;
        if (form.dataset.confirmed === 'true') return;

        e.preventDefault();
        Swal.fire({
            title: form.dataset.confirmMessage || 'Are you sure?',
            text: "This can't be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it',
            confirmButtonColor: '#dc3545',
            cancelButtonText: 'Cancel',
        }).then(function (result) {
            if (result.isConfirmed) {
                form.dataset.confirmed = 'true';
                form.submit();
            }
        });
    });
</script>
@stack('scripts')
</body>
</html>
