@extends('layouts.adminapp')

@section('adcontent')
    <h2>Add Piercing</h2>
    <form action="{{ route('piercing.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="image" class="form-label">Image Upload</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <!-- Other input fields -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </form>
@endsection
