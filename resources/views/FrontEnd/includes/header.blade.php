<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<header class="header" id="header">
    <div class="logo">
        <a href="{{route('home')}}">
            <img src="{{asset('/Logo/TANDS LOGO.png')}}" alt="Tanzania National Debate Society Logo">
        </a>
    </div>

    <nav class="navigation" id="navigation">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{route('gallery')}}">Gallery</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Events <i class="fas fa-caret-down"></i></a>
                <div class="dropdown-content">
                    @forelse ($navEvents as $series => $seriesEvents)
                        <div class="sub-dropdown">
                            <a href="javascript:void(0)" class="sub-dropbtn">{{ $series ?: 'Other' }} <i class="fas fa-caret-right"></i></a>
                            <div class="sub-dropdown-content">
                                @foreach ($seriesEvents as $navEvent)
                                    <a href="{{ $navEvent->url }}">{{ $navEvent->year ?: $navEvent->title }}</a>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <a href="{{ route('home') }}">No events yet</a>
                    @endforelse
                </div>
            </li>
            <li><a href="{{route('contactUs')}}">Contact Us</a></li>
        </ul>
    </nav>

    <div class="header-actions">
        @auth
            <a href="{{ route('admin.dashboard') }}" class="header-dashboard-btn"><i class="fas fa-gauge-high"></i> Dashboard</a>
        @endauth
        <a href="{{ route('home') }}#subscribe" class="header-subscribe-btn">Subscribe</a>
        <button class="openbtn" onclick="openNav()">☰</button>
    </div>
</header>

<!-- Sidepanel for smaller screens -->
<div id="mySidepanel" class="sidepanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{route('gallery')}}">Gallery</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Events <i class="fas fa-caret-down"></i></a>
            <div class="dropdown-content">
                @forelse ($navEvents as $series => $seriesEvents)
                    <div class="sub-dropdown">
                        <a href="javascript:void(0)" class="sub-dropbtn">{{ $series ?: 'Other' }} <i class="fas fa-caret-down"></i></a>
                        <div class="sub-dropdown-content">
                            @foreach ($seriesEvents as $navEvent)
                                <a href="{{ $navEvent->url }}">{{ $navEvent->year ?: $navEvent->title }}</a>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <a href="{{ route('home') }}">No events yet</a>
                @endforelse
            </div>
        </li>
        <li><a href="{{route('contactUs')}}">Contact Us</a></li>
        @auth
            <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-gauge-high"></i> Dashboard</a></li>
        @endauth
        <li><a href="{{ route('home') }}#subscribe" class="sidepanel-subscribe-btn">Subscribe</a></li>
    </ul>
    <!-- Social Media Links -->
    <div class="social-links">
        <a href="{{ $socialInstagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="{{ $socialTwitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="{{ $socialFacebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
    </div>
</div>

<style>
/* General Reset */
body {
    margin: 0;
    padding-top: 80px; /* Prevents content overlap with fixed header */
}

/* Header Styles */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 15px;
    background-color: #fff;
    position: fixed;
    top: 0;
    width: 100%;
    height: 120px; /* Fixed height for consistency */
    z-index: 1000;
    box-shadow: 0 0 0 rgba(15, 23, 42, 0);
    transition: transform .45s cubic-bezier(.4, 0, .2, 1),
                height .35s cubic-bezier(.4, 0, .2, 1),
                box-shadow .35s ease;
}

.header.hide {
    transform: translateY(-100%);
}

/* Compact mode once the page has scrolled past the hero */
.header.header-scrolled {
    height: 78px;
    box-shadow: 0 4px 24px rgba(15, 23, 42, .08);
}

/* Logo Styles */
.logo {
    height: 250px;
    transition: height .35s cubic-bezier(.4, 0, .2, 1);
}

.header-scrolled .logo {
    height: 160px;
}

.logo img {
    height: 100%;
    width: auto;
}

/* Navigation Styles */
.navigation {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}

.navigation ul {
    list-style-type: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.navigation ul li {
    position: relative;
}

.navigation ul li a {
    color: #323366;
    text-decoration: none;
    padding: 10px 15px;
    display: block;
    transition: background-color 0.3s, color 0.3s;
}

.navigation ul li a:hover {
    background-color: #323366;
    color: #fff;
}

/* Dropdown Styles */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff;
    min-width: 160px;
    box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: #323366;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    transition: background-color 0.3s, color 0.3s;
}

.dropdown-content a:hover {
    background-color: #323366;
    color: #fff;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropbtn i {
    margin-left: 5px;
}

/* Sub-Dropdown Styles */
.sub-dropdown {
    position: relative;
}

.sub-dropdown-content {
    display: none;
    position: absolute;
    top: 0;
    left: 100%;
    background-color: #fff;
    min-width: 120px;
    box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
    z-index: 1;
}

.sub-dropdown-content a {
    color: #323366;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    transition: background-color 0.3s, color 0.3s;
}

.sub-dropdown-content a:hover {
    background-color: #323366;
    color: #fff;
}

.sub-dropdown:hover .sub-dropdown-content {
    display: block;
}

.sub-dropbtn i {
    margin-left: 5px;
}

/* Top-right actions */
.header-actions {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-left: auto;
}

.header-subscribe-btn {
    display: inline-block;
    font-family: 'Poppins', sans-serif;
    font-size: .88rem;
    font-weight: 500;
    color: #fff;
    background: #24263b;
    padding: 9px 22px;
    border-radius: 6px;
    text-decoration: none;
    transition: background .2s ease;
}

.header-subscribe-btn:hover {
    background: #03A3DE;
    color: #fff;
}

.header-dashboard-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-family: 'Poppins', sans-serif;
    font-size: .88rem;
    font-weight: 500;
    color: #24263b;
    background: #fff;
    border: 1px solid #24263b;
    padding: 8px 18px;
    border-radius: 6px;
    text-decoration: none;
    transition: background .2s ease, color .2s ease;
}

.header-dashboard-btn:hover {
    background: #24263b;
    color: #fff;
}

/* Mobile Menu Button */
.openbtn {
    display: none;
    background: none;
    border: none;
    font-size: 24px;
    color: #323366;
    cursor: pointer;
    padding: 10px;
}

.openbtn:hover {
    background-color: #03A3DE;
    color: #fff;
}

/* Sidepanel Styles */
.sidepanel {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1000;
    top: 0;
    right: 0;
    background-color: #333;
    overflow-x: hidden;
    transition: width 0.5s;
    padding-top: 60px;
}

.sidepanel ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.sidepanel a {
    padding: 10px 15px 10px 32px;
    text-decoration: none;
    font-size: 20px;
    color: #fff;
    display: block;
    transition: color 0.3s;
}

.sidepanel a:hover {
    color: #03A3DE;
}

.sidepanel .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    padding: 10px;
}

.sidepanel .dropdown-content {
    display: none;
    position: static;
    background-color: #444;
    padding-left: 20px;
    box-shadow: none;
}

.sidepanel .dropdown.active .dropdown-content {
    display: block;
}

.sidepanel .sub-dropdown-content {
    display: none;
    position: static;
    background-color: #555;
    padding-left: 40px;
    box-shadow: none;
}

.sidepanel .sub-dropdown.active .sub-dropdown-content {
    display: block;
}

.sidepanel-subscribe-btn {
    display: inline-block !important;
    margin: 10px 15px 0 32px !important;
    padding: 8px 20px !important;
    background: #03A3DE;
    color: #fff !important;
    border-radius: 6px;
    font-size: 16px !important;
}

.sidepanel .social-links {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}

.sidepanel .social-links a {
    margin: 0 15px;
    font-size: 24px;
    color: #fff;
}

.sidepanel .social-links a:hover {
    color: #03A3DE;
}

/* Responsive Media Query */
@media screen and (max-width: 768px) {
    .navigation {
        display: none;
    }
    .openbtn {
        display: block;
    }
    .header-subscribe-btn, .header-dashboard-btn {
        display: none;
    }
}
</style>

<script>
// Sidepanel Functions
function openNav() {
    document.getElementById("mySidepanel").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
}

// Close sidepanel when clicking outside
document.addEventListener('click', function(event) {
    const sidepanel = document.getElementById("mySidepanel");
    const openbtn = document.querySelector('.openbtn');
    const header = document.getElementById('header');

    if (!sidepanel.contains(event.target) && !openbtn.contains(event.target) && !header.contains(event.target)) {
        closeNav();
    }
});

// Smart header: full-size and always visible near the top; once past the
// hero it compacts and gains a shadow, tucking away on a deliberate scroll
// down and reappearing (already compact) the moment you scroll back up.
(function() {
    const header = document.getElementById('header');
    const COMPACT_AT = 60;
    const DIRECTION_THRESHOLD = 8;

    let lastScrollTop = 0;
    let ticking = false;

    function update() {
        const scrollTop = Math.max(window.pageYOffset || document.documentElement.scrollTop, 0);

        header.classList.toggle('header-scrolled', scrollTop > COMPACT_AT);

        if (scrollTop <= COMPACT_AT) {
            header.classList.remove('hide');
            lastScrollTop = scrollTop;
        } else if (Math.abs(scrollTop - lastScrollTop) > DIRECTION_THRESHOLD) {
            header.classList.toggle('hide', scrollTop > lastScrollTop);
            lastScrollTop = scrollTop;
        }

        ticking = false;
    }

    window.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(update);
            ticking = true;
        }
    }, { passive: true });
})();

// Dropdown toggle for mobile
document.addEventListener('DOMContentLoaded', function() {
    const dropdowns = document.querySelectorAll('.dropdown, .sub-dropdown');
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function(e) {
            if (window.innerWidth <= 768 && (e.target.classList.contains('dropbtn') || e.target.classList.contains('sub-dropbtn'))) {
                e.preventDefault();
                this.classList.toggle('active');
            }
        });
    });
});
</script>
