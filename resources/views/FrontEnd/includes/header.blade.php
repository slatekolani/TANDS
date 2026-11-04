@php
    $isEventPage = request()->routeIs('event.show')
        || $navEvents->flatten()->contains(fn ($navEvent) => request()->routeIs($navEvent->slug));
    $navLinks = [
        ['label' => 'Home', 'url' => route('home'), 'active' => request()->routeIs('home') || request()->is('/')],
        ['label' => 'About', 'url' => route('about'), 'active' => request()->routeIs('about')],
    ];
@endphp

<header class="site-header" id="siteHeader">
    <div class="wrap site-header__inner">
        <a class="brand" href="{{ route('home') }}" aria-label="Tanzania National Debate Society — home">
            <img src="{{ asset('Logo/tands-logo-color.png') }}" alt="Tanzania National Debate Society" width="870" height="316">
        </a>

        <nav class="main-nav" aria-label="Main">
            <ul>
                @foreach ($navLinks as $link)
                    <li><a href="{{ $link['url'] }}" class="main-nav__link {{ $link['active'] ? 'is-active' : '' }}">{{ $link['label'] }}</a></li>
                @endforeach
                <li class="has-panel">
                    <button type="button" class="main-nav__link {{ $isEventPage ? 'is-active' : '' }}" aria-haspopup="true">
                        Events <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </button>
                    <div class="events-panel">
                        @if ($navEvents->isEmpty())
                            <p class="mb-0 text-muted">No events published yet.</p>
                        @else
                            <div class="events-panel__grid">
                                @foreach ($navEvents as $series => $seriesEvents)
                                    <div>
                                        <span class="events-panel__series">{{ $series ?: 'Other' }}</span>
                                        <ul>
                                            @foreach ($seriesEvents as $navEvent)
                                                <li>
                                                    <a href="{{ $navEvent->url }}">
                                                        {{ $navEvent->year ?: $navEvent->title }}
                                                        @if ($navEvent->status === 'upcoming')
                                                            <span class="tag tag--live">Open</span>
                                                        @elseif ($navEvent->status === 'ongoing')
                                                            <span class="tag tag--live">Live</span>
                                                        @endif
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </li>
                <li><a href="{{ route('gallery') }}" class="main-nav__link {{ request()->routeIs('gallery') ? 'is-active' : '' }}">Gallery</a></li>
                <li><a href="{{ route('contactUs') }}" class="main-nav__link {{ request()->routeIs('contactUs') ? 'is-active' : '' }}">Contact</a></li>
            </ul>
        </nav>

        <div class="site-header__actions">
            @auth
                <a href="{{ route('admin.dashboard') }}" class="btn-x btn-x--outline btn-x--sm"><i class="fas fa-tachometer-alt" aria-hidden="true"></i> Dashboard</a>
            @endauth
            <a href="{{ route('home') }}#subscribe" class="btn-x btn-x--primary btn-x--sm">Subscribe</a>
            <button type="button" class="nav-toggle" aria-label="Open menu" aria-controls="mobileNav" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>

<div class="mobile-nav" id="mobileNav" aria-hidden="true">
    <div class="mobile-nav__backdrop" data-close-nav></div>
    <div class="mobile-nav__panel" role="dialog" aria-modal="true" aria-label="Menu">
        <div class="mobile-nav__top">
            <img src="{{ asset('Logo/tands-logo-color.png') }}" alt="Tanzania National Debate Society">
            <button type="button" class="mobile-nav__close" data-close-nav aria-label="Close menu"><i class="fas fa-times"></i></button>
        </div>

        <ul class="mobile-nav__links">
            @foreach ($navLinks as $link)
                <li><a href="{{ $link['url'] }}">{{ $link['label'] }}</a></li>
            @endforeach
            <li>
                <button type="button" class="mobile-nav__acc" aria-expanded="{{ $isEventPage ? 'true' : 'false' }}" aria-controls="mobileEvents">
                    Events <i class="fas fa-chevron-down" aria-hidden="true"></i>
                </button>
                <div class="mobile-nav__sub {{ $isEventPage ? 'is-open' : '' }}" id="mobileEvents">
                    @forelse ($navEvents as $series => $seriesEvents)
                        <div class="mobile-nav__series">
                            <span>{{ $series ?: 'Other' }}</span>
                            <div>
                                @foreach ($seriesEvents as $navEvent)
                                    <a href="{{ $navEvent->url }}">{{ $navEvent->year ?: $navEvent->title }}</a>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <p class="text-muted mb-0">No events published yet.</p>
                    @endforelse
                </div>
            </li>
            <li><a href="{{ route('gallery') }}">Gallery</a></li>
            <li><a href="{{ route('contactUs') }}">Contact</a></li>
        </ul>

        <div class="mobile-nav__foot">
            <a href="{{ route('home') }}#subscribe" class="btn-x btn-x--primary btn-x--block" data-close-nav>Subscribe for updates</a>
            @auth
                <a href="{{ route('admin.dashboard') }}" class="btn-x btn-x--outline btn-x--block"><i class="fas fa-tachometer-alt" aria-hidden="true"></i> Dashboard</a>
            @endauth
            <div class="socials mt-2">
                <a href="{{ $socialInstagram }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="{{ $socialTwitter }}" target="_blank" rel="noopener" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="{{ $socialFacebook }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            </div>
        </div>
    </div>
</div>
