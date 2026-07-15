<section class="section9 testimonials-section">
    <div class="col-md-12">
        <h3>TESTIMONIALS</h3>
        <p class="pheader">Comments from our debate participants</p>

        <div class="testimonial-carousel">
            <div class="testimonial-card">
                @foreach ($testimonials as $testimonial)
                    <div class="mySlides">
                        <i class="fas fa-quote-left testimonial-quote-icon"></i>
                        <p class="testimonial-message">{{ $testimonial->message }}</p>
                        <div class="testimonial-author">
                            <span class="testimonial-avatar">
                                {{ collect(explode(' ', $testimonial->author_name))->map(fn ($word) => mb_substr($word, 0, 1))->take(2)->implode('') }}
                            </span>
                            <span class="testimonial-name">{{ $testimonial->author_name }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($testimonials->count() > 1)
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            @endif
        </div>

        @if ($testimonials->count() > 1)
            <div class="dot-container">
                @foreach ($testimonials as $testimonial)
                    <span class="dot" onclick="currentSlide({{ $loop->iteration }})"></span>
                @endforeach
            </div>
        @endif
    </div>
</section>
