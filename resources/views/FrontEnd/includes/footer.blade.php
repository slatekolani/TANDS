<footer class="site-footer on-dark" id="siteFooter">
    <div class="wrap">
        <div class="site-footer__grid">
            <div class="site-footer__brand">
                <img src="{{ asset('Logo/tands-logo-white.png') }}" alt="Tanzania National Debate Society" width="870" height="316">
                <p>Promoting fair, transparent and representative debate, public speaking and quiz excellence across Tanzania and East Africa.</p>

                <ul class="footer-contact">
                    <li><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <span>{{ $contactPoBox }}, {{ $contactAddress }}</span></li>
                    <li><i class="fas fa-phone" aria-hidden="true"></i> <a href="tel:{{ preg_replace('/\s+/', '', $contactPhone) }}">{{ $contactPhone }}</a></li>
                    <li><i class="fas fa-envelope" aria-hidden="true"></i> <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a></li>
                </ul>

                <div class="socials">
                    <a href="{{ $socialInstagram }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="{{ $socialTwitter }}" target="_blank" rel="noopener" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $socialFacebook }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    @if ($whatsappNumber)
                        <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    @endif
                </div>
            </div>

            <div class="footer-col">
                <h4>Explore</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About us</a></li>
                    <li><a href="{{ route('gallery') }}">Gallery</a></li>
                    <li><a href="{{ route('contactUs') }}">Contact</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Championships</h4>
                <ul>
                    @forelse ($footerEvents as $footerEvent)
                        <li><a href="{{ $footerEvent->url }}">{{ $footerEvent->series ?: $footerEvent->title }} {{ $footerEvent->year }}</a></li>
                    @empty
                        <li>Coming soon</li>
                    @endforelse
                </ul>
            </div>

            <div class="footer-col">
                <h4>Get involved</h4>
                <ul>
                    <li><a href="{{ route('home') }}#subscribe">Subscribe for updates</a></li>
                    <li><a href="{{ route('contactUs') }}">Partner with us</a></li>
                    <li><a href="mailto:{{ $contactEmail }}">Email the team</a></li>
                    <li><a href="{{ route('admin.login') }}" class="footer-staff"><i class="fas fa-lock" aria-hidden="true"></i> Staff login</a></li>
                </ul>
            </div>
        </div>

        <div class="site-footer__bottom">
            <span>&copy; <span id="year">{{ date('Y') }}</span> Tanzania National Debate Society. All rights reserved.</span>
            <span>Developed by <a href="https://nextbyte.co.tz/" target="_blank" rel="noopener">Nextbyte ICT Solutions</a></span>
        </div>
    </div>
</footer>

@if ($whatsappNumber)
    <a href="https://wa.me/{{ $whatsappNumber }}?text={{ rawurlencode('Hello TANDS, I would like to know more about ') }}"
        class="wa-widget" id="waWidget" target="_blank" rel="noopener" aria-label="Chat with us on WhatsApp">
        <span class="wa-widget__icon"><i class="fab fa-whatsapp" aria-hidden="true"></i></span>
        <span class="wa-widget__text"><small>Questions?</small>Chat with us on WhatsApp</span>
    </a>
@endif
