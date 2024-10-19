@extends('auth.layouts')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div>
                @endif
                
                <!-- Tombol baru untuk halaman buku -->
                <div class="d-flex justify-content-center mt-3">
                    <a href="{{ url('/buku') }}" class="btn btn-primary">Go to Buku Page</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
