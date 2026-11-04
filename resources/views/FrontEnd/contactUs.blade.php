@extends('master')

@section('title', 'Contact Us - Tanzania National Debate Society (TANDS)')
@section('canonical', 'https://www.tands.or.tz/contactUs')

@section('content')
    <x-page-hero eyebrow="Contact" title="Get in touch" :crumbs="['Contact' => null]">
        <p class="lead mb-0">Questions about a championship, a partnership idea or bringing debate to your school — send it our way.</p>
    </x-page-hero>

    <section class="section">
        <div class="wrap split split--top">
            <div>
                <span class="eyebrow">Contact information</span>
                <h2>Talk to the TANDS team</h2>
                <ul class="contact-list mt-4">
                    <li>
                        <span class="icon-tile"><i class="fas fa-map-marker-alt" aria-hidden="true"></i></span>
                        <div><b>Visit or write to us</b><span>Tanzania National Debate Society, {{ $contactPoBox }}, {{ $contactAddress }}</span></div>
                    </li>
                    <li>
                        <span class="icon-tile"><i class="fas fa-phone" aria-hidden="true"></i></span>
                        <div><b>Call us</b><a href="tel:{{ preg_replace('/\s+/', '', $contactPhone) }}">{{ $contactPhone }}</a></div>
                    </li>
                    <li>
                        <span class="icon-tile"><i class="fas fa-envelope" aria-hidden="true"></i></span>
                        <div><b>Email us</b><a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a></div>
                    </li>
                </ul>
            </div>

            <div class="form-card">
                <div class="form-card__head">
                    <h2>Send a message</h2>
                    <p class="mb-0 text-muted">You'll get a copy by email as soon as it's sent.</p>
                </div>
                <form class="form-x" action="{{ route('contact.store') }}" method="POST" data-ajax novalidate
                    data-success="Thanks! Your message is in — we've emailed you a confirmation.">
                    <input type="hidden" name="source" value="contact_page">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="pageFullNames" class="form-label">Full name</label>
                            <input type="text" id="pageFullNames" class="form-control" name="fullNames" autocomplete="name" required
                                aria-describedby="pageFullNames-error" aria-invalid="false">
                            <div class="invalid-feedback" id="pageFullNames-error"></div>
                        </div>
                        <div class="col-sm-6">
                            <label for="pageUserEmail" class="form-label">Email address</label>
                            <input type="email" id="pageUserEmail" class="form-control" name="userEmail" autocomplete="email" required
                                aria-describedby="pageUserEmail-error" aria-invalid="false">
                            <div class="invalid-feedback" id="pageUserEmail-error"></div>
                        </div>
                        <div class="col-12">
                            <label for="pageMessage" class="form-label">Message</label>
                            <textarea id="pageMessage" class="form-control" name="message" rows="5" required
                                aria-describedby="pageMessage-error" aria-invalid="false"></textarea>
                            <div class="invalid-feedback" id="pageMessage-error"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn-x btn-x--primary btn-x--block mt-4">Send message <i class="fas fa-arrow-right" aria-hidden="true"></i></button>
                    <div class="form-status" role="status" aria-live="polite"></div>
                </form>
            </div>
        </div>
    </section>

    <section class="section section--flush-top">
        <div class="wrap">
            <iframe class="map-frame" title="Map showing the Tanzania National Debate Society office"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1310.239569570649!2d36.634579909693905!3d-3.2864791893906657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x18371f004990162b%3A0x1cb1658eea444186!2sTanzania%20National%20Debate%20Society!5e0!3m2!1sen!2stz!4v1721834409184!5m2!1sen!2stz"
                allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
@endsection
