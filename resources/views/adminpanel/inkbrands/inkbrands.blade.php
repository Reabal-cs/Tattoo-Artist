@extends('layouts.adminapp')
@section('adcontent')
    <!DOCTYPE html>
    <html lang="en">
    <style>
        img {
            height: 200px;
            width: 200px;
        }
    </style>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ink Brands</title>
    </head>

    <body>
        <div align="center">
            <h1>Ink Brands</h1>

            <hr>
            <h3> <a href="{{ route('inkbrands.create') }}">Add Brand</a></h3>
        </div>
        <br><br>

        
        <div class="container mt-5">
            <div class="row">
                @foreach ($inkbrand as $ink)
                <div class="col-md-4 mb-4">
                    <div class="card">
                       
                        <div class="card-header">
                            <img src="{{ asset('storage/' . $ink->image) }}" alt="{{ $ink->name }}">
                            <h5>{{ $ink->name }}</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">Description: {{ $ink->quality }}</li>
                                <li class="list-group-item">Price: {{ $ink->price }}$</li>
                                <li class="list-group-item">Updated At: {{ $ink->updated_at }}</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="btn-group">
                                <a href="{{ route('inkbrands.destroy', ['id' => $ink->id]) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
    
    
          {{--   @foreach ($inkbrand as $ink)
               <center> <ul>
                    <li>Name : {{ $ink->name }}</li>
                    <br>
                    <li>Description : {{ $ink->quality }}</li>
                    <br>
                    <li>Category : {{ $ink->price }}</li>
                    <br>
                    <li>
                        Actions: <a href="{{ route('inkbrands.destroy', ['id' => $ink->id]) }}">delete</a>
                    </li>
                </ul>
            </center>
            @endforeach --}}
    
    
    </body>

    </html>
@endsection
