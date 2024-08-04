@extends('layouts.adminapp')
@section('adcontent')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Photo</title>
</head>
<style>
    body {
        background-color: #343536; /* Set your desired background color */
    }
</style>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Edit Photo</h2>
                <form action="{{ route('updatephotos', ['id' => $image->id]) }}" method="POST">
                    @csrf
                    <img src="{{ asset('storage/'.$image->file_path) }}" class="img-fluid rounded mx-auto d-block mb-3" alt="{{ $image->name }}">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $image->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $image->description }}">
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{ $image->category }}">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
