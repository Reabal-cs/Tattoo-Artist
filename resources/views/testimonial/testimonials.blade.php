@extends('layouts.app')

@section('content')
<a href="{{ route('testimonial.create') }}" class="btn btn-primary mb-3 ms-3">Add testimonial </a>
        <!-- Display existing testimonials -->
        @foreach ($data as $tes)
            <div class="card mb-3" style="background: rgba(58, 57, 57, 0.3);">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $tes->image) }}" class="img-fluid rounded-start"
                            alt="{{ $tes->name }}" style="max-height: 150px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Client Name: {{ $tes->name }}</h5>
                            <p class="card-text">Client Feedback: {{ $tes->feedback }}</p>

                        </div>
                        <div class="card-footer">

                            <div class="btn-group" role="group" aria-label="Basic example">
                                <ul>Created at: {{ $tes->created_at }}</ul>
                                <br>
                                <ul>last update: {{ $tes->updated_at }}</ul>
                                @if (Auth::check() && $tes->user_id == Auth::user()->id)
                                    <a href="{{ route('testimonial.edit', ['id' => $tes->id]) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('testimonial.destroy', ['id' => $tes->id]) }}"
                                        class="btn btn-danger">Delete</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
    <script>
        // Function to preview the selected image
        function previewImage(event) {
            var imagePreview = document.getElementById('imagePreview');
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block'; // Show the image preview
            }

            reader.readAsDataURL(file);
        }
    </script>
@endpush
