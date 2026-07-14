@extends('master')
@section('title', 'About - Tanzania National Debate Society (TANDS)')
@section('canonical', 'https://www.tands.or.tz/about')

@section('head')
   
@endsection

@section('content')
<section class="section10">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12 image-container2">
                <div class="gradient-overlay3"></div>
                <div class="backgroundImage2" id="backgroundImage" style="background-image: url('{{ asset('/Images/EAC.jpg') }}');" alt="Tanzania National debate Society Team">
                    <div class="overlay-text">
                        <div class="row">
                            <div class="col-md-12">
                                <p>"It is better to debate a question without settling it than to settle a question without debating it. ~ Joseph Joubert"</p>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('FrontEnd.includes.about')
@include('FrontEnd.includes.growthStatistics')
@include('FrontEnd.includes.activities')
@include('FrontEnd.includes.programs')
@include('FrontEnd.includes.team')
@include('FrontEnd.includes.testimonials')
@endsection
