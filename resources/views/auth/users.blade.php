@extends('auth.layouts')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Users Table</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Photo</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <!-- Display user's name -->
                <td>{{ $user->name }}</td>

                <!-- Display user's email -->
                <td>{{ $user->email }}</td>

                <!-- Display user's photo -->
                <td>
                    @if($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" width="100px" class="img-thumbnail">
                    @else
                        <img src="{{ asset('noimage.jpg') }}" width="100px" class="img-thumbnail">
                    @endif
                </td>

                <!-- Action buttons for editing and deleting the user -->
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
