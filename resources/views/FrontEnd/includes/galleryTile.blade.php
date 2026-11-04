<a class="gallery-tile" href="{{ asset($image->image_path) }}" data-fancybox="{{ $group ?? 'gallery' }}"
    data-caption="{{ trim(($image->title ?? '') . ($image->caption ? ' — ' . $image->caption : '')) }}">
    <img src="{{ asset($image->image_path) }}" alt="{{ $image->title ?? $image->caption ?? 'TANDS gallery photo' }}" loading="lazy">
    @if ($image->title || $image->caption)
        <span class="gallery-tile__caption">
            @if ($image->title)<b>{{ $image->title }}</b>@endif
            @if ($image->caption)<span>{{ $image->caption }}</span>@endif
        </span>
    @endif
</a>
