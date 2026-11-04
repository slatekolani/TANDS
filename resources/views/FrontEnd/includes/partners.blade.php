@if ($partners->isNotEmpty())
    <section class="section section--alt">
        <div class="wrap">
            <x-section-head eyebrow="Partners" title="We are cooperative with the community">
                The schools, companies and institutions that make our championships possible.
            </x-section-head>
            <div class="grid grid--3">
                @foreach ($partners as $partner)
                    <article class="card-x partner">
                        <div class="partner__logo">
                            @if ($partner->logo_path)
                                <img src="{{ asset($partner->logo_path) }}" alt="{{ $partner->name }} logo" loading="lazy">
                            @endif
                        </div>
                        <h4>{{ $partner->name }}</h4>
                        @if ($partner->description)
                            <p>{{ $partner->description }}</p>
                        @endif
                        @if ($partner->website_url)
                            <a href="{{ $partner->website_url }}" class="link-arrow" target="_blank" rel="noopener">Visit site <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                        @endif
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif
