<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="TANDS,TNDC,EASDC,Debates,Tanzania National Debate Society,Tanzania National Debate Championship,East Africa Schools Debate Championship,Quiz Challenge,Public Speaking,Debate Organisation in Tanzania">
    <meta name="description" content="Welcome to the Tanzania National Debate Society (TANDS). Join us in promoting debates in Tanzania and enhancing public speaking skills.">
    <meta name="google-site-verification" content="mlhw_Wlte3OQdaprBsDJYfx7QGrTp-Wekqjs3b_AJVM" />
    
    <title>@yield('title')</title>
    <link rel="canonical" href="@yield('canonical')"/> 
    
    @yield('head')
    

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Fonts -->
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

        .section1 {
            position: relative;
            overflow: hidden;
            height: 100vh;
        }
        .image-slide1 {
            position: relative;
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
            transition: opacity 1s ease-in-out;
        }
        .slide1.active {
            opacity: 1;
        }
        .slide1 img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 1s ease-in-out;
        }
        .slide1.active img {
            transform: scale(1.1);
        }
       
        .slide-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 30%;
            background: linear-gradient(to top, rgba(50, 51, 102, 1.5), rgba(50, 51, 102, 0) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            box-sizing: border-box;
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
            left: 10%;
            transform: translate(-50%, -50%);
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
            background: linear-gradient(to left, #03A3DE, #323366);
            padding: 20px 0;
            color: white;
            overflow: hidden;
            box-sizing: border-box;
        }

        .section8 form {
            width: 90%;
            margin-left: 5%;
        }

        .usefulLinks {
            color: white;
            text-align: center;
        }

        .footerLinks a {
            text-align: center;
            padding: 8px 32px 8px 8px;
            text-decoration: none;
            font-size: 15px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .footerLinks a:hover {
            text-align: center;
            padding: 8px 32px 8px 8px;
            text-decoration: none;
            font-size: 15px;
            color: #323366;
            display: block;
            transition: 0.3s;
        }



        .slideshow-container {
            position: relative;
            background: #f1f1f1f1;
        }

        .mySlides {
            display: none;
            text-align: center;
            text-decoration: none;
        }

        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -30px;
            padding: 16px;
            color: #888;
            font-weight: bold;
            font-size: 20px;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        .next {
            position: absolute;
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
        }

        .dot-container {
            text-align: center;
            padding: 20px;
            background: #ddd;
        }

        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active,
        .dot:hover {
            background-color: #717171;
        }

        q {
            font-style: italic;
        }

        .author {
            color: cornflowerblue;
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
        .imageryText {
            font-size: 50px; 
            margin: 0;
            font-weight: bold;
        }
        .imageryDescription {
            font-size: 1em; 
            margin-top: 10px;
            margin-left: 30px;
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
            .section1 {
    position: relative;
    overflow: hidden;
    height: 40vh; /* Adjust based on your design */
    margin-top: 50px;
}

.gradient-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
    z-index: 1;
}

.image-slide1 {
    position: relative;
    width: 100%;
    height: 100%;
    z-index: 0;
}

.slide1 {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

.slide1 img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 1s ease-in-out;
}

.slide1.active {
    opacity: 1;
}

.slide1.active img {
    transform: scale(1.1);
}

.slide-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 30%;
            background: linear-gradient(to top, rgba(50, 51, 102, 1.5), rgba(50, 51, 102, 0) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            box-sizing: border-box;
        }
        .slide-text {
            text-align: center;
            max-width: 90%;
        }
        .imageryText {
            font-size: 20px; /* Adjust size as needed */
            margin: 0;
            font-weight: bold;
        }
        .imageryDescription {
            font-size: 1em; /* Adjust size as needed */
            margin-top: 10px;
            margin-left: 30px;
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
                padding: 20px 0;
                color: white;
                overflow: hidden;
                box-sizing: border-box;
            }


            .section8 form {
                width: 90%;
                margin-left: 5%;
            }



            .usefulLinks {
                text-align: left;
                color: white;
                margin-top: 10px
            }

            .footerLinks a {
                text-align: left;
                padding: 8px 32px 8px 8px;
                text-decoration: none;
                font-size: 15px;
                color: white;
                display: block;
                transition: 0.3s;
                margin-left: 50px;
            }

            .footerLinks a:hover {
                text-align: left;
                padding: 8px 32px 8px 8px;
                text-decoration: none;
                font-size: 15px;
                color: #323366;
                display: block;
                transition: 0.3s;
                margin-left: 50px;
            }

            .weAreSocial {
                display: none;
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
    </style>
</head>

<body class="antialiased">
    @include('FrontEnd.includes.header')

    @yield('content')
    @include('FrontEnd.includes.bottomNavigation')

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
            const counters = [{
                    id: 'partner-schools',
                    targetNumber: 21
                },
                {
                    id: 'students-impacted',
                    targetNumber: 1800
                },
                {
                    id: 'alumni',
                    targetNumber: 1500
                }
            ];
    
            const startCounter = (counterElement, targetNumber) => {
                let currentNumber = 0;
                const increment = () => {
                    if (currentNumber < targetNumber) {
                        currentNumber++;
                        counterElement.textContent = `${currentNumber}+`;
                    } else {
                        clearInterval(counterInterval);
                    }
                };
                const counterInterval = setInterval(increment, 2000 /
                    targetNumber); // Adjust the speed as needed
            };
    
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counterElement = entry.target;
                        const counterData = counters.find(c => c.id === counterElement.id);
                        if (counterData) {
                            startCounter(counterElement, counterData.targetNumber);
                            observer.unobserve(
                                counterElement); // Stop observing after the counter starts
                        }
                    }
                });
            });
    
            counters.forEach(counter => {
                const counterElement = document.getElementById(counter.id);
                if (counterElement) {
                    observer.observe(counterElement);
                }
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
            const scriptURL =
                'https://script.google.com/macros/s/AKfycbxib7tdd2sHDSycQFjFjRzohOcHU0Ao9dmJIghkbcJD4l-Z0rgcD9PVAcb3DB8XY_6b4w/exec';
            const form = document.getElementById('subscribe');
            const msg = document.getElementById('msg');
    
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                msg.innerHTML = "Processing...";
                fetch(scriptURL, {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(response => {
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

            let currentIndex = 0;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.remove('active');
                    if (i === index) {
                        slide.classList.add('active');
                    }
                });
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                showSlide(currentIndex);
            }

            // Show the first slide initially
            showSlide(currentIndex);

            // Set interval for automatic slide transition
            setInterval(nextSlide, 5000); // Adjust the interval as needed
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



