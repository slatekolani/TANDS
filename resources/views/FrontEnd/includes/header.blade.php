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
                <a href="javascript:void(0)" class="dropbtn">Programs <i class="fas fa-caret-down"></i></a>
                <div class="dropdown-content">
                    <a href="">Quiz Challenge</a>
                    <a href="">Debates</a>
                    <a href="">Public Speaking</a>
                    <a href="">Trainings</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Events <i class="fas fa-caret-down"></i></a>
                <div class="dropdown-content">
                    <div class="sub-dropdown">
                        <a href="javascript:void(0)" class="sub-dropbtn">EASDC <i class="fas fa-caret-right"></i></a>
                        <div class="sub-dropdown-content">
                            <a href="{{route('EASDC')}}">2024</a>
                            <a href="{{route('EASDC2025')}}">2025</a>
                        </div>
                    </div>
                    <div class="sub-dropdown">
                        <a href="javascript:void(0)" class="sub-dropbtn">TNDC <i class="fas fa-caret-right"></i></a>
                        <div class="sub-dropdown-content">
                            <a href="{{route('TNDC2025')}}">2025</a>
                            <a href="{{route('TNDC2026')}}">2026</a>
                        </div>
                    </div>
                    <div class="sub-dropdown">
                        <a href="javascript:void(0)" class="sub-dropbtn">ADC <i class="fas fa-caret-right"></i></a>
                        <div class="sub-dropdown-content">
                            <a href="{{route('ADC')}}">2025</a>
                            <a href="{{route('ADC2026')}}">2026</a>
                        </div>
                    </div>
                    <div class="sub-dropdown">
                        <a href="javascript:void(0)" class="sub-dropbtn">TISDC <i class="fas fa-caret-right"></i></a>
                        <div class="sub-dropdown-content">
                            <a href="{{route('TISDC2025')}}">2025</a>
                        </div>
                    </div>
                </div>
            </li>
            <li><a href="{{route('contactUs')}}">Contact Us</a></li>
        </ul>
    </nav>
    
    <button class="openbtn" onclick="openNav()">☰</button>
</header>

<!-- Sidepanel for smaller screens -->
<div id="mySidepanel" class="sidepanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{route('gallery')}}">Gallery</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Programs <i class="fas fa-caret-down"></i></a>
            <div class="dropdown-content">
                <a href="{{route('EASDC')}}">Quiz Challenge</a>
                <a href="{{route('EASDC')}}">Debates</a>
                <a href="{{route('EASDC')}}">Public Speaking</a>
                <a href="{{route('EASDC')}}">Trainings</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Events <i class="fas fa-caret-down"></i></a>
            <div class="dropdown-content">
                <div class="sub-dropdown">
                    <a href="javascript:void(0)" class="sub-dropbtn">EASDC <i class="fas fa-caret-down"></i></a>
                    <div class="sub-dropdown-content">
                        <a href="{{route('EASDC')}}">2024</a>
                        <a href="{{route('EASDC2025')}}">2025</a>
                    </div>
                </div>
                <div class="sub-dropdown">
                    <a href="javascript:void(0)" class="sub-dropbtn">TNDC <i class="fas fa-caret-down"></i></a>
                    <div class="sub-dropdown-content">
                        <a href="{{route('TNDC2025')}}">2025</a>
                        <a href="{{route('TNDC2026')}}">2026</a>
                    </div>
                </div>
                <div class="sub-dropdown">
                    <a href="javascript:void(0)" class="sub-dropbtn">ADC <i class="fas fa-caret-down"></i></a>
                    <div class="sub-dropdown-content">
                        <a href="{{route('ADC')}}">2025</a>
                    </div>
                </div>
                <div class="sub-dropdown">
                    <a href="javascript:void(0)" class="sub-dropbtn">TISDC <i class="fas fa-caret-down"></i></a>
                    <div class="sub-dropdown-content">
                        <a href="{{route('TISDC2025')}}">2025</a>
                    </div>
                </div>
            </div>
        </li>
        <li><a href="{{route('contactUs')}}">Contact Us</a></li>
    </ul>
    <!-- Social Media Links -->
    <div class="social-links">
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
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
    transition: transform 0.3s ease-in-out;
}

.header.hide {
    transform: translateY(-100%);
}

/* Logo Styles */
.logo {
    height: 250px;
}

.logo img {
    height: 100%;
    width: auto;
}

/* Navigation Styles */
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

// Header hide/show on scroll
let lastScrollTop = 0;
const header = document.getElementById('header');

window.addEventListener('scroll', function() {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollTop > lastScrollTop) {
        header.classList.remove('show');
        header.classList.add('hide');
    } else {
        header.classList.remove('hide');
        header.classList.add('show');
    }
    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
});

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