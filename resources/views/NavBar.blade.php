@php
    $sessionManager = new \App\Models\SessionManager();
    $bIsLogin = isset($sessionManager->isLoggedIn) && $sessionManager->isLoggedIn;
    $iActive = request()->query('iActive', '');
@endphp

<!-- main container start -->
<div class="main-container">
    <nav class="navbar navbar-expand-lg navbar-light bg-card-high shadow-sm px-3 px-lg-5">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#" style="font-size: 16px;">
                <span class="fw-bold text-white">{{ env('FIRST_NAME') }}</span>
                <span class="fw-bold text-white">{{ env('OTHER_NAME') }}</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item mx-2">
                        <a href="{{ url('/') }}" class="nav-link {{ $iActive == '' ? 'active' : '' }}">
                            <i class="fa fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="{{ url('searchBook') }}" class="nav-link {{ $iActive == 6 ? 'active' : '' }}">
                            <i class="fa fa-book me-1"></i>Download Books
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="{{ url('classRoom') }}" class="nav-link {{ $iActive == 6 ? 'active' : '' }}">
                            <i class="fa fa-book me-1"></i>Class Room
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="{{ url('home-video') }}" class="nav-link {{ $iActive == 6 ? 'active' : '' }}">
                        <i class="fa-solid fa-film"></i> Video Section
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="{{ url('renderBlog') }}" class="nav-link {{ $iActive == 4 ? 'active' : '' }}">
                            <i class="fa fa-blog me-1"></i>Blog
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="{{ url('MyAbout') }}" class="nav-link {{ $iActive == 2 ? 'active' : '' }}">
                            <i class="fa fa-user me-1"></i>About
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    @if ($bIsLogin)
                        <li class="nav-item mx-2">
                            <a href="{{ url('userDashboard') }}" class="nav-link {{ $iActive == 3 ? 'active' : '' }}">
                                <i class="fa-solid fa-grip-vertical me-1"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a id="logoutId" onclick="logoutSessions()" class="btnWAN btn-outline-danger btn-sm nav-link">Log Out</a>
                        </li>
                    @else
                        <li class="nav-item mx-2">
                            <a href="{{ url('loginScreen') }}" class="btnWAN btn-outline-primary btn-sm nav-link">Log in</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="{{ url('registrationForm') }}" class="btnWAN btn-primary btn-sm nav-link text-white">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
