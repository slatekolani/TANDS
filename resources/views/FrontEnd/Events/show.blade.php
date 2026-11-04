@extends('master')

@section('title', $event->title . ' - Tanzania National Debate Society (TANDS)')
@section('canonical', config('app.site_url') . parse_url($event->url, PHP_URL_PATH))
@if ($event->meta_description)
    @section('description', $event->meta_description)
@endif

@php
    $edition = trim(($event->series ?? '') . ' ' . ($event->year ?? ''));
    $statusLabel = ['upcoming' => 'Registration open', 'ongoing' => 'Happening now', 'past' => 'Past edition'][$event->status] ?? ucfirst($event->status);
    $toc = collect();
    if ($event->description) { $toc->push(['id' => 'about', 'label' => 'About the event']); }
    foreach ($event->sections as $section) { $toc->push(['id' => 'section-' . $section->id, 'label' => $section->title]); }
    if ($event->galleryImages->isNotEmpty()) { $toc->push(['id' => 'gallery', 'label' => 'Gallery']); }
    if ($event->isRegistrationOpen()) { $toc->push(['id' => 'register', 'label' => 'Register']); }
@endphp

@section('content')
    <x-page-hero :eyebrow="$edition ?: 'Championship'" :title="$event->title"
        :image="$event->banner_image ? asset($event->banner_image) : asset('Images/EAC.jpg')"
        :crumbs="['Events' => null, ($edition ?: $event->title) => null]">
        @if ($event->theme)
            <p class="lead mb-0">Theme: <strong class="text-white">{{ $event->theme }}</strong></p>
        @endif
        <div class="meta-row">
            <span><i class="fas fa-circle" style="font-size:.5rem" aria-hidden="true"></i> {{ $statusLabel }}</span>
            @if ($event->event_date)
                <span><i class="far fa-calendar" aria-hidden="true"></i> {{ $event->event_date->format('l, d F Y') }}</span>
            @endif
            @if ($event->location)
                <span><i class="fas fa-map-marker-alt" aria-hidden="true"></i> {{ $event->location }}</span>
            @endif
        </div>
        <div class="hero__cta">
            @if ($event->isRegistrationOpen())
                <a href="#register" class="btn-x btn-x--accent">Register now <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
            @endif
            @if ($toc->isNotEmpty())
                <a href="#details" class="btn-x btn-x--ghost">Event details</a>
            @endif
        </div>
    </x-page-hero>

    <section class="section" id="details">
        <div class="wrap event-layout">
            <div>
                @if ($event->description)
                    <article class="event-block" id="about">
                        <span class="eyebrow">Overview</span>
                        <h2>About the event</h2>
                        <div class="prose">{!! $event->description !!}</div>
                    </article>
                @endif

                @foreach ($event->sections as $section)
                    <article class="event-block" id="section-{{ $section->id }}">
                        <span class="eyebrow">{{ $edition ?: 'Details' }}</span>
                        <h2>{{ $section->title }}</h2>
                        @if (! empty($section->image_path))
                            <img src="{{ asset($section->image_path) }}" alt="{{ $section->title }}" class="event-block__image" loading="lazy">
                        @endif
                        <div class="prose">{!! $section->body !!}</div>
                    </article>
                @endforeach

                @if (! $event->description && $event->sections->isEmpty())
                    <div class="empty-state">Full details for this edition will be published soon.</div>
                @endif
            </div>

            <aside class="event-aside" aria-label="Event summary">
                <div class="card-x">
                    <div class="aside-title">Key facts</div>
                    <dl class="facts">
                        <div><dt>Status</dt><dd><span class="tag {{ in_array($event->status, ['upcoming', 'ongoing']) ? 'tag--live' : '' }}">{{ $statusLabel }}</span></dd></div>
                        @if ($event->event_date)
                            <div><dt>Date</dt><dd>{{ $event->event_date->format('d M Y') }}</dd></div>
                        @endif
                        @if ($event->location)
                            <div><dt>Venue</dt><dd>{{ $event->location }}</dd></div>
                        @endif
                        @if ($event->series)
                            <div><dt>Series</dt><dd>{{ $event->series }}</dd></div>
                        @endif
                        @if ($event->year)
                            <div><dt>Edition</dt><dd>{{ $event->year }}</dd></div>
                        @endif
                    </dl>
                    @if ($event->isRegistrationOpen())
                        <a href="#register" class="btn-x btn-x--accent btn-x--block">Register now <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    @else
                        <p class="mb-0 small text-muted">Registration for this edition is closed.</p>
                    @endif
                </div>

                @if ($toc->count() > 1)
                    <nav class="card-x toc-card" aria-label="On this page">
                        <div class="aside-title">On this page</div>
                        <ol class="toc">
                            @foreach ($toc as $item)
                                <li><a href="#{{ $item['id'] }}">{{ $item['label'] }}</a></li>
                            @endforeach
                        </ol>
                    </nav>
                @endif

                @if ($otherEditions->isNotEmpty())
                    <div class="card-x">
                        <div class="aside-title">Other {{ $event->series }} editions</div>
                        <div class="editions">
                            @foreach ($otherEditions as $other)
                                <a href="{{ $other->url }}">{{ $other->year ?: $other->title }}</a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </aside>
        </div>
    </section>

    @if ($event->galleryImages->isNotEmpty())
        <section class="section section--alt" id="gallery">
            <div class="wrap">
                <x-section-head eyebrow="Gallery" :title="'Moments from ' . ($edition ?: $event->title)" />
                <x-gallery-grid :count="$event->galleryImages->count()">
                    @foreach ($event->galleryImages as $image)
                        @include('FrontEnd.includes.galleryTile', ['image' => $image, 'group' => 'event-' . $event->id])
                    @endforeach
                </x-gallery-grid>
            </div>
        </section>
    @endif

    @if ($event->isRegistrationOpen())
        <section class="section {{ $event->galleryImages->isNotEmpty() ? '' : 'section--alt' }}" id="register">
            <div class="wrap wrap--narrow">
                <div class="form-card">
                    <div class="form-card__head">
                        <span class="eyebrow">Registration</span>
                        <h2>Register for {{ $edition ?: $event->title }}</h2>
                        <p class="mb-0 text-muted">Secure your spot — fill in your details below. We'll email you a confirmation straight away.</p>
                    </div>

                    <form class="form-x" action="{{ route('event.register', $event) }}" method="POST" data-ajax novalidate
                        data-success="You're registered! Check your inbox for your confirmation.">
                        <div class="form-group-label">Contact details</div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="reg-name">Full name</label>
                                <input type="text" id="reg-name" name="name" class="form-control" autocomplete="name" required aria-describedby="reg-name-error" aria-invalid="false">
                                <div class="invalid-feedback" id="reg-name-error"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="reg-email">Email address</label>
                                <input type="email" id="reg-email" name="email" class="form-control" autocomplete="email" required aria-describedby="reg-email-error" aria-invalid="false">
                                <div class="invalid-feedback" id="reg-email-error"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="reg-phone">Phone number</label>
                                <input type="tel" id="reg-phone" name="phone" class="form-control" autocomplete="tel" required aria-describedby="reg-phone-error" aria-invalid="false">
                                <div class="invalid-feedback" id="reg-phone-error"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="reg-gender">Gender</label>
                                <select id="reg-gender" name="gender" class="form-select" required aria-describedby="reg-gender-error" aria-invalid="false">
                                    <option value="" disabled selected>Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <div class="invalid-feedback" id="reg-gender-error"></div>
                            </div>
                        </div>

                        <div class="form-group-label">Participant details</div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label" for="reg-age">Age</label>
                                <input type="number" id="reg-age" name="age" class="form-control" min="5" max="100" inputmode="numeric" required aria-describedby="reg-age-error" aria-invalid="false">
                                <div class="invalid-feedback" id="reg-age-error"></div>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label" for="reg-school">School</label>
                                <input type="text" id="reg-school" name="school" class="form-control" autocomplete="organization" required aria-describedby="reg-school-error" aria-invalid="false">
                                <div class="invalid-feedback" id="reg-school-error"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="reg-category">Category</label>
                                <select id="reg-category" name="category" class="form-select" required aria-describedby="reg-category-error" aria-invalid="false">
                                    <option value="" disabled selected>Select category</option>
                                    @foreach (\App\Http\Controllers\EventRegistrationController::CATEGORIES as $category)
                                        <option value="{{ $category }}">{{ $category }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback" id="reg-category-error"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="reg-amount_paid">Amount paid (TZS)</label>
                                <input type="number" id="reg-amount_paid" name="amount_paid" class="form-control" min="0" step="0.01" inputmode="decimal" required aria-describedby="reg-amount_paid-error" aria-invalid="false">
                                <div class="invalid-feedback" id="reg-amount_paid-error"></div>
                            </div>
                        </div>

                        <div class="form-group-label">Anything else?</div>
                        <label class="form-label" for="reg-message">Message <span class="text-muted fw-normal">(optional)</span></label>
                        <textarea id="reg-message" name="message" class="form-control" rows="3" aria-describedby="reg-message-error" aria-invalid="false"></textarea>
                        <div class="invalid-feedback" id="reg-message-error"></div>

                        <button type="submit" class="btn-x btn-x--accent btn-x--block mt-4">Submit registration <i class="fas fa-arrow-right" aria-hidden="true"></i></button>
                        <div class="form-status" role="status" aria-live="polite"></div>
                    </form>
                </div>
            </div>
        </section>
    @endif
@endsection
