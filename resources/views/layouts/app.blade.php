@can('isAdmin')
    @include('layouts.adminapp')
@else
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Slick Carousel scripts -->
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    </head>
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1));

            background-image: url("{{ asset('images/background/1.jpeg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;

        }


        .navbar {
            padding: 15px;
            background: rgba(0, 0, 0, 0.3);
            font-family: 'Special Elite', cursive;
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 20px;
        }
    </style>

    <body>
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand"><img src="{{ asset('images/logo/logo.jpg') }}" width="50px" height="50px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link @if (request()->routeIs('home')) active @endif" aria-current="page"
                                href="{{ route('home') }}">Home</a>
                        </li>

                        
                        <li class="nav-item">
                            <a class="nav-link  @if (request()->routeIs('gallery')) active @endif"
                                href="{{ route('gallery') }}">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  @if (request()->routeIs('/testimonials')) active @endif"
                                href="{{ route('testimonial.index') }}">Testimonials</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  @if (request()->routeIs('reservation')) active @endif"
                                href="{{ route('reservation') }}">Reservation</a>
                        </li>
                        @auth
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="nav-link">Logout</button>
                            </form>
                            <li class="nav-item">
                            </li>
                        @endauth

                        @guest
                            <li class="nav-item">
                                <a class="nav-link @if (request()->routeIs('login')) active @endif"
                                    href="{{ route('login') }}"> login </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if (request()->routeIs('register')) active @endif"
                                    href="{{ route('register') }}"> register </a>
                            </li>
                        @endguest

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                More services
                            </a>
                            <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('calculator') }}">calculator</a></li>
                                <li><a class="dropdown-item" href="{{ route('inkbrand') }}">Ink Brand</a></li>
                                <li><a class="dropdown-item" href="{{ route('piercingsec') }}">piercing services</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  @if (request()->routeIs('about')) active @endif" aria-current="page"
                                href="{{ route('about') }}">Aboutus</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')

        </main>
        </div>


        @include('partials.footer')
    </body>

    </html>
@endcan
