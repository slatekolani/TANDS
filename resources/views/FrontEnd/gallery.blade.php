@extends('master')
@section('title', 'Gallery - Tanzania National Debate Society (TANDS)')
@section('canonical', 'https://www.tands.or.tz/gallery')

@section('content')
    <x-page-hero eyebrow="Gallery" title="Here go the moments together" :crumbs="['Gallery' => null]">
        <p class="lead mb-0">Photos from our championships, trainings and community events. Tap any photo to view it full screen.</p>
    </x-page-hero>

    @include('FrontEnd.includes.allImages')
@endsection
