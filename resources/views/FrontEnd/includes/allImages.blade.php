<section class="section">
    <div class="wrap">
        @if ($galleryImages->isNotEmpty())
            <x-gallery-grid :count="$galleryImages->count()">
                @foreach ($galleryImages as $image)
                    @include('FrontEnd.includes.galleryTile', ['image' => $image, 'group' => 'gallery'])
                @endforeach
            </x-gallery-grid>
        @else
            <div class="empty-state">Photos are on their way — check back after our next championship.</div>
        @endif
    </div>
</section>
