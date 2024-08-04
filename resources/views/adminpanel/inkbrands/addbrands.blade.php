@extends('layouts.adminapp')
@section('adcontent')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add brand</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add Ink Brand</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('inkbrands.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" name="image" class="form-control" id="image">
                                @error('image')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name">
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="quality">Quality:</label>
                                <input type="text" class="form-control" id="quality" name="quality">
                                @error('quality')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="price" name="price">
                                @error('price')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    {{--  <form action="{{route("inkbrands.store")}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name">
    <br>
    <input type="text" name="quality">
    <br>
    <input type="text" name="price">
    <input type="submit" value="submit">
    
    </form>
    <hr>
    @error('name')
    {{$message}}
    @enderror
    <br>
    @error('quality')
    {{$message}}
    @enderror
    <br>
    @error('price')
    {{$message}}
    @enderror --}}
</body>

</html>
@endsection