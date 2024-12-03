<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Villa Agency - Real Estate HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="assets/css/app.css">

</head>

<body>
<div class="sub-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8">
                <ul class="info">
                    <li><i class="fa fa-envelope"></i>{{$configurations->title}}</li>
                    <li><i class="fa fa-map"></i>{{$configurations->addresse}}</li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4">
                <ul class="info">
                    <li><i class="fa fa-phone"></i>{{$configurations->phone}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@include('layouts.components.header')

@yield('content')

@include('layouts.components.footer')

<!-- Include necessary JavaScript files -->
<!-- jQuery -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.css">
<script src="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.js"></script>
<script>
    // Initialize the Pannellum Viewer
    pannellum.viewer('panorama', {
        type: 'equirectangular',
        panorama: 'assets/images/your-panorama-image.jpg', // Replace with your 360° image path
        autoLoad: true,
        compass: true,
        showControls: true,
        yaw: 180, // Default orientation
    });
</script>
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap Bundle with Popper -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Additional JS Files -->
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/custom.js"></script>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<!-- Optional: Initialize Swiper or other plugins -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const startDateInput = document.getElementById("start_date");
        const endDateInput = document.getElementById("end_date");
        const amountDisplay = document.getElementById("amount");

        // Price per day
        const pricePerDay = {{ $villas->price }};

        // Calculate the total amount
        const calculateAmount = () => {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);

            if (startDate && endDate && endDate > startDate) {
                // Calculate the number of days between the two dates
                const timeDiff = endDate.getTime() - startDate.getTime();
                const days = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));

                // Calculate the total price
                const totalAmount = days * pricePerDay;
                amountDisplay.textContent = `${totalAmount} MAD`;

                // Add animation class for smooth changes
                amountDisplay.classList.add("changed");
                setTimeout(() => {
                    amountDisplay.classList.remove("changed");
                }, 300);
            } else {
                amountDisplay.textContent = "0 MAD";
            }
        };

        // Add event listeners for input changes
        startDateInput.addEventListener("input", calculateAmount);
        endDateInput.addEventListener("input", calculateAmount);

        // Initialize amount on page load
        calculateAmount();
    });

</script>

<!-- JavaScript to toggle between static rating and form -->
<script>
    document.getElementById('modifyBtn').addEventListener('click', function () {
        document.getElementById('staticRating').style.display = 'none';
        document.getElementById('ratingForm').style.display = 'block';
    });
</script>

<script> window.chtlConfig = { chatbotId: "3143318816" } </script>
<script async data-id="3143318816" id="chatling-embed-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>
@if(Session::has('success'))
    <script>
        $(document).ready(function () {
            Swal.fire({
                title: "Success",
                text: "{{ Session::get('success') }}",
                icon: "success"
            });
        });
    </script>
@endif

@if(Session::has('error'))
    <script>
        $(document).ready(function () {
            Swal.fire({
                title: "Error",
                text: "{{ Session::get('error') }}",
                icon: "error"
            });
        });
    </script>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
