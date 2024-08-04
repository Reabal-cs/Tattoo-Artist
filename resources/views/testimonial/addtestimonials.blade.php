@extends('layouts.app')
@section('content')
@auth
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card mb-3" style="background: rgba(58, 57, 57, 0.3);">
                    <div class="card-body">
                        <h5 class="card-title">Add Testimonial</h5>
                        <form method="POST" action="{{ route('testimonial.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="feedback" class="form-label">Feedback</label>
                                <textarea class="form-control" id="feedback" name="feedback" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*"
                                    onchange="previewImage(event)" required>
                                <img id="imagePreview" src="#" alt="Image Preview"
                                    style="max-width: 100%; margin-top: 10px; display: none;">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       
    @endauth
    @endsection