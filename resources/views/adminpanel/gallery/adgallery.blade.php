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
        <title>Gallery</title>
    </head>

    <body>
        <div align="center">
            <h1>Gallery</h1>
      
        <hr>
       <h3> <a href="{{ route('adgallery.create') }}">Add Images</a></h3>
    </div>
        <br><br>

        <div class="card-group">
            @foreach ($image as $img)
                <div class="card-group">
                    <div class="card">
                        <img src="{{ asset('storage/' . $img->file_path) }}" alt="{{ $img->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $img->name }}</h5>
                            <h6 class="card-title"> {{ $img->category }}</h6>
                            <p class="card-text"> {{ $img->description }}</p>
                            <div class="btn-group">
                               
                                <a href="{{ route('adgallery.edit', ['id' => $img->id]) }}" class="btn btn-primary">edit</a>
                                <a href="{{ route('adgallery.destroy', ['id' => $img->id]) }}" class="btn btn-primary">delete</a>
                                
                            </div>
                            <p class="card-text"><small class="text-muted">{{ $img->created_at }}</small></p>
                        </div>
                    </div>
                    {{--    <ul>
                
                <li><img src="{{ asset('storage/'.$img->file_path) }}"  alt="{{ $img->name }}"></li>
                <li>Name : {{ $img->name }}</li>
                <li>Description : {{ $img->description }}</li>
                <li>Category : {{ $img->category }}</li>
                <li>actions : <a href="{{route("adgallery.edit", ['id'=>$img->id])}}">edit</a>
                    <br>
                    <a href="{{route("adgallery.destroy", ['id'=>$img->id])}}">delete</a>
                </li>
               

                
            </ul> --}}
            @endforeach
        </div>
    </body>

    </html>
@endsection
