<section class="section3">
    <div class="col-md-12" style="margin-top: 50px">
        <h3>GROWTH STATISTICS</h3>
        <p class="pheader">We are coming for you!</p>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach ($growthStats as $stat)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center align-items-center" style="flex-direction: column">
                                        <i class="{{ $stat->icon_class }} icon-large" style="color: darkred;"></i>
                                        <p class="pheader2">{{ $stat->label }}</p>
                                        <div class="content">
                                            <div class="counter" data-target="{{ $stat->value }}" data-suffix="{{ $stat->suffix }}">0{{ $stat->suffix }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
