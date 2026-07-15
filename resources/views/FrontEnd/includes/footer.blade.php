<section class="section8">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-3 col-md-6">
                <div class="footer-brand">TANDS</div>
                <p class="footer-tagline">Promoting fair, transparent and representative debate, public speaking and quiz excellence across Tanzania and East Africa.</p>
                <div class="footer-social">
                    <a href="{{ $socialInstagram }}" target="_blank" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="{{ $socialTwitter }}" target="_blank" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="{{ $socialFacebook }}" target="_blank" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h3 class="usefulLinks">Quick Links</h3>
                <div class="footerLinks">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{route('gallery')}}">Gallery</a>
                    <a href="{{route('contactUs')}}">Contact us</a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h3 class="usefulLinks">Get in Touch</h3>
                <ul class="footer-contact-list">
                    <li><i class="fas fa-map-marker-alt"></i> {{ $contactPoBox }}, {{ $contactAddress }}</li>
                    <li><i class="fas fa-phone"></i> {{ $contactPhone }}</li>
                    <li><i class="fas fa-envelope"></i> <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h3>Send us a Message</h3>
                <form id="footerContactForm" class="contact-form" data-source="footer">
                    <div class="mb-3">
                        <label for="footerFullNames" class="form-label footer-label">Full Names</label>
                        <input type="text" id="footerFullNames" class="form-control footer-input" name="fullNames" required>
                    </div>
                    <div class="mb-3">
                        <label for="footerUserEmail" class="form-label footer-label">Email Address</label>
                        <input type="email" id="footerUserEmail" class="form-control footer-input" name="userEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="footerMessage" class="form-label footer-label">Message</label>
                        <textarea class="form-control footer-input" id="footerMessage" name="message" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn footer-submit-btn"><i class="fas fa-paper-plane"></i> Submit</button>
                    <span class="contact-form-notify footer-notify"></span>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="footer-copyright">
    <p>© Tanzania National Debate Society - <span id="year"></span>. Developed by <a href="https://nextbyte.co.tz/" target="_blank" rel="noopener">Nextbyte ICT Solutions</a></p>
</section>

<script>
    document.getElementById('year').textContent = new Date().getFullYear();
</script>
