@props(['event'])

<a href="{{ $event->url }}" class="card-x event-card">
    <div class="event-card__media">
        <img src="{{ $event->banner_image ? asset($event->banner_image) : asset('Images/EAC.jpg') }}" alt="" loading="lazy">
        @if ($event->status === 'upcoming')
            <span class="tag tag--live">Registration open</span>
        @elseif ($event->status === 'ongoing')
            <span class="tag tag--live">Happening now</span>
        @else
            <span class="tag">Past edition</span>
        @endif
    </div>
    <div class="event-card__body">
        @if ($event->series)
            <span class="event-card__series">{{ $event->series }} {{ $event->year }}</span>
        @endif
        <h4>{{ $event->title }}</h4>
        @if ($event->theme)
            <p class="mb-0">{{ Str::limit($event->theme, 90) }}</p>
        @endif
        <div class="event-card__meta">
            @if ($event->event_date)
                <div><i class="far fa-calendar" aria-hidden="true"></i> {{ $event->event_date->format('d M Y') }}</div>
            @endif
            @if ($event->location)
                <div><i class="fas fa-map-marker-alt" aria-hidden="true"></i> {{ $event->location }}</div>
            @endif
        </div>
    </div>
</a>
