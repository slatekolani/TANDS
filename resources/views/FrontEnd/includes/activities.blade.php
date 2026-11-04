@if ($activities->isNotEmpty())
    <section class="section">
        <div class="wrap">
            <x-section-head eyebrow="Activities" title="Our mission is best served by these activities" />
            @foreach ($activities as $index => $activity)
                @php $images = array_values(array_filter([$activity->image_path_1, $activity->image_path_2])); @endphp
                <div class="split activity">
                    <div class="activity__media">
                        @if (count($images))
                            <div id="activityCarousel{{ $index }}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                                <div class="carousel-inner">
                                    @foreach ($images as $i => $path)
                                        <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                                            <a href="{{ asset($path) }}" data-fancybox="activity-{{ $index }}" data-caption="{{ Str::title($activity->title) }}">
                                                <img src="{{ asset($path) }}" alt="{{ Str::title($activity->title) }}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                @if (count($images) > 1)
                                    <div class="carousel-indicators">
                                        @foreach ($images as $i => $path)
                                            <button type="button" data-bs-target="#activityCarousel{{ $index }}" data-bs-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}" aria-label="Photo {{ $i + 1 }}"></button>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                    <div>
                        <span class="eyebrow">Activity {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3>{{ Str::title($activity->title) }}</h3>
                        <div class="prose">{!! nl2br(e($activity->description)) !!}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif
