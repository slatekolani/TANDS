<section class="hero-section">
    <div class="hero-slides">
        @forelse ($heroSlides as $index => $slide)
            <div class="slide1 {{ $index === 0 ? 'active' : '' }}">
                <img src="{{ asset($slide->image_path) }}" class="backgroundImage" alt="{{ $slide->caption ?? 'TANDS' }}">
            </div>
        @empty
            <div class="slide1 active">
                <img src="{{ asset('/Images/batch3/YZVS7844.JPG') }}" class="backgroundImage" alt="Tanzania National Debate Society">
            </div>
        @endforelse
        <div class="hero-scrim"></div>
    </div>

    <div class="hero-content">
        <span class="hero-eyebrow">Tanzania National Debate Society</span>

        <div class="hero-text-slides">
            @forelse ($heroSlides as $index => $slide)
                <div class="hero-text-slide {{ $index === 0 ? 'active' : '' }}">
                    @if ($slide->caption)
                        <h2 class="hero-heading">{{ $slide->caption }}</h2>
                    @endif
                    @if ($slide->description)
                        <p class="hero-subtitle">{{ $slide->description }}</p>
                    @endif
                </div>
            @empty
                <div class="hero-text-slide active">
                    <h2 class="hero-heading">Tanzania National Debate Society</h2>
                    <p class="hero-subtitle">Promoting fair, transparent debate, public speaking and quiz excellence across Tanzania and East Africa.</p>
                </div>
            @endforelse
        </div>

        <div class="hero-cta">
            <a href="{{ route('about') }}" class="btn-hero-primary">Discover Our Mission</a>
            <a href="{{ route('gallery') }}" class="btn-hero-ghost">View Gallery</a>
        </div>
    </div>

    <div class="hero-controls">
        <button type="button" class="hero-arrow hero-arrow-prev" aria-label="Previous slide">&#8249;</button>
        <div class="hero-dots"></div>
        <button type="button" class="hero-arrow hero-arrow-next" aria-label="Next slide">&#8250;</button>
    </div>
</section>

<section class="section2">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6" style="margin-top: 70px">
                <h1>Tanzania National Debate Society(TANDS)</h1>
                <h3>ABOUT</h3>
                <p class="pheader">Our Promise is to uphold the nations</p>
                <p style="font-size: 18px">{!! $homeAboutIntro !!}</p>
            </div>

            <div class="col-md-6" style="margin-top: 50px; position: relative; align-self: flex-start;">
                <img src="{{ $aboutImage ? asset($aboutImage->image_path) : asset('/Images/batch3/YZVS7880.JPG') }}" class="otherImages"
                    style="width: 100%; height: auto;filter:contrast(140%)" alt="{{ $aboutImage->title ?? 'A team of Tanzania national debate society' }}">
                <div class="image-text">
                    <span class="stat-badge-overlay">6+ Years</span>
                </div>
            </div>
        </div>
    </div>
</section>

@include('FrontEnd.includes.growthStatistics')
@include('FrontEnd.includes.programs')
@include('FrontEnd.includes.team')
@include('FrontEnd.includes.partners')

<section class="section6">
    <div class="col-md-12" style="margin-top: 50px">
        <h3>GALLERY</h3>
        <p class="pheader">Here goes the moments together!</p>
        <div class="row" style="margin-top: 30px">
            <div class="col-md-12">
                <div class="gallery-row">
                    @foreach ($homeGalleryImages as $image)
                        <div class="col-md-4">
                            <div class="gallery-item">
                                <a data-fancybox="gallery"
                                    data-caption="{{ $image->title }}, {{ $image->caption }}"
                                    href="{{ asset($image->image_path) }}">
                                    <img src="{{ asset($image->image_path) }}" loading="lazy" alt="{{ $image->title }}"
                                        style="filter: contrast(140%)">
                                    <div class="card-img-overlay">
                                        <p class="card-text card-text-white"
                                            style="font-size: 1.5rem; font-weight: bold; position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem;">
                                            {{ $image->title }}<br>
                                            <span
                                                style="font-family: 'Montserrat', sans-serif;font-weight: normal;font-size: 1rem">{{ $image->caption }}</span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@include('FrontEnd.includes.testimonials')
<section class="section7">
    <div class="col-md-12" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12 image-container" style="position: relative;">
                <div class="gradient-overlay2"></div>
                <img src="{{ asset('/Images/IMG_8922.jpg') }}" class="backgroundImage" id="backgroundImage">
                <div class="text-overlay">
                    <h3>SUBSCRIBE</h3>
                    <p class="pheader">Be one of the people we update!</p>
                    <form id="subscribe" style="width: 100%">
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-fly"></i></span>
                                <input type="email" name="Email" class="form-control"
                                    placeholder="zawadi@gmail.com" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary d-flex align-items-center">
                            <i class="fas fa-paper-plane"></i> Send
                        </button>
                    </form>
                    <span id="msg"></span>
                </div>
            </div>
        </div>
    </div>
</section>
