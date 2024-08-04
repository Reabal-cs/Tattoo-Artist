@extends('layouts.app')

@section('adcontent')
    <div class="container py-5">
        <h1 class="mb-4">Client Appointments</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Service</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Status</th>

                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $appointment)
                    <tr>
                        <td>{{ $appointment->name }}</td>
                        <td>{{ $appointment->user->email }}</td>
                        <td>{{ $appointment->phone }}</td>
                        <td>{{ $appointment->service }}</td>
                        <td>{{ $appointment->gender }}</td>
                        <td>{{ $appointment->status }}</td>
                        <td>{{ $appointment->date }}</td>
                        <td>
                            <a href="{{ route('reservation.destroy', ['id' => $appointment->id]) }}"
                                class="btn btn-danger">Delete</a>
                            <a href="{{ route('reservation.action', ['id' => $appointment->id, 'status' => 'confirm']) }}"
                                class="btn btn-primary">confirm</a>
                            <a href="{{ route('reservation.action', ['id' => $appointment->id , 'status' => 'reject']) }}"
                                class="btn btn-info">reject</a>


                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
