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

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
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

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('home')}}" class="logo ">
                        <h1 style="white-space: nowrap;">{{$configurations->title}}</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                    <li><a href="{{ route('home') }}" class="active">Home</a></li>
                      <li><a href="{{ route('properties') }}">Property Details</a></li>
                      <li><a href="{{route('contact_us')}}">Contact Us</a></li>
                      <li><a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a></li>
                  </ul>
                    <!-- <a class='menu-trigger'>
                        <span>Menu</span>
                    </a> -->
                    @if (Route::has('login'))
                @auth
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-item nav-link"><i class="fa fa-user" aria-hidden="true"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('dashboard') }}" class="dropdown-item">modifier</a>
                            <a href="/app" class="dropdown-item">dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Déconnecter') }}
                                </a>
                            </form>
                        </div>
                    </div>

                @else
                    <div
                        class="sm:top-0 sm:right-0 ps-3 d-flex align-items-center justify-content-center text-right">
                        <a href="{{ route('login') }}" class="btn btn-primary rounded-full">se connecter</a>
                    </div>
                @endauth
            @endif
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner">
    <div class="owl-carousel owl-banner">
      <div class="item item-1">
        <div class="header-text">
          <span class="category">{{$villas->ville}}</span>
          <h2>Hurry!<br>Get the Best Villa for you</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="featured section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image">
            <img src="assets/images/featured.jpg" alt="">
            <a href="{{ route('properties') }}"><img src="assets/images/featured-icon.png" alt="" style="max-width: 60px; padding: 0px;"></a>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h6>| Featured</h6>
            <h2>Best Appartment &amp; Sea view</h2>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Best useful links ?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                Get <strong>the best villa</strong> website template in HTML CSS and Bootstrap for your business. TemplateMo provides you the <a href="https://www.google.com/search?q=best+free+css+templates" target="_blank">best free CSS templates</a> in the world. Please tell your friends about it.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  How does this work ?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Why is Villa Agency the best ?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="info-table">
            <ul>
              <li>
                <img src="assets/images/info-icon-01.png" alt="" style="max-width: 52px;">
                <h4>250 m2<br><span>Total Flat Space</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                <h4>Contract<br><span>Contract Ready</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                <h4>Payment<br><span>Payment Process</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-04.png" alt="" style="max-width: 52px;">
                <h4>Safety<br><span>24/7 Under Control</span></h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Video View</h6>
            <h2>Get Closer View & Different Feeling</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="video-frame">
            <img src="assets/images/video-frame.jpg" alt="">
            <a href="https://youtube.com" target="_blank"><i class="fa fa-play"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="34" data-speed="1000"></h2>
                   <p class="count-text ">Buildings<br>Finished Now</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="12" data-speed="1000"></h2>
                  <p class="count-text ">Years<br>Experience</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2>
                  <p class="count-text ">Awwards<br>Won 2023</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
   <div class="section best-deal">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="section-heading">
            <h6>| Best Deal</h6>
            <h2>Find Your Best Deal Right Now!</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div >
            <div class="row">
              <div class="" >
                <div class=""   >
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Flat Space <span>250 m2</span></li>
                          <li>Floor number <span>26th</span></li>
                          <li>Number of rooms <span>5</span></li>
                          <li>Parking Available <span>Yes</span></li>
                          <li>Payment Process <span>Bank</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="assets/images/deal-02.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Detail Info About Villa</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse. <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper mug, succulents typewriter shaman DIY kitsch twee taiyaki fixie hella venmo after messenger poutine next level humblebrag swag franzen.</p>
                      <div class="icon-button">
                        <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule a visit</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="payment-section section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading text-center mb-4">
          <h6>| Rent Payment</h6>
          <h2>Pay for Your Villa Rental</h2>
        </div>
      </div>
    </div>
    <div class="row align-items-center">
      <!-- Left Column: Form -->
      <div class="col-lg-6">
        <form action="{{ route('stripe.session') }}" method="POST" class="payment-form">
          @csrf
          <div class="form-group mb-4">
            <label for="start_date" class="form-label">Starting Date</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required>
          </div>
          <div class="form-group mb-4">
            <label for="months" class="form-label">Number of Months</label>
            <div class="custom-number-input">
              <input
                type="number"
                id="months"
                name="months"
                class="form-control"
                min="1"
                max="12"
                value="1"
              >
            </div>
          </div>
          <div class="form-group mb-4">
            <label for="amount" class="form-label">Amount to Pay</label>
            <div id="amount" class="animated-amount">2000 MAD</div>
          </div>
          <!-- Hidden End Date Field -->
          <input type="hidden" id="end_date" name="end_date">
          <button type="submit" class="btn btn-primary">Proceed to Payment</button>
        </form>
      </div>
      <!-- Right Column: Image -->
      <div class="col-lg-6 text-center">
        <img src="assets/images/video-frame.jpg" alt="Villa" class="img-fluid payment-image">
      </div>
    </div>
  </div>
</div>




  <div class="contact section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Contact Us</h6>
            <h2>Get In Touch With Our Agents</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="item phone">
                <img src="assets/images/phone-icon.png" alt="" style="max-width: 52px;">
                <h6>010-020-0340<br><span>Phone Number</span></h6>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item email">
                <img src="assets/images/email-icon.png" alt="" style="max-width: 52px;">
                <h6>info@villa.co<br><span>Business Email</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <form id="contact-form" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <label for="name">Full Name</label>
                  <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Email Address</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="subject">Subject</label>
                  <input type="subject" name="subject" id="subject" placeholder="Subject..." autocomplete="on" >
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="message">Message</label>
                  <textarea name="message" id="message" placeholder="Your Message"></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-8">
        <p>Copyright © 2048 Villa Agency Co., Ltd. All rights reserved.

        Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
      </div>
    </div>
  </footer>

<!-- Include necessary JavaScript files -->
  <!-- jQuery -->
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
    const monthsInput = document.getElementById("months");
    const amountDisplay = document.getElementById("amount");
    const startDateInput = document.getElementById("start_date");
    const endDateInput = document.getElementById("end_date");

    // Base price per month
    const pricePerMonth = 2000;

    // Update amount dynamically
    const updateAmount = () => {
      const months = parseInt(monthsInput.value, 10) || 0;
      if (months <= 0) {
        amountDisplay.textContent = ""; // Clear the amount if invalid
      } else {
        const newAmount = months * pricePerMonth;
        amountDisplay.textContent = `${newAmount} MAD`;

        // Add animation class for smooth changes
        amountDisplay.classList.add("changed");
        setTimeout(() => {
          amountDisplay.classList.remove("changed");
        }, 300);
      }
    };

    // Calculate the end date based on start date and months
    const calculateEndDate = () => {
      const startDate = new Date(startDateInput.value);
      const months = parseInt(monthsInput.value, 10);

      if (startDate && !isNaN(months)) {
        // Add the number of months to the starting date
        const endDate = new Date(startDate);
        endDate.setMonth(endDate.getMonth() + months);

        // Format the date to YYYY-MM-DD for the hidden input
        const formattedEndDate = endDate.toISOString().split("T")[0];
        endDateInput.value = formattedEndDate;
      }
    };

    // Restrict input and handle arrow-based changes
    monthsInput.addEventListener("input", () => {
      let currentValue = parseInt(monthsInput.value, 10) || 1;

      // Ensure the value stays within the allowed range (1 to 12)
      if (currentValue < 1) {
        currentValue = 1;
      } else if (currentValue > 12) {
        currentValue = 12;
      }

      // Update the input value to the corrected range if needed
      monthsInput.value = currentValue;
      updateAmount();
      calculateEndDate();
    });

    // Add event listener for the start date input
    startDateInput.addEventListener("input", calculateEndDate);

    // Initialize default amount and end date on page load
    updateAmount();
    calculateEndDate();
  });
</script>


    <!-- JavaScript to toggle between static rating and form -->
    <script>
        document.getElementById('modifyBtn').addEventListener('click', function () {
            document.getElementById('staticRating').style.display = 'none';
            document.getElementById('ratingForm').style.display = 'block';
        });
    </script>


    @if(Session::has('success'))
        <script>
            $(document).ready(function () {
                Swal.fire({
                    title: "Bien",
                    text: "{{Session::get('success')}}",
                    icon: "success"
                });
            })
        </script>
    @endif

    @if(Session::has('error'))
        <script>
            $(document).ready(function () {
                Swal.fire({
                    title: "Ooops",
                    text: "{{Session::get('error')}}",
                    icon: "error"
                });
            })
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>

</html>
