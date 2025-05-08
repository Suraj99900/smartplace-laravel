<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Freecode.fun | Portfolio, Blogs, PHP Development, and Tutorials</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/DashboardNewImage-transparent.png') }}" type="image/png">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Showcase your PHP development skills, explore insightful blogs, and discover projects on Freecode.fun — a portfolio of tech expertise, tutorials, and innovations.">
    <meta name="keywords" content="portfolio, blog, PHP developer, Laravel, web development, coding tutorials, full stack developer, backend development, software engineer, programming insights">
    <meta name="author" content="Suraj Jaiswal (freecode.fun)">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://freecode.fun/">

    <!-- Open Graph Meta Tags (Facebook, LinkedIn) -->
    <meta property="og:title" content="Freecode.fun | Portfolio & Tech Blog">
    <meta property="og:description" content="Explore my personal portfolio and blog for development tutorials, industry insights, and featured PHP projects.">
    <meta property="og:image" content="{{ asset('img/PortfolioIcon.png') }}">
    <meta property="og:url" content="https://freecode.fun/">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Freecode.fun">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Freecode.fun | Dev Portfolio & Blog">
    <meta name="twitter:description" content="Discover tutorials, insights, and development projects at Freecode.fun — a portfolio and blog for modern web developers.">
    <meta name="twitter:image" content="{{ asset('img/DashboardNewImage-transparent.png') }}">
    <meta name="twitter:site" content="@yourhandle"> <!-- Optional: Replace with your Twitter -->


    <script src="https://cdn.jsdelivr.net/npm/video.js@8.22.0/dist/video.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/video.js@8.22.0/dist/video-js.min.css" rel="stylesheet">
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/videojs-resolution-switcher/0.4.2/videojs-resolution-switcher.min.js"
        integrity="sha512-EuEgpjZ307chaYi/ZWSMqoYbBFtlxY76b8q0UX8HAMThmGNrQ43y09w5DQE9q97FWjDSx2TISsIQcz6utqolRw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/videojs-resolution-switcher/0.4.2/videojs-resolution-switcher.css"
        integrity="sha512-eNi58fWX0irIyO5I5CgiimkK92f9B0wAbAx1R4j7h2RbE7/CvoQzmIoiqFvxTPsyE2qT2SP5MWHQEAYE28eIQQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CDNS -->
    <!-- Bootstrap 5 link -->
    <link rel="stylesheet" href="{{ asset('css/cdn.jsdelivr.net_npm_bootstrap@5.3.2_dist_css_bootstrap.min.css')}}">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- DataTable CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    <!-- razorpay CDN -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>


    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{asset('css/variables1.css')}}">
    <link rel="stylesheet" href="{{asset('css/variables1.css')}}" class="alternate-style" title="color-1" disabled>
    <link rel="stylesheet" href="{{asset('css/variables2.css')}}" class="alternate-style" title="color-2" disabled>
    <link rel="stylesheet" href="{{asset('css/variables3.css')}}" class="alternate-style" title="color-3" disabled>
    <link rel="stylesheet" href="{{asset('css/variables4.css')}}" class="alternate-style" title="color-4" disabled>
    <link rel="stylesheet" href="{{asset('css/variables5.css')}}" class="alternate-style" title="color-5" disabled>
    <link rel="stylesheet" href="{{asset('css/style-switcher.css')}}">
    <link rel="stylesheet" href="{{asset('css/nav-style.css')}}">
    <title>Smartpoly</title>
</head>

<body class="dark">
<canvas id="particles"></canvas>
<input type="hidden" name="_token" id="csrfid" value="{{ csrf_token() }}" />