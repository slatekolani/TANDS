<section class="section5">
    <div class="col-md-12" style="margin-top: 50px">
        <h3>PARTNERS</h3>
        <p class="pheader">We are cooperative with the community</p>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($partners as $partner)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="background-color: white">
                        <div class="row d-flex justify-content-center align-items-center" style="flex-direction: row">
                            <div class="col-md-3 text-center">
                                @if ($partner->logo_path)
                                    <img src="{{ Storage::url($partner->logo_path) }}" class="partner-logo" alt="{{ $partner->name }} Logo">
                                @endif
                            </div>
                            <div class="col-md-9">
                                <h3>{{ $partner->name }}</h3>
                                <p style="font-size: 15px">{{ $partner->description }}</p>
                                @if ($partner->website_url)
                                    <a href="{{ $partner->website_url }}" class="btn btn-primary btn-sm" style="width: 50%;margin-left:25%;font-weight:bolder;font-size:15px" target="_blank">VISIT SITE</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
