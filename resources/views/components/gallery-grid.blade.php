@props(['count' => 0, 'featured' => false])

@php
    // Pick a layout that fills every row for this many photos.
    if ($featured && $count === 5) {
        $layout = 'gallery-grid--featured';
    } elseif ($count === 1) {
        $layout = 'gallery-grid--single';
    } else {
        $layout = ['', 'gallery-grid--r1', 'gallery-grid--r2'][$count % 3];
    }
    if ($count % 2 === 1) {
        $layout .= ' gallery-grid--odd';
    }
@endphp

<div {{ $attributes->merge(['class' => trim('gallery-grid ' . $layout)]) }}>
    {{ $slot }}
</div>
