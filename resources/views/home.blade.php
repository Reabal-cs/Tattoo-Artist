@extends('layouts.app')

@section('content')
    <style>
        /* Custom styles */
        #hero .container {
            position: relative;
            padding-top: 74px;
            text-align: center;
        }
       

        #hero h1 {
            margin: 0;
            font-size: 56px;
            font-weight: 700;
            line-height: 64px;
            color: #fff;
        }

        #hero h1 span {
            color: #ffc451;
        }

        #hero h2 {
            color: rgba(255, 255, 255, 0.9);
            margin: 10px 0 0 0;
            font-size: 24px;
        }

        .card {

            height: 170px;
            width: 230px;
            text-align: center;
            margin: auto;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        /* Tattoo font */
        @font-face {
            font-family: 'Old English Text MT';
            src: url('https://fonts.gstatic.com/s/oldenglishtextmt/v13/fgBVrNLS-V3BY2zK4G6MvO8ATWD3n60p.woff2') format('woff2');
        }

       

        /* Custom styles for tattoo-inspired design */
        #hero {
            position: relative;
            overflow: hidden;
        }

        .slider-container {
            position: relative;
        }

        .slider-item {
            width: 100%;
            height: 150vh;
            /* Adjust the height as needed */
            background-size: cover;
            background-position: center;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .slider-content {
            padding-top: 50px;
            /* Adjust as needed */
            padding-bottom: 50px;
            /* Adjust as needed */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            text-align: center;

        }


        .slider-content h1,
        .slider-content h2 {
            color: #fff;
            font-family: 'Old English Text MT', serif;
        }
    </style>

    <section id="hero">
        <div class="slider-container">
            <div class="slider-item" style="background-image: url('{{ asset('images/homecarousal/1.jpg') }}');">
                <div class="slider-content">
                    <h1>Welcome to Our Tattoo Studio<span>.</span></h1>
                    <h2>Discover Unique Tattoo Designs and Professional Services</h2>
                </div>
            </div>
            <div class="slider-item" style="background-image: url('{{ asset('images/homecarousal/2.jpeg') }}');">
                <div class="slider-content">
                    <h1>Welcome to Our Tattoo Studio<span>.</span></h1>
                    <h2>Discover Unique Tattoo Designs and Professional Services</h2>
                </div>
            </div>
            <div class="slider-item" style="background-image: url('{{ asset('images/homecarousal/3.jpg') }}');">
                <div class="slider-content">
                    <h1>Welcome to Our Tattoo Studio<span>.</span></h1>
                    <h2>Discover Unique Tattoo Designs and Professional Services</h2>
                </div>
            </div>
            <div class="slider-item" style="background-image: url('{{ asset('images/homecarousal/4.jpeg') }}');">
                <div class="slider-content">
                    <h1>Welcome to Our Tattoo Studio<span>.</span></h1>
                    <h2>Discover Unique Tattoo Designs and Professional Services</h2>
                </div>
            </div>
            <div class="slider-item" style="background-image: url('{{ asset('images/homecarousal/5.jpeg') }}');">
                <div class="slider-content">
                    <h1>Welcome to Our Tattoo Studio<span>.</span></h1>
                    <h2>Discover Unique Tattoo Designs and Professional Services</h2>
                </div>
            </div>
            <div class="slider-item" style="background-image: url('{{ asset('images/homecarousal/6.jpeg') }}');">
                <div class="slider-content">
                    <h1>Welcome to Our Tattoo Studio<span>.</span></h1>
                    <h2>Discover Unique Tattoo Designs and Professional Services</h2>
                </div>
            </div>


            <!-- Add more slider items as needed -->
        </div>
        <div class="overlay"></div>
        <div class="container">
            <div class="row gy-4 mt-5 justify-content-center">
                <div class="col-xl-4 col-md-6">
                    <label for="card">
                        <h4 style=" font-family: 'Old English Text MT', serif;"> Explore Tattoo's </h4>
                    </label>
                    <a class="card" href="{{ route('gallery') }}"
                        style="background-image: url('{{ asset('images/cards/card1.jpeg') }}');background-size: 230px; background-repeat: no-repeat; background-position: center;">

                    </a>
                </div>
                <div class="col-xl-4 col-md-6">
                    <label for="card">
                        <h4 style=" font-family: 'Old English Text MT', serif;"> Explore Piercing Services</h4>
                    </label>
                    <a class="card" href="{{ route('piercingsec') }}"style="background-image: url('{{ asset('images/cards/card2.jpeg') }}');background-size: 230px; background-repeat: no-repeat; background-position: center;">
                    </a>
                </div>
                <div class="col-xl-4 col-md-6">
                  <label for="card">
                    <h4 style=" font-family: 'Old English Text MT', serif;"> Check Our Calculator </h4>
                </label>
                 <a class="card" href="{{ route('calculator') }}" style="background-image: url('{{ asset('images/cards/card3.jpeg') }}');background-size: 230px; background-repeat: no-repeat; background-position: center;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->



    <script>
        $(document).ready(function() {
            $('.slider-container').slick({
                autoplay: true,
                autoplaySpeed: 5000,
                arrows: false,
                dots: false,
                fade: true,
                speed: 1000,
                pauseOnHover: false
            });
        });
    </script>
@endsection
