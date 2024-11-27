<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Villa Checkout</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class='row'>
            <h1 class="text-center">Villa Rental Checkout</h1>
            <div class='col-md-12'>
                <div class="card">
                    <div class="card-header">
                        Villa Rental Details
                    </div>
                    <div class="card-body">
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:50%">Villa</th>
                                    <th style="width:10%">Price (per night)</th>
                                    <th style="width:8%">Nights</th>
                                    <th style="width:22%" class="text-center">Total</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-th="Villa">
                                        <div class="row">
                                            <div class="col-sm-3 hidden-xs">
                                                <img src="{{ asset('img/villa1.jpg') }}" width="100" height="100" class="img-responsive"/>
                                            </div>
                                            <div class="col-sm-9">
                                                <h4 class="nomargin">Beachfront Luxury Villa</h4>
                                                <p>3 bedrooms, ocean view</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">$300</td>
                                    <td data-th="Nights">
                                        <input type="number" value="1" class="form-control quantity cart_update" min="1" id="nights" onchange="updateTotal()" />
                                    </td>
                                    <td data-th="Total" class="text-center" id="total">$300</td>
                                    <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm cart_remove" onclick="removeItem()"><i class="fa fa-trash-o"></i> Remove</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" style="text-align:right;"><h3><strong>Total: <span id="final-total">$300</span></strong></h3></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align:right;">
                                        <form action="{{ route('session') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="total" id="form-total" value="300">
                                            <input type="hidden" name="villaid" value="1">
                                            <input type="hidden" name="villaname" value="Beachfront Luxury Villa">
                                            <a href="{{ url('/') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Continue Browsing</a>
                                            <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</button>
                                        </form>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateTotal() {
            const pricePerNight = 300; // Villa price per night
            const nights = document.getElementById('nights').value;
            const total = pricePerNight * nights;

            document.getElementById('total').innerText = `$${total}`;
            document.getElementById('final-total').innerText = `$${total}`;
            document.getElementById('form-total').value = total;
        }

        function removeItem() {
            alert('Item removed from the cart.');
            window.location.href = "{{ url('/') }}";
        }
    </script>
</body>
</html>
