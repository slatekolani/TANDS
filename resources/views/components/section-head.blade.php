@props(['eyebrow' => null, 'title', 'link' => null, 'linkLabel' => null, 'tag' => 'h2'])

<header class="section-head">
    <div class="section-head__text">
        @if ($eyebrow)
            <span class="eyebrow">{{ $eyebrow }}</span>
        @endif
        <{{ $tag }}>{{ $title }}</{{ $tag }}>
        @if (trim($slot) !== '')
            <p class="lead">{{ $slot }}</p>
        @endif
    </div>
    @if ($link)
        <a href="{{ $link }}" class="link-arrow">{{ $linkLabel }} <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
    @endif
</header>
