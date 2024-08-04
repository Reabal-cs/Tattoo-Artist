@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background: rgba(58, 57, 57, 0.3);">
                    <div class="card-header text-center">
                        <h3 class="card-title">How much does a tattoo cost?</h3>
                        <p class="card-subtitle text-muted">Get an estimation based on the profile of your tattoo and ink
                            brand.</p>
                    </div>

                    <div class="card-body">
                        <form novalidate action="" id="calc" method="post" class="ng-pristine ng-valid">
                            <div class="form-group">
                                <label for="color" class="text-muted">Color</label>
                                <div id="tbutton" class="btn-group-toggle mx-2 "data-toggle="buttons">
                                    <label class="btn btn-outline-pink">
                                        <input type="radio" value="black" name="color" required> Black & Grey
                                    </label>
                                    <label class="btn btn-outline-pink">
                                        <input type="radio" value="color" name="color" required> Color
                                    </label>
                                </div>
                                <div id="colorError" class="text-warning" style="display: none;">Please select a color.</div>
                            </div>
                            <div class="form-group">
                                <label for="size" class="text-muted">Size</label>
                                <input id="size" max="8" min="1" type="range" class="form-control-range">
                                <p class="text-muted mt-1" id="sizeDescription">Medium</p>
                            </div>

                            <div class="form-group">
                                <label for="detail" class="text-muted">Amount of Detail</label>
                                <input name="detail" id="detail" max="4" min="1" type="range" class="form-control-range">
                                <p class="text-muted mt-1" id="detailDescription">Moderate</p>
                            </div>

                            <div class="form-group">
                                <label for="ink" class="text-muted">Ink Brand</label>
                                <select name="ink" id="ink" class="form-control">
                                    <option value="1">GANGA BLACK x DYNAMIC</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="button" id="calculate" class="btn btn-pink px-5">Calculate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estimated Cost Message Modal -->
    <div id="estimatedCostModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 class="text-center">Estimated Cost</h2>
            <p class="text-center" id="costMessage">The estimated cost of your tattoo is <span id="costRange"></span>.</p>
        </div>
    </div>

    <!-- CSS Styles for the Modal -->
    <style>
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            /* Could be more or less, depending on screen size */
            color: black;
            /* Set text color to black */
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <script>
        // Description for size slider
        const sizeDescription = ["Tiny / minimalist", "Small (<5 cm / 2'')", "Medium (up to 10 cm / 4'')",
            "Large (up to 20 cm / 8'')", "Half sleeve", "Full limb", "Full back", "I still don't know"
        ];

        // Description for detail slider
        const detailDescription = ["Basic", "Some details", "Detailed", "Very complex"];

        // Base price for a tattoo
        const basePrice = 50; // Starting price in USD

        // Multiplier for ink brand
        const inkBrandMultiplier = 10; // Each ink brand costs $10 more than the other

        // Update the displayed value and description when the size slider changes
        document.getElementById("size").addEventListener("input", function() {
            const sizeValue = this.value;
            document.getElementById("sizeDescription").textContent = sizeDescription[sizeValue - 1];
        });

        // Update the displayed value and description when the detail slider changes
        document.getElementById("detail").addEventListener("input", function() {
            const detailValue = this.value;
            document.getElementById("detailDescription").textContent = detailDescription[detailValue - 1];
        });

        // Perform calculation on button click
        document.getElementById("calculate").addEventListener("click", function() {
            const sizeValue = parseInt(document.getElementById("size").value);
            const detailValue = parseInt(document.getElementById("detail").value);
            const inkBrandValue = parseInt(document.getElementById("ink").value);

            // Check if a color option is selected
            const colorSelection = document.querySelector('input[name="color"]:checked');
            if (!colorSelection) {
                document.getElementById("colorError").style.display = "block";
                return;
            } else {
                document.getElementById("colorError").style.display = "none";
            }

            // Calculate the base cost based on size and detail
            let baseCost = basePrice * (sizeValue + detailValue);

            // Additional cost for color ink
            let additionalCost = 0;
            if (colorSelection.value === "color") {
                additionalCost += 50; // Additional $50 for color ink
            }

            // Calculate the total cost including ink brand
            let inkPrice = inkBrandValue * inkBrandMultiplier; // Determine ink price based on brand
            const totalCost = baseCost + inkPrice + additionalCost;

            // Determine the cost range based on the total cost
            let costRange;
            if (totalCost < 100) {
                costRange = "Less than $100";
            } else if (totalCost >= 100 && totalCost < 200) {
                costRange = "$100 - $199";
            } else if (totalCost >= 200 && totalCost < 300) {
                costRange = "$200 - $299";
            } else if (totalCost >= 300 && totalCost < 400) {
                costRange = "$300 - $399";
            } else if (totalCost >= 400 && totalCost < 500) {
                costRange = "$400 - $499";
            } else if (totalCost >= 500 && totalCost < 600) {
                costRange = "$500 - $599";
            } else if (totalCost >= 600 && totalCost < 700) {
                costRange = "$600 - $699";
            } else if (totalCost >= 700 && totalCost < 800) {
                costRange = "$700 - $799";
            } else if (totalCost >= 800 && totalCost < 900) {
                costRange = "$800 - $899";
            } else if (totalCost >= 900 && totalCost < 1000) {
                costRange = "$900 - $999";
            } else {
                costRange = "More than $1000";
            }

            // Display the cost range in the modal
            document.getElementById("costRange").textContent = costRange;

            // Show the modal
            const modal = document.getElementById("estimatedCostModal");
            modal.style.display = "block";

            // Close the modal when the close button is clicked
            const closeButton = document.querySelector(".close");
            closeButton.addEventListener("click", function() {
                modal.style.display = "none";
            });

            // Close the modal when clicked outside of it
            window.addEventListener("click", function(event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        });
    </script>
@endsection
