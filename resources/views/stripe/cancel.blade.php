{{-- resources/views/payment-cancel.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Payment Canceled</h1>
        <p>Your payment was not completed. Please try again or choose a different payment method.</p>

        <a href="{{ route('cart') }}" class="btn btn-warning">Return to Cart</a>
    </div>
@endsection
