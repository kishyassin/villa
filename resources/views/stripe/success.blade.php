@extends('../layouts.app')

@section('content')
    <div class="container my-5">
        <div class="text-center">
            <div class="alert alert-success py-4">
                <h1 class="display-4">🎉 Payment Successful!</h1>
                <p class="lead">Thank you for your payment! Your booking has been confirmed.</p>
            </div>
        </div>

        <div class="card shadow-lg mt-4">
            <div class="card-header bg-primary text-white text-center">
                <h3>Booking Details</h3>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Start Date:</strong> {{ session('start_date') }}
                    </li>
                    <li class="list-group-item">
                        <strong>End Date:</strong> {{ session('end_date') }}
                    </li>
                    <li class="list-group-item">
                        <strong>Total Price:</strong> {{ session('price') }} MAD
                    </li>
                </ul>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-home"></i> Back to Home
            </a>
        </div>
    </div>
@endsection
