<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!--========== ICON ==========-->
    <link rel="shortcut icon" href="{{ asset('image/logo.png') }}">

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="{{ asset('css/welcome/styles.css') }}">

    <title>AgroPartners - Inicio</title>
</head>

<body>

    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevron-up scrolltop__icon'></i>
    </a>

    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="#" class="nav__logo">AGROPARTNERS S.R.L.</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="#home" class="nav__link active-link">Inicio</a></li>
                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                            @auth
                                <li class="nav__item"><a href="{{ url('/dashboard') }}" class="nav__link">Dashboard</a></li>
                            @else
                                <li class="nav__item"><a href="{{ route('login') }}" class="button_login">Login</a></li>
                            @endauth
                        </div>
                    @endif


                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <main class="l-main">
        <!--========== HOME ==========-->
        <section class="home" id="home">
            <div class="home__container bd-container bd-grid">
                <div class="home__data">
                    <h1 class="home__title">AgroPartners</h1>
                    <h2 class="home__subtitle">Excelencia y calidad.</h2>
                    <a href="#" class="button">View Menu</a>
                </div>

                <img src="{{ asset('image/agro.jpg') }}" alt="" class="home__img">
            </div>
        </section>


    <!--========== SCROLL REVEAL ==========-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--========== MAIN JS ==========-->
    <script src="{{ asset('js/welcome/main.js') }}"></script>

</body>

</html>
