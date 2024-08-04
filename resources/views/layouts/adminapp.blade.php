<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: 'Quicksand', sans-serif;
        }

        .side-navbar {
            width: 180px;
            height: 100%;
            position: fixed;
            margin-left: -300px;
            background-color: #100901;
            transition: 0.5s;
        }

        .nav-link:active,
        .nav-link:focus,
        .nav-link:hover {
            background-color: #ffffff26;
        }

        .my-container {
            transition: 0.4s;
        }

        .active-nav {
            margin-left: 0;
        }

        .active-cont {
            margin-left: 180px;
        }

        #menu-btn {
            background-color: #100901;
            color: #fff;
            margin-left: -62px;
        }

        .my-container input {
            border-radius: 2rem;
            padding: 2px 20px;
        }
    </style>
   
</head>


<body>
    <!-- Side-Nav -->
    <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
        <ul class="nav flex-column text-white w-100">
            <li class="nav-link h3 text-white my-2">
                Admin </br>Panel
            </li>
            <li class="nav-link">
                <a href="{{ route('user') }}" class="bx bx-user-check">
                    <span class="mx-2">User Accounts</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="{{ route('adminpanel.adgallery') }}" class="bx bx-conversation">
                    <span class="mx-2">Edit Gallery</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="{{ route('inkbrands.index') }}" class="bx bx-conversation">
                    <span class="mx-2">Ink Brands</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="{{ route('adtestimonial.index') }}" class="bx bx-conversation">
                    <span class="mx-2">Testimonials</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="{{ route('piercing_sec') }}" class="bx bx-conversation">
                    <span class="mx-2">Piercing</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="{{ route('reservation.index') }}" class="bx bx-conversation">
                    <span class="mx-2">Appointments</span>
                </a>
            </li>
            <li class="nav-link">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="nav-link">Logout</button>
            </form>
            <li class="nav-item">
          </li>
        </ul>
    </div>

    <!-- Main Wrapper -->
    <div class="p-1 my-container active-cont">
        <!-- Top Nav -->
        <nav class="navbar top-navbar px-5">
            <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
        </nav>

        <!-- Page Content -->
        <main class="py-4">
            @yield('adcontent')
        </main>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var menu_btn = document.querySelector("#menu-btn");
        var sidebar = document.querySelector("#sidebar");
        var container = document.querySelector(".my-container");
        menu_btn.addEventListener("click", () => {
            sidebar.classList.toggle("active-nav");
            container.classList.toggle("active-cont");
        });
    </script>
</body>

</html>
