@extends('layouts.app')
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Edit Photo</h2>
                <form action="{{ route('testimonial.update', ['id' => $testimonial->id]) }}" method="POST">
                    @csrf
                    <img src="{{ asset('storage/'.$testimonial->image) }}" class="img-fluid rounded mx-auto d-block mb-3" alt="{{ $testimonial->name }}">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $testimonial->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Your Feedback:</label>
                        <input type="text" class="form-control" id="description" name="feedback" value="{{ $testimonial->feedback }}">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Edit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
