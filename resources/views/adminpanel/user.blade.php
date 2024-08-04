@extends('layouts.adminapp')
@section('adcontent')
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">User id</th>
                    <th scope="col">User Name</th>
                    <th scope="col">User Email</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Email Verified At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $usr)
                    <tr>
                        <td>{{ $usr->id }}</td>
                        <td>{{ $usr->name }}</td>
                        <td>{{ $usr->email }}</td>
                        <td>{{ $usr->created_at }}</td>
                        <td>{{ $usr->email_verified_at }}</td>
                        <td>
                            <a href="{{ route('user.destroy', ['id' => $usr->id]) }}"
                                class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection



   
