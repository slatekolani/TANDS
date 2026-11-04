<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="TANDS,TNDC,EASDC,Debates,Tanzania National Debate Society,Tanzania National Debate Championship,East Africa Schools Debate Championship,Quiz Challenge,Public Speaking,Debate Organisation in Tanzania">
    @hasSection('description')
        <meta name="description" content="@yield('description')">
    @else
        <meta name="description" content="Welcome to the Tanzania National Debate Society (TANDS). Join us in promoting debates in Tanzania and enhancing public speaking skills.">
    @endif
    <meta name="google-site-verification" content="mlhw_Wlte3OQdaprBsDJYfx7QGrTp-Wekqjs3b_AJVM" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#1b1464">

    <title>@yield('title')</title>
    <link rel="canonical" href="@yield('canonical')" />

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/Images/favicon_io (2)/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/Images/favicon_io (2)/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/Images/favicon_io (2)/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wdth,wght@100..125,600..900&family=Public+Sans:ital,wght@0,400..700;1,400..600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ asset('css/tands.css') }}?v={{ @filemtime(public_path('css/tands.css')) ?: '1' }}">

    @yield('head')
</head>

<body>
    <a class="visually-hidden skip-link" href="#main">Skip to content</a>

    @include('FrontEnd.includes.header')

    <main id="main">
        @yield('content')
    </main>

    @include('FrontEnd.includes.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="{{ asset('js/tands.js') }}?v={{ @filemtime(public_path('js/tands.js')) ?: '1' }}"></script>


    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Tanzania National Debate Society (TANDS)",
        "url": "https://www.tands.or.tz",
        "logo": "{{ asset('Logo/tands-logo-color.png') }}",
        "description": "Promoting debates and public speaking skills in Tanzania.",
        "email": "info@tands.or.tz"
    }
    </script>
</body>

</html>
