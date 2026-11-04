@if ($growthStats->isNotEmpty())
    <section class="section section--dark section--tight" aria-labelledby="statsTitle">
        <div class="wrap">
            <h2 id="statsTitle" class="visually-hidden">Growth statistics</h2>
            <div class="stats">
                @foreach ($growthStats as $stat)
                    <div class="stat">
                        <i class="{{ $stat->icon_class }}" aria-hidden="true"></i>
                        <span class="stat__value" data-count="{{ (int) $stat->value }}" data-suffix="{{ $stat->suffix }}">{{ number_format((int) $stat->value) }}{{ $stat->suffix }}</span>
                        <span class="stat__label">{{ $stat->label }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
