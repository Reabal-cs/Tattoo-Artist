@extends('layouts.app')

@section('content')
    <style>
        .card {
            background: rgba(58, 57, 57, 0.3);
            margin-bottom: 20px;
            border: none;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            position: relative;
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
        }

        .modal-description {
            font-size: 1.2rem;
            margin-bottom: 10px;
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
            color: black;
        }

        /* Style for filter cards */
        .filter-cards {
            text-align: center;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .filter-card {
            background: rgba(58, 57, 57, 0.3);
            margin: 10px;
            border: none;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            padding: 15px;
            text-align: center;
            color: white;
            transition: background-color 0.3s;
        }

        .filter-card.active {
            background: rgba(85, 85, 85, 0.5);
        }

        .filter-card:hover {
            background: rgba(85, 85, 85, 0.5);
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

    <div class="container py-5">
        <div class="filter-cards">
            <div class="filter-card " onclick="filterImages('all')">All</div>
            @php
                // Extract unique categories from $images array
                $uniqueCategories = $images->unique('category')->pluck('category');
            @endphp

            @foreach ($uniqueCategories as $category)
                <div class="filter-card" onclick="filterImages('{{ $category }}')">{{ $category }}</div>
            @endforeach
            <!-- Add more filter cards for other categories if needed -->
        </div>
        <div class="row" id="gallery">
            @foreach ($images as $image)
                <div class="col-lg-4 col-md-6 image-card" data-category="{{ $image->category }}">
                    <div class="card"
                        onclick="openModal('{{ asset('storage/' . $image->file_path) }}', '{{ $image->name }}', '{{ $image->description }}', '{{ $image->category }}')">
                        <img src="{{ asset('storage/' . $image->file_path) }}" class="card-img-top" alt="{{ $image->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $image->name }}</h5>
                            <p class="card-text">{{ $image->description }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{ $image->category }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            shuffleGallery();
        });

        // Function to open modal with larger image and details
        function openModal(imageSrc, title, description, category) {
            var modal = document.getElementById("imageModal");
            var modalImage = document.getElementById("modalImage");
            var modalTitle = document.getElementById("modalTitle");
            var modalDescription = document.getElementById("modalDescription");
            var modalCategory = document.getElementById("modalCategory");
            modalImage.src = imageSrc;
            modalTitle.textContent = title;
            modalDescription.textContent = description;
            modalCategory.textContent = "Category: " + category;
            modal.style.display = "flex"; // Use flex display for centering
        }

        // Function to close modal
        function closeModal() {
            var modal = document.getElementById("imageModal");
            modal.style.display = "none";
        }

        // Function to shuffle gallery
        function shuffleGallery() {
            var gallery = document.getElementById("gallery");
            var cards = Array.from(gallery.getElementsByClassName("image-card"));
            for (var i = cards.length - 1; i > 0; i--) {
                var j = Math.floor(Math.random() * (i + 1));
                gallery.appendChild(cards[j]);
            }
        }

        // Function to filter images
        function filterImages(category) {
            var cards = document.getElementsByClassName("image-card");
            for (var i = 0; i < cards.length; i++) {
                var card = cards[i];
                if (category === "all" || card.getAttribute("data-category") === category) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            }

            var filterCards = document.querySelectorAll(".filter-card");
            filterCards.forEach(function(card) {
                card.classList.remove("active");
            });
            document.querySelector(".filter-card[onclick='filterImages(\"" + category + "\")']").classList.add("active");
        }
    </script>
@endsection
