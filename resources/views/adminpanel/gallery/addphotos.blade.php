@extends('layouts.adminapp')
@section('adcontent')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>

        <center>

            <h2>Add Photos</h2>
            <form action="{{ route('adgallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="input-group mb-3">
                    <input type="file" name="image" accept="image/*" required>
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                <!-- Other input fields -->
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm" name="name" required>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Desc.</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm" name="description" required>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Style</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm"name="category" required>
                </div>
              {{--   <input type="text" name="name" required>
                <input type="text" name="description" required>
                <input type="text" name="category" required>
 --}}
                <!-- File upload field -->

                <input class="btn btn-primary" type="submit" value="Submit">
            </form>
            @error('image')
                {{ $message }}
            @enderror
            @error('name')
                {{ $message }}
            @enderror
            @error('description')
                {{ $message }}
            @enderror
            @error('category')
                {{ $message }}
            @enderror
        </center>
    </body>

    </html>
@endsection
