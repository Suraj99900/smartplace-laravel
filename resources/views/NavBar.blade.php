@php
    $sessionManager = new \App\Models\SessionManager();
    if(isset($sessionManager->isLoggedIn)){
        $bIsLogin = $sessionManager->isLoggedIn ? $sessionManager->isLoggedIn : false;
    }else{
        $bIsLogin = false;
    }
    $iActive = request()->query('iActive', ''); // Get the 'iActive' parameter from the URL
@endphp

<!-- main container start -->
<div class="main-container">
    <nav class="navbar bg-card-high navbar-expand-lg navbar-light px-lg-5">
        <div class="container-fluid bg-card-high" style="display: block;">
            <div class="row" style="padding: 0px;margin: 0;">
                <div class="col-md-6">
                    <div class="logo">
                        <a href="#" style="font-size: 14px;" class="navbar-brand">
                            <span>
                                {{ env('FIRST_NAME') }}
                            </span>
                            <span style="color: #c5c6c7;">
                                {{ env('OTHER_NAME') }}
                            </span>
                        </a>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                        style="position: relative;width: 10%;top: -42px;left: 88%;">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-md-6">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item mx-3">
                                <a href="{{ url('/') }}"
                                   class="nav-link bar-link {{ $iActive == '' ? 'active' : '' }}">
                                    <i class="fa fa-home mx-2"></i>Home
                                </a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="{{ url('searchBook') }}"
                                   class="nav-link bar-link {{ $iActive == 6 ? 'active' : '' }}">
                                    <i class="fa fa-book mx-2"></i>Download Books
                                </a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="{{ url('classRoom') }}"
                                   class="nav-link bar-link {{ $iActive == 6 ? 'active' : '' }}">
                                    <i class="fa fa-book mx-2"></i>Class Room
                                </a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="{{ url('renderBlog') }}"
                                   class="nav-link bar-link {{ $iActive == 4 ? 'active' : '' }}">
                                    <i class="fa fa-blog mx-2"></i>Blog
                                </a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="{{ url('MyAbout') }}"
                                   class="nav-link bar-link {{ $iActive == 2 ? 'active' : '' }}">
                                    <i class="fa fa-user mx-2"></i>About
                                </a>
                            </li>

                            @if ($bIsLogin)
                                <li class="nav-item mx-3">
                                    <a href="{{ url('userDashboard') }}"
                                       class="nav-link bar-link {{ $iActive == 3 ? 'active' : '' }}">
                                        <i class="fa-solid fa-grip-vertical mx-2"></i>Dashboard
                                    </a>
                                </li>
                                <li class="nav-item mx-3">
                                    <a id="logoutId" onclick="logoutSessions()" class="btnWAN btn-sm nav-link mx-3">Log Out</a>
                                </li>
                            @else
                                <li class="nav-item mx-3">
                                    <a href="{{ url('loginScreen') }}" class="btnWAN btn-sm nav-link login">Log in</a>
                                </li>
                                <li class="col">
                                    <a href="{{ url('registrationForm') }}"
                                       class="btnWAN nav-link register mx-3 mt-1">Register</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
