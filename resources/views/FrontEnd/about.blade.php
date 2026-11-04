@extends('master')
@section('title', 'About - Tanzania National Debate Society (TANDS)')
@section('canonical', 'https://www.tands.or.tz/about')

@section('content')
    <x-page-hero eyebrow="About us" title="About Tanzania National Debate Society" :image="asset('Images/EAC.jpg')" :crumbs="['About' => null]">
        <blockquote class="page-hero__quote">
            “It is better to debate a question without settling it than to settle a question without debating it.”
            <cite>— Joseph Joubert</cite>
        </blockquote>
    </x-page-hero>

    @include('FrontEnd.includes.about')
    @include('FrontEnd.includes.growthStatistics')
    @include('FrontEnd.includes.activities')
    @include('FrontEnd.includes.programs')
    @include('FrontEnd.includes.team')
    @include('FrontEnd.includes.testimonials')
@endsection
