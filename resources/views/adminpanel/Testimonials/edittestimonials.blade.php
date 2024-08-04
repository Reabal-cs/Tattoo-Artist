@extends('layouts.adminapp')
@section('adcontent')
<h1><center>Testimonials</center></h1>
<hr>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>    
                    <th scope="col"> image</th>
                    <th scope="col">User id</th>
                    <th scope="col">User Name</th>
                    <th scope="col">User Feedback</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Edit Section</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($test as $usr)
                    <tr>
                        <td><img src="{{ asset('storage/' . $usr->image) }}" class="img-fluid rounded-start" alt="{{ $usr->name }}" style="max-height: 150px;"></td>
                        <td>{{ $usr->user_id }}</td>
                        <td>{{ $usr->name }}</td>
                        <td>{{ $usr->feedback }}</td>
                        <td>{{ $usr->created_at }}</td>
                        <td>
                            <a href="{{ route('atestimonial.destroy', ['id' => $usr->id]) }}"
                                class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection