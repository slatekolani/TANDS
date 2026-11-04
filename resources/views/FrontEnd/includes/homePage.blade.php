{{-- ===== Hero ===== --}}
<section class="hero" data-hero>
    @forelse ($heroSlides as $slide)
        <img class="hero__img {{ $loop->first ? 'is-active' : '' }}" src="{{ asset($slide->image_path) }}"
            alt="{{ $slide->caption ?? 'Tanzania National Debate Society' }}" {{ $loop->first ? '' : 'loading=lazy' }}>
    @empty
        <img class="hero__img is-active" src="{{ asset('Images/batch3/YZVS7844.JPG') }}" alt="Tanzania National Debate Society">
    @endforelse
    <div class="hero__scrim"></div>

    <div class="wrap hero__inner">
        <div class="hero__content">
            <h1 class="eyebrow">Tanzania National Debate Society</h1>
            <div class="hero__texts">
                @forelse ($heroSlides as $slide)
                    <div class="hero__text {{ $loop->first ? 'is-active' : '' }}">
                        <p class="hero__title">{{ $slide->caption ?: 'Style up. Stand up. Speak up.' }}</p>
                        @if ($slide->description)
                            <p>{{ $slide->description }}</p>
                        @endif
                    </div>
                @empty
                    <div class="hero__text is-active">
                        <p class="hero__title">Style up. Stand up. Speak up.</p>
                        <p>Promoting fair, transparent debate, public speaking and quiz excellence across Tanzania and East Africa.</p>
                    </div>
                @endforelse
            </div>
            <div class="hero__cta">
                @if ($upcomingEvent)
                    <a href="{{ $upcomingEvent->url }}#register" class="btn-x btn-x--accent">Register for {{ $upcomingEvent->series ?: $upcomingEvent->title }} {{ $upcomingEvent->year }} <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    <a href="{{ route('about') }}" class="btn-x btn-x--ghost">Discover our mission</a>
                @else
                    <a href="{{ route('about') }}" class="btn-x btn-x--accent">Discover our mission <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    <a href="{{ route('gallery') }}" class="btn-x btn-x--ghost">View gallery</a>
                @endif
            </div>
        </div>

        @if ($heroSlides->count() > 1)
            <div class="hero__controls">
                <span class="hero__count"><b data-current>01</b> / {{ str_pad($heroSlides->count(), 2, '0', STR_PAD_LEFT) }}</span>
                <div class="hero__progress"><span data-progress></span></div>
                <div class="hero__arrows">
                    <button type="button" data-prev aria-label="Previous slide"><i class="fas fa-arrow-left"></i></button>
                    <button type="button" data-next aria-label="Next slide"><i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
        @endif
    </div>
</section>

{{-- ===== About ===== --}}
<section class="section">
    <div class="wrap split">
        <div>
            <span class="eyebrow">About TANDS</span>
            <h2>Our promise is to uphold the nation.</h2>
            <div class="prose mb-4">{!! $homeAboutIntro !!}</div>
            <a href="{{ route('about') }}" class="btn-x btn-x--primary">More about us <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
        </div>
        <div class="about-media">
            <img src="{{ $aboutImage ? asset($aboutImage->image_path) : asset('Images/batch3/YZVS7880.JPG') }}"
                alt="{{ $aboutImage->title ?? 'Tanzania National Debate Society participants' }}" loading="lazy">
            <div class="about-media__badge">
                <b>6+</b>
                <span>Years promoting debate</span>
            </div>
        </div>
    </div>
</section>

@include('FrontEnd.includes.growthStatistics')

{{-- ===== Championships ===== --}}
@if ($featuredEvents->isNotEmpty())
    <section class="section">
        <div class="wrap">
            <x-section-head eyebrow="Championships" title="Where Tanzania's best speakers compete">
                The latest edition of each of our championships — open one for its theme, motions and registration.
            </x-section-head>
            <div class="grid grid--4">
                @foreach ($featuredEvents as $featuredEvent)
                    <x-event-card :event="$featuredEvent" />
                @endforeach
            </div>
        </div>
    </section>
@endif

@include('FrontEnd.includes.programs')

{{-- ===== Gallery ===== --}}
@if ($homeGalleryImages->isNotEmpty())
    @php $homeTiles = $homeGalleryImages->count() >= 5 ? $homeGalleryImages->take(5) : $homeGalleryImages; @endphp
    <section class="section">
        <div class="wrap">
            <x-section-head eyebrow="Gallery" title="Moments from the floor" :link="route('gallery')" link-label="View full gallery">
                Opening ceremonies, tense semi-finals and everything in between.
            </x-section-head>
            <x-gallery-grid :count="$homeTiles->count()" featured>
                @foreach ($homeTiles as $image)
                    @include('FrontEnd.includes.galleryTile', ['image' => $image, 'group' => 'home-gallery'])
                @endforeach
            </x-gallery-grid>
        </div>
    </section>
@endif

@include('FrontEnd.includes.testimonials')
@include('FrontEnd.includes.team')
@include('FrontEnd.includes.partners')

{{-- ===== Subscribe ===== --}}
<section class="cta-band on-dark" id="subscribe">
    <img class="cta-band__bg" src="{{ asset('Images/IMG_8922.jpg') }}" alt="" aria-hidden="true" loading="lazy">
    <div class="wrap split">
        <div>
            <span class="eyebrow">Stay in the loop</span>
            <h2>Be one of the people we update.</h2>
            <p class="lead mb-0">New championships and registration openings — straight to your inbox the day they go live.</p>
        </div>
        <form class="form-x form-x--dark" action="{{ route('subscribe.store') }}" method="POST" data-ajax novalidate
            data-success="You're subscribed! We've sent a confirmation to your inbox.">
            <label class="form-label" for="subscribeEmail">Email address</label>
            <div class="inline-form">
                <input type="email" id="subscribeEmail" name="Email" class="form-control" placeholder="you@example.com" autocomplete="email" required>
                <button type="submit" class="btn-x btn-x--accent">Subscribe</button>
            </div>
            <div class="form-status" role="status" aria-live="polite"></div>
        </form>
    </div>
</section>
