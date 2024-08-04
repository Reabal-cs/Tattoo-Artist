@extends('layouts.adminapp')
@section('adcontent')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Piercing</title>
</head>
<style>
    body {
        background-color: #f8f9fa; /* Set your desired background color */
    }
</style>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Edit Piercing</h2>
                <form action="{{ route('piercing.update', ['id' => $data->id]) }}" method="POST">
                    @csrf
                    <img src="{{ asset('storage/'.$data->image) }}" class="img-fluid rounded mx-auto d-block mb-3" alt="{{ $data->name }}">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="category" value="{{ $data->category }}">
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <input type="text" class="form-control" id="category" name="price" value="{{ $data->price }}">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
