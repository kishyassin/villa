{{-- resources/views/payment-success.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Payment Successful!</h1>
        <p>Your payment has been processed succeessfully. Thank you for your purchase!</p>

        <h3>Order Summary:</h3>
        <ul>
            <li><strong>Start Date:</strong> {{ session('start_date') }}</li>
            <li><strong>Months:</strong> {{ session('months') }}</li>
            <li><strong>Delivery Address:</strong> {{ session('address') }}</li>
        </ul>

        <a href="{{ route('cart') }}" class="btn btn-primary">Go back to Cart</a>
    </div>
@endsection
