@extends('master')

@section('title', $event->title . ' - Tanzania National Debate Society (TANDS)')
@section('canonical', 'https://www.tands.or.tz/' . $event->slug)

@section('head')
    @if ($event->meta_description)
        <meta name="description" content="{{ $event->meta_description }}">
    @endif
    <style>
        .landing-page {
            min-height: 60vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ $event->banner_image ? Storage::url($event->banner_image) : asset('/Images/EAC.jpg') }}') no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 20px;
        }

        .landing-content h2 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .landing-content p {
            font-size: 1.5rem;
        }

        .intro-section, .event-section, .gallery-section {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        .intro-section:nth-child(even), .event-section:nth-child(even), .gallery-section:nth-child(even) {
            background-color: #fff;
        }

        h3.section-title {
            text-align: center;
            font-size: 2.5rem;
            color: #007bff;
            margin-bottom: 30px;
        }

        .section-divider {
            border: none;
            border-top: 3px solid #007bff;
            margin: 0 auto 40px;
            width: 80px;
        }

        .event-body {
            max-width: 900px;
            margin: 0 auto;
        }

        .section-image {
            width: 100%;
            max-height: 420px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
        }

        .upcoming-badge {
            display: inline-block;
            background-color: #ffc107;
            color: #333;
            font-weight: bold;
            padding: 6px 18px;
            border-radius: 20px;
            font-size: 1rem;
            margin-bottom: 20px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .gallery-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.55);
            color: white;
            padding: 8px 12px;
            font-size: 0.95rem;
        }

        .register-section {
            padding: 60px 0;
            background: #323366;
        }

        .register-card {
            max-width: 820px;
            margin: 0 auto;
            background: #fff;
            border-radius: 15px;
            padding: 40px 48px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        }

        .register-card .form-label {
            font-weight: 500;
            font-size: .92rem;
            color: #24263b;
        }

        .register-card .form-control,
        .register-card .form-select {
            border: 1px solid #d8dee8;
            border-radius: 8px;
            padding: 10px 14px;
        }

        .register-card .form-control:focus,
        .register-card .form-select:focus {
            border-color: #03A3DE;
            box-shadow: 0 0 0 3px rgba(3, 163, 222, .15);
        }

        .register-card .form-section-label {
            font-size: .78rem;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: #03A3DE;
            margin: 28px 0 14px;
        }

        .register-card .form-section-label:first-of-type {
            margin-top: 4px;
        }

        .register-card button[type="submit"] {
            background: #03A3DE;
            border: none;
            color: #fff;
            font-weight: 500;
            padding: 12px 32px;
            border-radius: 8px;
            width: 100%;
        }

        .register-card button[type="submit"]:hover {
            background: #24263b;
        }

        .register-form-notify {
            display: block;
            margin-top: 14px;
            font-weight: 500;
            text-align: center;
        }

        @media screen and (max-width: 768px) {
            .register-card { padding: 28px 22px; }
        }

        @media screen and (max-width: 768px) {
            .landing-page { min-height: 45vh; }
            .landing-content h2 { font-size: 2rem; }
            .landing-content p { font-size: 1.2rem; }
            h3.section-title { font-size: 2rem; }
        }
    </style>
@endsection

@section('content')
    <section class="landing-page">
        <div class="landing-content">
            @if ($event->status === 'upcoming')
                <span class="upcoming-badge">Upcoming Event</span>
            @elseif ($event->status === 'ongoing')
                <span class="upcoming-badge">Happening Now</span>
            @endif
            <h2>{{ $event->title }}</h2>
            @if ($event->theme)
                <p>Theme: {{ $event->theme }}</p>
            @endif
            @if ($event->event_date || $event->location)
                <p style="font-size:1.1rem">
                    {{ optional($event->event_date)->format('d M Y') }}
                    @if ($event->event_date && $event->location) &middot; @endif
                    {{ $event->location }}
                </p>
            @endif
            @if ($event->isRegistrationOpen())
                <a href="#register" class="btn btn-primary mt-3">Register Now</a>
            @endif
        </div>
    </section>

    @if ($event->description)
        <section class="intro-section">
            <div class="container event-body">
                <h3 class="section-title">About the Event</h3>
                <hr class="section-divider">
                {!! $event->description !!}
            </div>
        </section>
    @endif

    @if ($event->galleryImages->isNotEmpty())
        <section class="gallery-section">
            <div class="container">
                <h3 class="section-title">Gallery</h3>
                <hr class="section-divider">
                <div class="gallery-grid">
                    @foreach ($event->galleryImages as $image)
                        <div class="gallery-item">
                            <img src="{{ Storage::url($image->image_path) }}" alt="{{ $image->caption }}" class="gallery-image">
                            @if ($image->caption)
                                <div class="gallery-overlay">{{ $image->caption }}</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @foreach ($event->sections as $section)
        <section class="event-section">
            <div class="container event-body">
                <h3 class="section-title">{{ $section->title }}</h3>
                <hr class="section-divider">
                @if (! empty($section->image_path))
                    <img src="{{ Storage::url($section->image_path) }}" alt="{{ $section->title }}" class="section-image">
                @endif
                {!! $section->body !!}
            </div>
        </section>
    @endforeach

    @if ($event->isRegistrationOpen())
        <section class="register-section" id="register">
            <div class="container">
                <div class="register-card">
                    <h3 class="section-title" style="margin-bottom:6px">Register for this Event</h3>
                    <p class="text-center text-muted mb-4">Secure your spot — fill in your details below.</p>
                    <form class="event-register-form" action="{{ route('event.register', $event) }}">
                        <div class="form-section-label">Contact Details</div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" name="phone" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select" required>
                                    <option value="" disabled selected>Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-section-label">Participant Details</div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Age</label>
                                <input type="number" name="age" class="form-control" min="5" max="100" required>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">School</label>
                                <input type="text" name="school" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Category</label>
                                <select name="category" class="form-select" required>
                                    <option value="" disabled selected>Select category</option>
                                    @foreach (\App\Http\Controllers\EventRegistrationController::CATEGORIES as $category)
                                        <option value="{{ $category }}">{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Amount Paid (TZS)</label>
                                <input type="number" name="amount_paid" class="form-control" min="0" step="0.01" required>
                            </div>
                        </div>

                        <div class="form-section-label">Anything Else?</div>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Message (optional)</label>
                                <textarea name="message" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn mt-4">Submit Registration</button>
                        <span class="register-form-notify"></span>
                    </form>
                </div>
            </div>
        </section>
    @endif
@endsection
