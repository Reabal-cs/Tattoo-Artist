@extends('layouts.app')

@section('content')

<div class="container-fluid appointment py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="section-title text-start">
                    <h4 class="sub-title pe-3 mb-0">Solutions To Your Pain</h4>
                    <h1 class="display-4 mb-4">Best Quality Services With Minimal Pain Rate</h1>
                    @if (Auth::check())
                    <table class="table table-bordered " >
                        <thead><tr>Appointments section:</tr>
                            <tr>
                                <th scope="col" class="bg-transparent">Date of Appointment</th>
                                <th scope="col" class="bg-transparent">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $apoint)
                                @if ($apoint->user_id == Auth::user()->id)
                                    <tr>
                                        <td class="bg-transparent">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-transparent py-3 text-white" value="{{ $apoint->date }}" disabled>
                                            </div>
                                        </td>
                                        <td class="bg-transparent">
                                            <div class="form-group bg-transparent">
                                                <input type="text" class="form-control py-3 bg-transparent text-white" value="{{ $apoint->status }}" disabled>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endif
                
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                <div class="appointment-form rounded p-5">
                    <p class="fs-4 text-uppercase ">Get In Touch</p>
                    <h1 class="display-5 mb-4">Get Appointment</h1>
                    <form id="appointment-form" method="POST" action="{{ route('reservation.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-3 gx-4">
                            <div class="col-xl-6">
                                <input type="text" name="name" class="form-control py-3 bg-transparent text-white" placeholder="First Name" required>
                            </div>
                            <div class="col-xl-6">
                                <input class="form-control py-3 bg-transparent text-white" placeholder="Email" disabled value="{{ auth()->user()->email }}">
                            </div>
                            <div class="col-xl-6">
                                <input type="number" name="phone" class="form-control py-3 bg-transparent" placeholder="Phone" required>
                            </div>
                            <div class="col-xl-6">
                                <select name="gender" class="form-select py-3 bg-transparent" aria-label="Default select example" required>
                                    <option value="" selected disabled style="color: black;">Your Gender</option>
                                    <option value="Male" style="color: black;">Male</option>
                                    <option value="Female" style="color: black;">Female</option>
                                    <option value="Prefer Not to say" style="color: black;">Prefer Not to say</option>
                                </select>
                            </div>
                            <div class="col-xl-6">
                                <input type="datetime-local" name="date" class="form-control py-3 bg-transparent" id="appointment-date" style="font-size: 1.2rem;" required>
                            </div>
                            <div class="col-xl-6 position-relative">
                                <input type="text" id="nationality" name="nationality" class="form-control py-3 bg-transparent" placeholder="Search Nationality" autocomplete="off" required>
                                <select id="nationality-dropdown" class="form-select py-3  position-absolute w-100" size="5" style="display:none; z-index: 1000;">
                                    <option selected disabled style="color: white;">Select Nationality</option>
                                </select>
                            </div>
                            <div class="col-xl-6">
                                <select id="service" name="service" class="form-select py-3 bg-transparent" required>
                                    <option value="" selected disabled style="color: black;">Select Service</option>
                                    <option value="Tattoo" style="color: black;">Tattoo</option>
                                    <option value="Piercing" style="color: black;">Piercing</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control bg-transparent text-white" name="comment" id="area-text" cols="30" rows="5" placeholder="Write Comments" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary text-white w-100 py-3 px-5" style="background: rgb(134, 16, 16); border-color: rgb(134, 16, 16);">SUBMIT NOW</button>
                            </div>
                        </div>
                    </form>
                  
                  
                
                </div>
            </div>
        </div>
    </div>
</div>
        <script>
    document.addEventListener('DOMContentLoaded', function () {
        const select = document.getElementById('nationality-dropdown');
        const searchInput = document.getElementById('nationality');

        // Fetch data from the API
        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
                // Iterate through the data and populate the dropdown
                data.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.name.common;
                    option.textContent = country.name.common;
                    select.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });

        // Filter options based on search input
        searchInput.addEventListener('input', function () {
            const searchValue = searchInput.value.toLowerCase();
            Array.from(select.options).forEach(option => {
                const optionText = option.textContent.toLowerCase();
                if (optionText.includes(searchValue)) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            });

            // Show/hide dropdown based on search input
            if (searchValue === '') {
                select.size = 5; // Default size
                select.style.display = 'none';
            } else {
                select.size = 5; // Expand dropdown
                select.style.display = 'block';
            }
        });

        // Show dropdown on input focus
        searchInput.addEventListener('focus', function () {
            select.size = 5; // Expand dropdown
            select.style.display = 'block';
        });

        // Handle option click event
        select.addEventListener('click', function (event) {
            const option = event.target;
            if (option.tagName === 'OPTION') {
                searchInput.value = option.textContent;
                select.style.display = 'none';
            }
        });

        // Form validation
        const form = document.getElementById('appointment-form');
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });
    
</script>
@endsection
