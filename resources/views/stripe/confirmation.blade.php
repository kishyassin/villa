{{-- resources/views/confirmation.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Confirm Your Order</h1>
        <p>Please review your order before proceeding to payment.</p>
        
        <h3>Order Details</h3>
        <ul>
            @foreach ($items as $item)
                <li>{{ $item->name }} - {{ $item->quantity }} x {{ number_format($item->price, 2) }} MAD</li>
            @endforeach
        </ul>

        <p><strong>Total: {{ number_format($total, 2) }} MAD</strong></p>

        <form action="{{ route('stripe.session') }}" method="POST">
            @csrf
            <input type="hidden" name="adresseLivraison" value="{{ session('address') }}">
            <input type="hidden" name="start_date" value="{{ request('start_date') }}">
            <input type="hidden" name="months" value="{{ request('months') }}">
            <button type="submit" class="btn btn-primary">Proceed to Payment</button>
        </form>
    </div>
@endsection
