@extends('layouts.app')
@section('content')
@foreach ($ink as $brand)
    

<div class="card mb-3" style="background: rgba(58, 57, 57, 0.3);">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('storage/'.$brand->image) }}" class="img-fluid rounded-start" alt="{{ $brand->name }}">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{$brand->name}}</h5>
                <p class="card-text">{{$brand->quality}}</p>
                <p class="card-text"><small class="text-muted"></small></p>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection