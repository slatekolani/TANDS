<section class="section3">
    <div class="col-md-12" style="margin-top: 50px">
        <h3>PROGRAMS</h3>
        <p class="pheader">We invest in meaningful programs</p>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach ($programs as $program)
                        <div class="col-md-3">
                            <div class="card individualCard">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center align-items-center card-content" style="flex-direction: column">
                                        <i class="{{ $program->icon_class }} icon-large" style="color: {{ $program->icon_color ?? '#323366' }};"></i>
                                        <p class="pheader2" style="margin-left:0">{{ $program->title }}</p>
                                        <p style="font-size: 15px">{{ $program->description }}</p>
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
