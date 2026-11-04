@if ($programs->isNotEmpty())
    <section class="section section--alt">
        <div class="wrap">
            <x-section-head eyebrow="Programs" title="We invest in meaningful programs">
                Year-round programs that build critical thinking, confidence and teamwork in young people.
            </x-section-head>
            <div class="grid grid--{{ min(max($programs->count(), 2), 4) }}">
                @foreach ($programs as $program)
                    <article class="card-x">
                        <span class="card-x__index">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="icon-tile"><i class="{{ $program->icon_class }}" aria-hidden="true"></i></span>
                        <h4>{{ $program->title }}</h4>
                        <p class="mb-0">{{ $program->description }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif
