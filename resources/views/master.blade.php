<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="TANDS,TNDC,EASDC,Debates,Tanzania National Debate Society,Tanzania National Debate Championship,East Africa Schools Debate Championship,Quiz Challenge,Public Speaking,Debate Organisation in Tanzania">
    <meta name="description" content="Welcome to the Tanzania National Debate Society (TANDS). Join us in promoting debates in Tanzania and enhancing public speaking skills.">
    <meta name="google-site-verification" content="mlhw_Wlte3OQdaprBsDJYfx7QGrTp-Wekqjs3b_AJVM" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="canonical" href="@yield('canonical')"/> 
    
    @yield('head')
    

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <link rel="apple-touch-icon" sizes="180x180" href=" {{asset('/Images/favicon_io (2)/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/Images/favicon_io (2)/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href= "{{asset('/Images/favicon_io (2)/favicon-16x16.png')}}">
    <link rel="manifest" href="/site.webmanifest">


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Trebuchet MS', Arial, sans-serif;
        }


        .backgroundImage {
            width: 100%;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .section10 {
            position: relative;
            width: 100%;
            height: auto;
            
        }

        .image-container2 {
            position: relative;
            width: 100%;
            height: 50%;
            overflow: hidden;
        }

        .backgroundImage2 {
            position: relative;
            margin-top: 80px;
            width: 100%;
            min-height: 70vh;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .overlay-text {
            position: absolute;
            bottom: 25%;
            left: 35%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
        }

        .gradient-text {
            font-size: 50px;
        }


        .image-container {
            position: relative;
            width: 100%;
            height: auto;
        }



        .gradient-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(50, 51, 102, 1), rgba(50, 51, 102, 0) 50%);
            z-index: 1;
        }

        .gradient-overlay2 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(50, 51, 102, 1), rgba(50, 51, 102, 0) 50%);
            z-index: 1;
        }

        .gradient-overlay3 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(50, 51, 102, 1.5), rgba(50, 51, 102, 0) 100%);
            z-index: 1;
        }

        .fancy-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            background: linear-gradient(45deg, #323366, #03A3DE);
            transition: background 0.3s, transform 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .fancy-btn:hover {
            background: linear-gradient(45deg, #03A3DE, #323366);
            transform: translate(-50%, -3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            color: white;
        }

        .fancy-btn:active {
            transform: translate(-50%, 0);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: white;
        }

        .sidePanelNavigationLinks {
            display: none;
        }

        .social-icons img {
            width: 40px;
            height: 40px;
        }

        .hero-section {
            position: relative;
            overflow: hidden;
            height: 92vh;
            min-height: 560px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }
        .hero-slides {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }
        .slide1 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1.2s ease-in-out;
        }
        .slide1.active {
            opacity: 1;
        }
        .slide1 img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 6s ease-out;
            transform: scale(1.02);
        }
        .slide1.active img {
            transform: scale(1.12);
        }
        .hero-scrim {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(10, 12, 28, .35) 0%, rgba(10, 12, 28, .35) 40%, rgba(10, 12, 28, .88) 100%);
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 780px;
            width: 100%;
            padding: 0 24px 0 clamp(24px, 6vw, 96px);
            text-align: left;
            color: #fff;
        }
        .hero-eyebrow {
            display: block;
            font-family: 'Poppins', sans-serif;
            font-size: .8rem;
            font-weight: 600;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: #8fd1ea;
            margin-bottom: 18px;
        }
        /* Reserves space for the tallest title+description pairing so the
           CTA row below doesn't jump as slides with different text cross-fade. */
        .hero-text-slides {
            position: relative;
            min-height: 170px;
        }
        .hero-text-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            opacity: 0;
            transition: opacity 1.2s ease-in-out;
        }
        .hero-text-slide.active {
            opacity: 1;
        }
        .hero-heading {
            font-family: 'Poppins', sans-serif !important;
            font-weight: 700 !important;
            font-size: clamp(1.9rem, 4vw, 3rem) !important;
            line-height: 1.2;
            margin: 0 0 16px !important;
            color: #fff !important;
            background: none !important;
            -webkit-background-clip: unset !important;
            text-align: left;
        }
        .hero-subtitle {
            font-family: 'Poppins', sans-serif !important;
            font-size: 1.05rem !important;
            font-weight: 300;
            color: rgba(255,255,255,.82) !important;
            max-width: 100%;
            margin: 0 0 32px !important;
            line-height: 1.7;
            text-align: left;
        }
        .hero-cta {
            display: flex;
            align-items: center;
            gap: 28px;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        .btn-hero-primary {
            display: inline-block;
            padding: 13px 30px;
            font-family: 'Poppins', sans-serif;
            font-size: .92rem;
            font-weight: 600;
            border-radius: 6px;
            text-decoration: none;
            background: #03A3DE;
            color: #fff;
            transition: background .2s ease;
        }
        .btn-hero-primary:hover {
            background: #0b8ec2;
            color: #fff;
        }
        .btn-hero-ghost {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: .92rem;
            font-weight: 500;
            color: #fff;
            text-decoration: none;
            border-bottom: 1px solid rgba(255,255,255,.4);
            padding-bottom: 3px;
            transition: border-color .2s ease, opacity .2s ease;
        }
        .btn-hero-ghost:hover {
            color: #fff;
            border-color: #fff;
        }
        .hero-controls {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 30px;
            z-index: 3;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }
        .hero-arrow {
            background: none;
            border: none;
            color: rgba(255,255,255,.65);
            font-size: 1.4rem;
            line-height: 1;
            cursor: pointer;
            padding: 4px;
            transition: color .2s ease;
        }
        .hero-arrow:hover {
            color: #fff;
        }
        .hero-dots {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .hero-dots .hero-dot {
            width: 7px;
            height: 7px;
            border-radius: 4px;
            background: rgba(255,255,255,.35);
            border: none;
            cursor: pointer;
            transition: background .25s ease, width .25s ease;
            padding: 0;
        }
        .hero-dots .hero-dot.active {
            background: #fff;
            width: 22px;
        }
        .slide-text {
            text-align: center;
            max-width: 90%;
        }

        .publicSpeaking{
            margin-top: 90px;
        }

        .section2 {
            min-height: 60vh;
            width: 100%;
        }

        .section3 {
            min-height: 60vh;
        }

        .section4 {
            min-height: 60vh;
        }

        .section5 {
            min-height: 50vh;
        }

        .section6 {
            min-height: 60vh;
        }

        .gallery-row {
            display: flex;
            flex-wrap: wrap;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
            margin-left: 10px
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .card-img-overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.6);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding: 10px;
            border-radius: 10px;
        }

        .gallery-item:hover .card-img-overlay {
            opacity: 1;
        }

        .partner-logo {
            width: 200px;
            height: 200px;
            object-fit: contain;
        }

        .carousel-item {
            height: 200px;
            background-color: white;
        }

        .carousel-item img {
            max-height: 150px;
        }

        .carousel-item .col-md-9 {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: black;
        }

        .carousel-control-prev-icon::after,
        .carousel-control-next-icon::after {
            content: '';
            display: inline-block;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;charset=UTF8,%3Csvg xmlns%3D%27http%3A//www.w3.org/2000/svg%27 fill%3D%27%23FFFFFF%27 viewBox%3D%270 0 16 16%27%3E%3Cpath d%3D%27M4.854 8L9.146 3.854a.5.5 0 0 1 .708.708L5.707 8.5l4.147 4.146a.5.5 0 1 1-.708.708L4.854 8z%27/%3E%3C/svg%3E') no-repeat center center;
            background-size: 50%;
        }

        .carousel-control-next-icon::after {
            background: url('data:image/svg+xml;charset=UTF8,%3Csvg xmlns%3D%27http%3A//www.w3.org/2000/svg%27 fill%3D%27%23FFFFFF%27 viewBox%3D%270 0 16 16%27%3E%3Cpath d%3D%27M11.146 8L6.854 12.146a.5.5 0 0 1-.708-.708L10.293 8l-4.147-4.146a.5.5 0 1 1 .708-.708L11.146 8z%27/%3E%3C/svg%3E') no-repeat center center;
            background-size: 50%;
        }

        .modal-trigger {
            cursor: pointer;
            position: relative;
            z-index: 10;
        }

        img.hover-shadow {
            transition: 0.3s;
        }

        .hover-shadow:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            width: 90%;
            max-width: 1200px;
            z-index: 101;
        }

        .close {
            color: white;
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 35px;
            font-weight: bold;
            z-index: 102;
        }

        .modal-backdrop.show {
            z-index: 1040;
        }

        .modal.show {
            z-index: 1050;
        }

        .modal p {
            color: black;
        }

        .card img {
            cursor: pointer;
        }

        .image-text {
            position: absolute;
            top: 85%;
            left: 24px;
            transform: translateY(-50%);
            color: white;
            text-align: center;
            opacity: 0.7;
            padding: 10px;
            border-radius: 10px;
        }

        .image-text h4 {
            margin: 0;
            font-size: 24px;
        }



        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .card-text {
            color: #fff;
            text-align: center;
        }

        .icon-large {
            font-size: 50px;
        }
        
        h1 {
             font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-weight: bold;
            font-size: 30px;
            margin-left: 30px;
            background: linear-gradient(to right, #323366, #03A3DE);
            -webkit-background-clip: text;
        }


        h3 {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-weight: bold;
            font-size: 30px;
            background: linear-gradient(to right, #323366, #03A3DE);
            -webkit-background-clip: text;
            color: transparent;
            margin-left: 30px;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .pheader {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
            font-size: 25px;
            background: linear-gradient(to left, #fff, #323366);
            -webkit-background-clip: text;
            color: transparent;
            margin-left: 50px;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .pheader2 {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
            font-size: 25px;
            background: linear-gradient(to left, #03A3DE, #323366);
            -webkit-background-clip: text;
            color: transparent;
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .h3-visible,
        .pheader-visible,
        .pheader2-visible {
            opacity: 1;
            transform: translateY(0);
        }

        p {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 20px;
            margin-left: 30px;
        }

        .counter {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .otherImages {
            width: 100%;
            height: auto;
        }

        .learnMore {
            color: #323366;
            text-decoration: none;
        }

        .learnMore:hover {
            color: #03A3DE;
            text-decoration: none;
        }

        .individualCard:hover .card-content {
            transform: scale(1.1);
            box-shadow: 0 0 10px #323366;
        }

        .section7 {
            min-height: 50vh;
        }

        .image-container {
            position: relative;
            overflow: hidden;
        }

        .image-container {
            position: relative;
            overflow: hidden;
        }



        .overlay-text {
            text-align: center;
            margin-top: 300px;
            z-index: 1;
        }

        .gradient-text {
            display: inline;
            font-weight: bold;
            background: linear-gradient(to right, #3BAA3E, #323366, #03A3DE);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .image-container2 {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .gradient-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 100%);
        }

        .text-overlay {
            position: absolute;
            bottom: 35%;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 50%;
            padding: 20px;
            box-sizing: border-box;
            color: white;
            z-index: 1;
        }

        .text-overlay h3 {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-weight: bold;
            font-size: 30px;
            margin: 0;
            color: white;
        }

        .text-overlay p {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 20px;
            margin: 10px 0 0 0;
            /* Adjust margin as needed */
            color: white;
        }


        .container-fluid {
            padding: 0;
        }

        .section8 {
            width: 100%;
            background: #323366;
            padding: 72px 0 56px;
            color: #fff;
            overflow: hidden;
            box-sizing: border-box;
        }

        .section8 .row {
            align-items: flex-start;
        }

        .section8 .container h3 {
            text-align: left !important;
            margin: 0 0 22px !important;
        }

        .section8 .container h3::after {
            margin: 14px 0 0 !important;
        }

        .section8 form {
            width: 100%;
            margin-left: 0;
        }

        .footer-label {
            color: rgba(255, 255, 255, .82) !important;
            font-size: .88rem;
            margin-bottom: 6px;
        }

        .footer-input {
            background: rgba(255, 255, 255, .06) !important;
            border: 1px solid rgba(255, 255, 255, .18) !important;
            color: #fff !important;
            border-radius: 6px !important;
        }

        .footer-input::placeholder {
            color: rgba(255, 255, 255, .45);
        }

        .footer-input:focus {
            background: rgba(255, 255, 255, .1) !important;
            border-color: #03A3DE !important;
            box-shadow: 0 0 0 .2rem rgba(3, 163, 222, .25) !important;
            color: #fff !important;
        }

        .footer-help {
            color: rgba(255, 255, 255, .5) !important;
            font-size: .8rem;
        }

        .footer-submit-btn {
            background: #03A3DE;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px 24px;
            font-weight: 500;
            transition: background .2s ease;
        }

        .footer-submit-btn:hover {
            background: #0b8ec2;
            color: #fff;
        }

        .footer-submit-btn i {
            margin-right: 8px;
        }

        .footer-notify {
            display: block;
            margin-top: 10px;
            color: #8fd1ea;
            font-size: .9rem;
        }

        .usefulLinks {
            color: #fff;
            text-align: left;
        }

        .footerLinks {
            display: flex;
            flex-direction: column;
        }

        .footerLinks a {
            text-align: left;
            padding: 6px 0;
            text-decoration: none;
            font-size: 15px;
            color: rgba(255, 255, 255, .82);
            display: block;
            transition: color 0.2s ease;
        }

        .footerLinks a:hover {
            color: #6cc9ea;
        }

        .footer-brand {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 1.6rem;
            color: #fff;
            letter-spacing: .04em;
            margin-bottom: 14px;
        }

        .footer-tagline {
            color: rgba(255, 255, 255, .72);
            font-size: .92rem;
            line-height: 1.7;
            margin-bottom: 22px;
            max-width: 260px;
        }

        .footer-contact-list {
            list-style: none;
            margin: 0;
            padding: 0;
            color: rgba(255, 255, 255, .82);
            font-size: 15px;
        }

        .footer-contact-list li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 16px;
            line-height: 1.6;
        }

        .footer-contact-list i {
            color: #6cc9ea;
            width: 16px;
            margin-top: 4px;
            flex-shrink: 0;
        }

        .footer-contact-list a {
            color: rgba(255, 255, 255, .82);
            text-decoration: none;
            transition: color .2s ease;
        }

        .footer-contact-list a:hover {
            color: #6cc9ea;
        }

        .footer-social {
            display: flex;
            gap: 14px;
            margin-top: 4px;
        }

        .footer-social a {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, .25);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            transition: background .2s ease, border-color .2s ease;
        }

        .footer-social a:hover {
            background: #03A3DE;
            border-color: #03A3DE;
        }

        .footer-copyright {
            width: 100%;
            background: #2a2c52;
            padding: 18px 0;
        }

        .footer-copyright p {
            text-align: center;
            font-size: 14px;
            color: rgba(255, 255, 255, .6);
            margin: 0;
        }

        .footer-copyright a {
            color: rgba(255, 255, 255, .8);
            text-decoration: none;
            transition: color .2s ease;
        }

        .footer-copyright a:hover {
            color: #6cc9ea;
            text-decoration: underline;
        }



        .testimonials-section {
            background: #f8fafc;
            padding: 70px 0;
        }

        .testimonial-carousel {
            position: relative;
            max-width: 720px;
            margin: 36px auto 0;
        }

        .testimonial-card {
            background: #fff;
            border: 1px solid #edf0f4;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, .06);
            padding: 48px 56px;
            text-align: center;
        }

        .testimonial-quote-icon {
            color: #03A3DE;
            opacity: .18;
            font-size: 2.6rem;
        }

        .mySlides {
            display: none;
        }

        .testimonial-message {
            font-size: 1.15rem;
            font-style: italic;
            line-height: 1.7;
            color: #24263b;
            margin: 14px 0 24px;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .testimonial-avatar {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #323366;
            color: #fff;
            font-weight: 700;
            font-size: .9rem;
            flex-shrink: 0;
        }

        .testimonial-name {
            font-weight: 600;
            color: #24263b;
        }

        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border: 1px solid #edf0f4;
            border-radius: 50%;
            color: #24263b;
            font-weight: bold;
            font-size: 18px;
            box-shadow: 0 2px 8px rgba(15, 23, 42, .08);
            user-select: none;
            transition: background .2s ease, color .2s ease;
        }

        .prev {
            left: -22px;
        }

        .next {
            right: -22px;
        }

        .prev:hover,
        .next:hover {
            background-color: #24263b;
            color: #fff;
        }

        @media (max-width: 768px) {
            .testimonial-card {
                padding: 36px 24px;
            }

            .prev {
                left: 4px;
            }

            .next {
                right: 4px;
            }
        }

        .dot-container {
            text-align: center;
            padding: 20px 0 0;
        }

        .dot {
            cursor: pointer;
            height: 10px;
            width: 10px;
            margin: 0 4px;
            background-color: #cbd5e1;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .dot.active,
        .dot:hover {
            background-color: #03A3DE;
            transform: scale(1.2);
        }

        q {
            font-style: italic;
        }


        .overlay-text {
            font-size: 50px;
        }

        .section11 {
            width: 100%;
            padding: 20px 0;
            color: white;
            overflow: hidden;
            box-sizing: border-box;
        }

        .section11 .gradient {
            background: linear-gradient(to left, #03A3DE, #323366);
            padding: 10px 10px 10px 10px;
            margin: 5px 5px 5px 5px;
        }

        .section11 {
            min-height: 100vh;
        }

        .fancybox-image {
            filter: contrast(140%);
        }




        @media (max-width: 578px) {
            body {
                font-family: 'Nunito', sans-serif;
                margin: 0;
                padding: 0;
                width: 100%;
                overflow-x: hidden;

            }

            * {
                box-sizing: border-box;
                overflow-x: hidden;
            }

            .navigation {
                display: none;
            }

            .sidePanelNavigationLinks {
                display: block;
            }

            .sidePanelNavigationLinks a {
                font-size: 15px;
            }

            .backgroundImage {
                width: 100%;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .image-container {
                position: relative;
                overflow: hidden;
                margin-top: 200px;
                width: 100%;
            }

            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px;
                background-color: #fff;
                border-bottom: 1px solid #dee2e6;
                width: 100%;
                height: 110px;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1000;
                transition: transform 0.6s ease, opacity 0.6s ease;
            }

            .header.hide {
                transform: translateY(-100%);
                opacity: 0;
            }

            .header.show {
                transform: translateY(0);
                opacity: 1;
            }
            .hero-section {
                height: 78vh;
                min-height: 460px;
                margin-top: 0;
            }

            .hero-content {
                padding: 0 22px;
                text-align: center;
            }

            .hero-heading, .hero-subtitle {
                text-align: center;
            }

            .hero-text-slides {
                min-height: 210px;
            }

            .hero-cta {
                justify-content: center;
            }

            .hero-eyebrow {
                font-size: .68rem;
                margin-bottom: 16px;
            }

            .hero-subtitle {
                margin: 0 auto 26px !important;
            }

            .hero-controls {
                bottom: 18px;
                gap: 14px;
            }

            .hero-arrow {
                font-size: 1.2rem;
            }

.publicSpeaking{
            margin-top: 40px;
        }


            .section2 {
                min-height: 60vh;
                width: 100%;
            }

            .section2 .image-text {
                margin-left: 10px;
            }

            .section5 {
                min-height: 50vh;
            }

            .fancy-btn {
                display: none;

            }



            .text-overlay {
                position: absolute;
                top: 5%;
                left: 50%;
                transform: translateX(-50%);
                text-align: center;
                width: 100%;
                padding: 20px;
                box-sizing: border-box;
                color: white;
                z-index: 1;
            }

            .text-overlay h3 {
                font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                font-weight: bold;
                font-size: 30px;
                margin: 0;
                color: white;
            }

            .text-overlay p {
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                font-size: 20px;
                margin: 10px 0 0 0;
                color: white;
            }

            .section7 {
                margin-top: -250px;
                width: 100%;
            }

            .section8 {
                width: 100%;
                padding: 48px 0 32px;
                color: white;
                overflow: hidden;
                box-sizing: border-box;
            }

            .usefulLinks {
                text-align: left;
                color: white;
                margin-top: 10px;
            }

            .footerLinks a {
                margin-left: 0;
            }

            .partner-logo {
                width: 150px;
                height: 150px;
                object-fit: contain;
            }

            .individual {
                margin-left: 30%;
            }

            .carousel-item {
                height: 400px;
                background-color: white;
            }

            .carousel-item img {
                max-height: 150px;
            }

            .carousel-item .col-md-9 {
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .carousel-control-prev-icon,
            .carousel-control-next-icon {
                background-color: black;
            }

            .carousel-control-prev-icon::after,
            .carousel-control-next-icon::after {
                content: '';
                display: inline-block;
                width: 100%;
                height: 100%;
                background: url('data:image/svg+xml;charset=UTF8,%3Csvg xmlns%3D%27http%3A//www.w3.org/2000/svg%27 fill%3D%27%23FFFFFF%27 viewBox%3D%270 0 16 16%27%3E%3Cpath d%3D%27M4.854 8L9.146 3.854a.5.5 0 0 1 .708.708L5.707 8.5l4.147 4.146a.5.5 0 1 1-.708.708L4.854 8z%27/%3E%3C/svg%3E') no-repeat center center;
                background-size: 50%;
            }

            .carousel-control-next-icon::after {
                background: url('data:image/svg+xml;charset=UTF8,%3Csvg xmlns%3D%27http%3A//www.w3.org/2000/svg%27 fill%3D%27%23FFFFFF%27 viewBox%3D%270 0 16 16%27%3E%3Cpath d%3D%27M11.146 8L6.854 12.146a.5.5 0 0 1-.708-.708L10.293 8l-4.147-4.146a.5.5 0 1 1 .708-.708L11.146 8z%27/%3E%3C/svg%3E') no-repeat center center;
                background-size: 50%;
            }

            h3 {
                font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                font-weight: bold;
                font-size: 20px;
                background: linear-gradient(to right, #323366, #03A3DE);
                -webkit-background-clip: text;
                color: transparent;
                margin-left: 30px;
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 1s ease-out, transform 1s ease-out;
            }
                h1 {
             font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-weight: bold;
            font-size: 30px;
            margin-left: 30px;
            background: linear-gradient(to right, #323366, #03A3DE);
            -webkit-background-clip: text;
        }

            .pheader {
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                font-weight: bold;
                font-size: 18px;
                background: linear-gradient(to left, #fff, #323366);
                -webkit-background-clip: text;
                color: transparent;
                margin-left: 50px;
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 1s ease-out, transform 1s ease-out;
            }

            .pheader2 {
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                font-weight: bold;
                font-size: 18px;
                background: linear-gradient(to left, #03A3DE, #323366);
                -webkit-background-clip: text;
                color: transparent;
                text-align: center;
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 1s ease-out, transform 1s ease-out;
            }

            .h3-visible,
            .pheader-visible,
            .pheader2-visible {
                opacity: 1;
                transform: translateY(0);
            }

            p {
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                font-size: 15px;
                margin-left: 30px;
            }

            .text-overlay {
                position: absolute;
                bottom: 35%;
                left: 50%;
                transform: translateX(-50%);
                text-align: center;
                width: 90%;
                padding: 20px;
                box-sizing: border-box;
                color: white;
                z-index: 1;
            }

            .text-overlay h3 {
                font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                font-weight: bold;
                font-size: 18px;
                margin: 0;
                color: white;
            }

            .text-overlay p {
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                font-size: 15px;
                margin: 10px 0 0 0;
                color: white;
            }

            .section11 {
                min-height: 50vh;
                background: linear-gradient(to bottom #dee2e6, #007bff, #323366)
            }

            .gradient-overlay3 {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(to right, rgba(50, 51, 102, 1.5), rgba(50, 51, 102, 0) 100%);
                z-index: 1;
            }

            .backgroundImage2 {
                position: relative;
                margin-top: 80px;
                width: 100%;
                min-height: 35vh;
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }
            .overlay-text {
                bottom: 0;
            }

            .overlay-text h2 {
                font-size: 30px;
            }
             .otherImages {
            width: 100%;
            height: 50%;
        }




        }

        /* ==========================================================
           Design pass: Poppins, restrained editorial section headers,
           bordered cards, solid buttons. Brand colors used deliberately
           (navy #323366, blue #03A3DE, green #3BAA3E as a rare accent)
           rather than blanket gradients.
           ========================================================== */
        body, h1, h2, h3, h4, h5, h6, p, a, span, li, label, button,
        input, textarea, select, .navigation, .pheader, .pheader2,
        .text-overlay h3, .text-overlay p {
            font-family: 'Poppins', sans-serif !important;
        }

        h3 {
            text-align: center !important;
            margin: 0 auto !important;
            font-weight: 700 !important;
            font-size: clamp(1.5rem, 4.5vw, 2rem) !important;
            color: #24263b !important;
            background: none !important;
            -webkit-background-clip: unset !important;
            letter-spacing: -.01em;
        }

        h3::after {
            content: '';
            display: block;
            width: 52px;
            height: 3px;
            background: #03A3DE;
            margin: 16px auto 0;
            border-radius: 2px;
        }

        /* .pheader: muted tagline under a section h3 (e.g. "We invest
           in meaningful programs"). .pheader2: a card's own title
           (stat label, program name, team member name) - it needs to
           read as a heading, not a caption, so it stays dark and firm. */
        .pheader {
            text-align: center !important;
            margin: 8px auto 0 !important;
            font-weight: 400 !important;
            font-size: 1rem !important;
            color: #6b7280 !important;
            background: none !important;
            -webkit-background-clip: unset !important;
        }

        .pheader2 {
            text-align: center !important;
            margin: 14px auto 4px !important;
            font-weight: 600 !important;
            font-size: 1.05rem !important;
            color: #24263b !important;
            background: none !important;
            -webkit-background-clip: unset !important;
        }

        h1 {
            text-align: center !important;
            margin: 0 auto !important;
            font-weight: 700 !important;
            font-size: clamp(1.7rem, 5vw, 2.3rem) !important;
            color: #24263b !important;
            background: none !important;
            -webkit-background-clip: unset !important;
            letter-spacing: -.01em;
        }

        /* Modal titles are dialog headers, not section titles -
           keep them plain and left-aligned next to the close button. */
        .modal-title {
            text-align: left !important;
            margin: 0 !important;
            font-size: 1.3rem !important;
        }

        .modal-title::after {
            display: none;
        }

        /* Headings placed over a dark photo (Subscribe band) or the
           dark footer need to stay white, not the default navy color. */
        .text-overlay h3, .text-overlay .pheader, .text-overlay p,
        .section8 h3 {
            color: #fff !important;
        }

        .text-overlay h3::after, .section8 h3::after {
            background: #6cc9ea;
        }

        .stat-badge-overlay {
            display: inline-block;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 2.4rem;
            line-height: 1.1;
            color: #fff;
        }

        .text-overlay h3::after {
            background: #6cc9ea;
        }

        /* Cards: quiet borders instead of heavy floating shadows */
        .card {
            border: 1px solid #edf0f4 !important;
            border-radius: 10px !important;
            box-shadow: 0 1px 2px rgba(15, 23, 42, .04);
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .card:hover {
            border-color: #d8e3ec !important;
            box-shadow: 0 4px 14px rgba(15, 23, 42, .06);
        }

        .individualCard:hover .card-content {
            transform: none;
            box-shadow: none;
        }

        /* Buttons: solid brand navy, modest radius, no gradients */
        .btn-primary {
            background: #24263b !important;
            border: 1px solid #24263b !important;
            border-radius: 6px !important;
            padding: 10px 24px !important;
            font-weight: 500 !important;
            box-shadow: none !important;
            transition: background .2s ease, border-color .2s ease;
        }

        .btn-primary:hover {
            background: #03A3DE !important;
            border-color: #03A3DE !important;
        }

        .gallery-item img, .partner-logo, .backgroundImage2 {
            border-radius: 6px;
        }
    </style>
</head>

<body class="antialiased">
    @include('FrontEnd.includes.header')

    @yield('content')

    @include('FrontEnd.includes.footer')


    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/669bb6ac32dca6db2cb2a495/1i3843653';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var image = document.getElementById('backgroundImage');
            var text = document.getElementById('animatedText');
    
            image.addEventListener('load', function() {
                text.classList.add('show');
            });
        });
    </script>
     <script>
        document.addEventListener('DOMContentLoaded', () => {
            const startCounter = (counterElement, targetNumber, suffix) => {
                let currentNumber = 0;
                if (targetNumber <= 0) {
                    counterElement.textContent = `${targetNumber}${suffix}`;
                    return;
                }
                const increment = () => {
                    if (currentNumber < targetNumber) {
                        currentNumber++;
                        counterElement.textContent = `${currentNumber}${suffix}`;
                    } else {
                        clearInterval(counterInterval);
                    }
                };
                const counterInterval = setInterval(increment, 2000 / targetNumber);
            };

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counterElement = entry.target;
                        const targetNumber = parseInt(counterElement.dataset.target || '0', 10);
                        const suffix = counterElement.dataset.suffix || '+';
                        startCounter(counterElement, targetNumber, suffix);
                        observer.unobserve(counterElement);
                    }
                });
            });

            document.querySelectorAll('.counter[data-target]').forEach(counterElement => {
                observer.observe(counterElement);
            });
        });
    </script>
    
    
    
    <script>
        $(document).ready(function() {
            $("[data-fancybox]").fancybox({
                buttons: [
                    "slideShow",
                    "fullScreen",
                    "thumbs",
                    "close"
                ],
                thumbs: {
                    autoStart: true
                }
            });
        });
    </script>
    
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            const form = document.getElementById('subscribe');
            const msg = document.getElementById('msg');

            if (!form) return;

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                msg.innerHTML = "Processing...";
                fetch('{{ route('subscribe.store') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                        },
                        body: new FormData(form)
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Request failed');
                        return response.json();
                    })
                    .then(data => {
                        msg.innerHTML = "Success! You subscribed successfully.";
                        form.reset();
                    })
                    .catch(error => {
                        msg.innerHTML = "Error! Please try again.";
                        console.error('Error!', error.message);
                    });
            });
        });
    </script>

    <script>
        // Shared handler for every .contact-form on the page (contact page + footer).
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            document.querySelectorAll('.contact-form').forEach(function(form) {
                const notify = form.parentElement.querySelector('.contact-form-notify');

                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    if (notify) notify.innerHTML = "Processing...";

                    const formData = new FormData(form);
                    formData.append('source', form.dataset.source || 'contact_page');

                    fetch('{{ route('contact.store') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                            },
                            body: formData
                        })
                        .then(response => {
                            if (!response.ok) throw new Error('Request failed');
                            return response.json();
                        })
                        .then(data => {
                            if (notify) notify.innerHTML = "Success! Your message was received.";
                            form.reset();
                        })
                        .catch(error => {
                            if (notify) notify.innerHTML = "Error! Please try again.";
                            console.error('Error!', error.message);
                        });
                });
            });
        });
    </script>

    <script>
        // Event registration forms: same pattern as .contact-form, but each
        // form posts to its own event-specific action URL.
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            document.querySelectorAll('.event-register-form').forEach(function(form) {
                const notify = form.querySelector('.register-form-notify');

                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    if (notify) notify.innerHTML = "Processing...";

                    fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                            },
                            body: new FormData(form)
                        })
                        .then(response => {
                            if (!response.ok) throw new Error('Request failed');
                            return response.json();
                        })
                        .then(data => {
                            if (notify) notify.innerHTML = "Success! Your registration was received.";
                            form.reset();
                        })
                        .catch(error => {
                            if (notify) notify.innerHTML = "Error! Please try again.";
                            console.error('Error!', error.message);
                        });
                });
            });
        });
    </script>



    <script>
        var slideIndex = 1;
        showSlides(slideIndex);
    
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
    
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
    
        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let slides = document.querySelectorAll('.slide1');
            if (!slides.length) return;

            const textSlides = document.querySelectorAll('.hero-text-slide');
            const dotsContainer = document.querySelector('.hero-dots');
            const prevBtn = document.querySelector('.hero-arrow-prev');
            const nextBtn = document.querySelector('.hero-arrow-next');

            let currentIndex = 0;
            let autoplayTimer = null;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.toggle('active', i === index);
                });
                textSlides.forEach((slide, i) => {
                    slide.classList.toggle('active', i === index);
                });
                if (dotsContainer) {
                    dotsContainer.querySelectorAll('.hero-dot').forEach((dot, i) => {
                        dot.classList.toggle('active', i === index);
                    });
                }
                currentIndex = index;
            }

            function nextSlide() {
                showSlide((currentIndex + 1) % slides.length);
            }

            function prevSlide() {
                showSlide((currentIndex - 1 + slides.length) % slides.length);
            }

            function restartAutoplay() {
                clearInterval(autoplayTimer);
                autoplayTimer = setInterval(nextSlide, 6000);
            }

            if (dotsContainer) {
                slides.forEach((_, i) => {
                    const dot = document.createElement('button');
                    dot.type = 'button';
                    dot.className = 'hero-dot' + (i === 0 ? ' active' : '');
                    dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
                    dot.addEventListener('click', function() {
                        showSlide(i);
                        restartAutoplay();
                    });
                    dotsContainer.appendChild(dot);
                });
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', function() {
                    prevSlide();
                    restartAutoplay();
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', function() {
                    nextSlide();
                    restartAutoplay();
                });
            }

            showSlide(0);
            restartAutoplay();
        });
    </script>
        
        

    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const h3Elements = document.querySelectorAll('h3');
            const pheaderElements = document.querySelectorAll('.pheader');
            const pheader2Elements = document.querySelectorAll('.pheader2');
    
            const observerOptions = {
                threshold: 0.1
            };
    
            const observerCallback = (entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        if (entry.target.tagName === 'H3') {
                            entry.target.classList.add('h3-visible');
                        } else if (entry.target.classList.contains('pheader')) {
                            entry.target.classList.add('pheader-visible');
                        } else if (entry.target.classList.contains('pheader2')) {
                            entry.target.classList.add('pheader2-visible');
                        }
                        observer.unobserve(entry.target);
                    }
                });
            };
    
            const observer = new IntersectionObserver(observerCallback, observerOptions);
    
            h3Elements.forEach(el => {
                observer.observe(el);
            });
    
            pheaderElements.forEach(el => {
                observer.observe(el);
            });
    
            pheader2Elements.forEach(el => {
                observer.observe(el);
            });
        });
    </script>
      <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "Tanzania National Debate Society (TANDS)",
      "url": "https://www.tands.or.tz",
      "logo": "https://www.example.com/Logo/TANDS LOGO",
      "description": "Promoting debates and public speaking skills in Tanzania.",
      "sameAs": [
        "https://www.facebook.com/TANDS",
        "https://www.twitter.com/TANDS"
      ]
    }
    </script>

    

    </body>
    
    </html>



