<section class="section6" style="margin-top: 150px">
    <div class="col-md-12">
        <h1>GALLERY</h1>
        <p class="pheader">Here goes the moments together!</p>
        <div class="row" style="margin-top: 30px">
            <div class="col-md-12">
                <div class="gallery-row">
                    @foreach ($galleryImages as $image)
                        <div class="col-md-4">
                            <div class="gallery-item">
                                <a data-fancybox="gallery"
                                   data-caption="{{ $image->title }}, {{ $image->caption }}"
                                   href="{{ asset($image->image_path) }}">
                                    <img src="{{ asset($image->image_path) }}" loading="lazy" alt="{{ $image->title }}" style="filter: contrast(140%)">
                                    <div class="card-img-overlay">
                                        <p class="card-text card-text-white"
                                           style="font-size: 1.5rem; font-weight: bold; position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem;">
                                            {{ $image->title }}<br>
                                            <span style="font-family: 'Montserrat', sans-serif;font-weight: normal;font-size: 1rem">
                                                {{ $image->caption }}
                                            </span>
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
