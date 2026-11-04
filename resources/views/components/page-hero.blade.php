@props(['eyebrow' => null, 'title', 'image' => null, 'crumbs' => []])

<section class="page-hero">
    @if ($image)
        <img class="page-hero__bg" src="{{ $image }}" alt="" aria-hidden="true">
    @endif
    <div class="wrap">
        @if (count($crumbs))
            <ol class="breadcrumb-x" aria-label="Breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                @foreach ($crumbs as $label => $url)
                    <li>@if ($url)<a href="{{ $url }}">{{ $label }}</a>@else<span aria-current="page">{{ $label }}</span>@endif</li>
                @endforeach
            </ol>
        @endif
        @if ($eyebrow)
            <span class="eyebrow">{{ $eyebrow }}</span>
        @endif
        <h1>{{ $title }}</h1>
        {{ $slot }}
    </div>
</section>
