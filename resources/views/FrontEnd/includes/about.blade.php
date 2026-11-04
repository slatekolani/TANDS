<section class="section">
    <div class="wrap split split--top">
        <div>
            <span class="eyebrow">Who we are</span>
            <h2>A platform for fair, transparent and representative debate.</h2>
        </div>
        <div class="prose">{!! $aboutIntro !!}</div>
    </div>
</section>

<section class="section section--alt">
    <div class="wrap">
        <x-section-head eyebrow="Purpose" title="Mission & vision" />
        <div class="grid grid--2">
            <article class="card-x pillar">
                <img src="{{ asset('Images/batch2/IMG_8872.jpg') }}" alt="Students debating at a TANDS championship" loading="lazy">
                <div class="pillar__body">
                    <span class="eyebrow">Our mission</span>
                    <p>{{ $aboutMission }}</p>
                </div>
            </article>
            <article class="card-x pillar">
                <img src="{{ asset('Images/batch2/_TM_0317.jpg') }}" alt="A student delivering a public speech" loading="lazy">
                <div class="pillar__body">
                    <span class="eyebrow">Our vision</span>
                    <p>{{ $aboutVision }}</p>
                </div>
            </article>
        </div>
    </div>
</section>
