<style>
    .carousel-item {
        position: relative;
        overflow: hidden;
        height: 100%;
    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        min-height: 60vh;
        object-fit: cover;
        filter: contrast(1.2);
        transition: transform 0.5s ease-in-out;
    }

    .carousel-item:hover img {
        transform: scale(1.1);
    }

    .programDescription {
        margin-top: 40px;
    }

    @media (max-width: 578px) {
        .programDescription {
            margin-top: 40;
        }
    }
</style>
<section class="section4">
    <div class="col-md-12" style="margin-top: 50px">
        <h3>ACTIVITIES</h3>
        <p class="pheader">Our Mission is best served by these activities</p>

        @foreach ($activities as $index => $activity)
            <div class="row" style="margin-top: 10px">
                <div class="col-md-6 {{ $loop->odd ? 'order-md-1' : 'order-md-2' }}" style="position: relative;">
                    <div id="activityCarousel{{ $index }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if ($activity->image_path_1)
                                <div class="carousel-item active">
                                    <a data-fancybox="gallery" data-caption="{{ $activity->title }}" href="{{ Storage::url($activity->image_path_1) }}">
                                        <img src="{{ Storage::url($activity->image_path_1) }}" loading="lazy" alt="{{ $activity->title }}" style="filter: contrast(140%)">
                                    </a>
                                </div>
                            @endif
                            @if ($activity->image_path_2)
                                <div class="carousel-item {{ $activity->image_path_1 ? '' : 'active' }}">
                                    <a data-fancybox="gallery" data-caption="{{ $activity->title }}" href="{{ Storage::url($activity->image_path_2) }}">
                                        <img src="{{ Storage::url($activity->image_path_2) }}" loading="lazy" alt="{{ $activity->title }}" style="filter: contrast(140%)">
                                    </a>
                                </div>
                            @endif
                        </div>
                        <ol class="carousel-indicators">
                            <li data-bs-target="#activityCarousel{{ $index }}" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#activityCarousel{{ $index }}" data-bs-slide-to="1"></li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-6 programDescription {{ $loop->odd ? 'order-md-2' : 'order-md-1' }}">
                    <h3>{{ $activity->title }}</h3>
                    <p class="descriptionText">{{ $activity->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
