@extends('layouts.app')

@section('content')
    <style>
        .card {
            background: rgba(58, 57, 57, 0.3);
            margin-bottom: 20px;
            border: none;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .card-img-top {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            height: 200px;
            object-fit: cover;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 15px;
        }

        .card-text {
            font-size: 1.1rem;
            color: white;
        }

        .card-footer {
            background-color: transparent;
            border-top: none;
        }

        /* Style for the modal */
        .modal-img {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: auto;
            justify-content: center;
            align-items: center;
        }

        .modal-img-content {
            background: rgb(26, 25, 25);
            padding: 20px;
            border-radius: 15px;
            max-width: 80%;
            text-align: center;
            position: relative;
        }

        .modal-img img {
            max-width: 100%;
            max-height: 300px;
            margin-bottom: 20px;
            border-radius: 15px;
        }

        .modal-title {
            font-size: 2rem;
            margin-bottom: 10px;
            color: white;
        }

        .modal-description {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: white;
        }

        .modal-category {
            font-size: 1rem;
            color: grey;
            margin-bottom: 20px;
        }

        /* Style for close button */
        .close-modal {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
            color: white;
        }

        /* Style to adjust carousel size */
        #carouselExampleControls {
            max-width: 800px; /* Set maximum width */
            margin: auto; /* Center align */
        }

        .carousel-caption h1 {
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
        }
    </style>

    <!-- Modal for displaying larger image -->
    <div id="imageModal" class="modal-img">
        <div class="modal-img-content">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <img id="modalImage" src="" alt="">
            <h2 id="modalTitle" class="modal-title"></h2>
            <p id="modalDescription" class="modal-description"></p>
            <p id="modalCategory" class="modal-category"></p>
        </div>
    </div>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/piercing/carousal/1.jpeg') }}" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/piercing/carousal/2.jpeg') }}" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption">
                    <h1>Ear Piercing</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/piercing/carousal/3.jpeg') }}" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption">
                    <h1>Belly Piercing</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/homecarousal/4.jpeg') }}" class="d-block w-100" alt="Slide 4">
                <div class="carousel-caption">
                    <h1>Nose Piercing</h1>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container py-5">
        <div class="row">
            @foreach ($pierc as $p)
                <div class="col-lg-4 col-md-6">
                    <div class="card" onclick="openModal('{{ asset('storage/' . $p->image) }}', '{{ $p->name }}', '{{ $p->category }}', '{{ $p->price }}')">
                        <img src="{{ asset('storage/' . $p->image) }}" class="card-img-top" alt="{{ $p->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $p->name }}</h5>
                            <p class="card-text">{{ $p->category }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{ $p->price }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // JavaScript function to open modal with larger image and details
        function openModal(imageSrc, title, category, price) {
            var modal = document.getElementById("imageModal");
            var modalImage = document.getElementById("modalImage");
            var modalTitle = document.getElementById("modalTitle");
            var modalDescription = document.getElementById("modalDescription");
            var modalCategory = document.getElementById("modalCategory");
            modalImage.src = imageSrc;
            modalTitle.textContent = title;
            modalDescription.textContent = category;
            modalCategory.textContent = "Price: " + price;
            modal.style.display = "flex"; // Use flex display for centering
        }

        // JavaScript function to close modal
        function closeModal() {
            var modal = document.getElementById("imageModal");
            modal.style.display = "none";
        }
    </script>
@endsection
