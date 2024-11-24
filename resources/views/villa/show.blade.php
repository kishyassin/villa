@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $villa->image_url }}" class="img-fluid" alt="{{ $villa->name }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $villa->name }}</h2>
            <p>{{ $villa->description }}</p>
            <p>Price per month: <strong>{{ $villa->price_per_month }} MAD</strong></p>

            <form id="rentalForm" method="GET" action="{{ route('checkout') }}">
                <div class="form-group">
                    <label for="months">Number of Months:</label>
                    <input type="number" id="months" name="months" class="form-control" min="1" value="1" required>
                </div>
                <div class="form-group">
                    <label>Total Price:</label>
                    <p id="totalPrice">{{ $villa->price_per_month }} MAD</p>
                </div>
                <input type="hidden" name="price" id="calculatedPrice">
                <button type="submit" class="btn btn-primary">Checkout</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('months').addEventListener('input', function () {
        const months = this.value;
        const pricePerMonth = {{ $villa->price_per_month }};
        const totalPrice = months * pricePerMonth;
        document.getElementById('totalPrice').textContent = `${totalPrice} MAD`;
        document.getElementById('calculatedPrice').value = totalPrice;
    });
</script>
@endsection
