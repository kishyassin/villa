@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2>Checkout</h2>
    <p>Total Price: <strong>{{ $price }} MAD</strong></p>
    <button class="btn btn-success">Proceed to Payment</button>
</div>
@endsection