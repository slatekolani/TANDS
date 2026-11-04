@if ($testimonials->isNotEmpty())
    <section class="section section--dark">
        <div class="wrap quotes" data-quotes>
            <div>
                <span class="eyebrow">Testimonials</span>
                <h2>What our participants say</h2>
                <p class="lead">Comments from our debate participants — in their own words.</p>
                @if ($testimonials->count() > 1)
                    <div class="quotes__controls">
                        <button type="button" class="round-btn" data-prev aria-label="Previous testimonial"><i class="fas fa-arrow-left"></i></button>
                        <button type="button" class="round-btn" data-next aria-label="Next testimonial"><i class="fas fa-arrow-right"></i></button>
                        <span class="quotes__count"><b data-current>01</b> / {{ str_pad($testimonials->count(), 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                @endif
            </div>
            <div class="quotes__stage" aria-live="polite">
                @foreach ($testimonials as $testimonial)
                    <blockquote class="quote {{ $loop->first ? 'is-active' : '' }}">
                        <i class="fas fa-quote-left" aria-hidden="true"></i>
                        <p>{{ $testimonial->message }}</p>
                        <footer>
                            <span class="avatar" aria-hidden="true">{{ collect(explode(' ', $testimonial->author_name))->map(fn ($w) => mb_substr($w, 0, 1))->take(2)->implode('') }}</span>
                            <cite>{{ $testimonial->author_name }}<span>TANDS participant</span></cite>
                        </footer>
                    </blockquote>
                @endforeach
            </div>
        </div>
    </section>
@endif
