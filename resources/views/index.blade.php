@extends('layouts.villa')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<script>
document.addEventListener("DOMContentLoaded", function() {
    const navLinks = document.querySelectorAll(".slider-nav a");
    const slides = document.querySelectorAll(".slider .slide-item");
    const slider = document.querySelector(".slider");
    let currentSlide = 0;

    // Initially, add the active class to the first slide nav button
    navLinks[0].classList.add("active");

    navLinks.forEach((link, index) => {
        link.addEventListener("click", function(e) {
            e.preventDefault();

            // Remove active class from all buttons
            navLinks.forEach(navLink => navLink.classList.remove("active"));

            // Add active class to the clicked button
            link.classList.add("active");

            // Update current slide
            currentSlide = index;

            // Scroll to the corresponding slide
            const offset = -100 * currentSlide; // This will scroll the slider by the width of the slides
            slider.style.transform = `translateX(${offset}%)`;
        });
    });

    // Optionally, automatically activate the corresponding nav link when scrolling
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const index = [...slides].indexOf(entry.target);
                navLinks.forEach(navLink => navLink.classList.remove("active"));
                navLinks[index].classList.add("active");
            }
        });
    }, { threshold: 0.5 });  // Adjust threshold to trigger when 50% of the slide is visible

    slides.forEach(slide => {
        observer.observe(slide);
    });
});

</script>
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


    <!-- ***** Header Area Start ***** -->


    <section class="container">
    <div class="slider-wrapper">
        <div class="slider">
            @foreach ($Heroimages as $index => $image)
                <div class="slide-item">
                    <!-- Utiliser asset() pour le bon chemin -->
                    <img id="slide-{{ $index + 1 }}" src="{{ asset('storage/' . $image) }}" alt="Slide {{ $index + 1 }}" class="max-w-full rounded-lg shadow-xl object-cover" />
                    <!-- Text overlay -->
                    <div class="header-text">
                        <span class="category">{{$villas->ville}}</span>
                        <h2 class="text-white max-w-[50px] text-wrap">Hurry!<br>Get the Best Villa for you</h2>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="slider-nav">
            @foreach ($Heroimages as $index => $image)
                <a href="#slide-{{ $index + 1 }}" class="p-2 bg-[#555] rounded-full"></a>
            @endforeach
        </div>
    </div>
</section>






    <div class="featured section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                <div class="left-image">
                 <img src="{{ asset('storage/' . $squareImage) }}" alt="Square Image" class="w-full h-auto rounded-lg">
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
                    <!-- Pannellum Viewer -->
                    <div class="video-frame">
                        <div id="panorama" style="width: 100%; height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="section best-deal">
        <div class="container" id="props">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>| Best Deal</h6>
                        <h2>Find Your Best Deal Right Now!</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div>
                        <div class="row">
                            <div class="">
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Total Flat Space <span>{{ $villas->area }} m2</span></li>
                                                    <li>Floor number <span>{{ $villas->floor_number ?? 'N/A' }}</span></li>
                                                    <li>Number of rooms <span>{{ $villas->rooms }}</span></li>
                                                    <li>Number of Bathrooms <span>{{ $villas->bathrooms ?? '1' }}</span></li>
                                                    <li>Price Per Day <span>{{ $villas->price ?? 'N/A' }}</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <img src="assets/images/deal-02.jpg" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Detail Info About Villa</h4>
                                            <p>{{ $villas->description }}</p>
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
                            <input
                                type="date"
                                id="start_date"
                                name="start_date"
                                class="form-control"
                                min="{{ now()->toDateString() }}"
                                value="{{ now()->toDateString() }}"
                                required
                            >
                        </div>
                        <div class="form-group mb-4">
                            <label for="end_date" class="form-label">Ending Date</label>
                            <input
                                type="date"
                                id="end_date"
                                name="end_date"
                                class="form-control"
                                min="{{ now()->toDateString() }}"
                                value="{{ now()->addDay()->toDateString() }}"
                                required
                            >
                        </div>
                        <div class="form-group mb-4">
                            <label for="amount" class="form-label">Amount to Pay</label>
                            <div id="amount" class="animated-amount">0 MAD</div>
                        </div>
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
        <div class="container" id="contact">
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
        <iframe
        src="{{ $villas->location }}"
        width="100%"
        height="500"
        frameborder="0"
        style="border: 0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);"
        allowfullscreen>
        </iframe>
    </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="item phone">
                                <img src="assets/images/phone-icon.png" alt="" style="max-width: 52px;">
                                <h6>{{$configurations->phone}}<br><span>Phone Number</span></h6>
                </div>
            </div>
            <div class="col-lg-6">
                    <div class="item email">
                        <img src="assets/images/email-icon.png" alt="" style="max-width: 52px;">
                        <h6>{{$configurations->mail}}<br><span>Business Email</span></h6>
                    </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
    @if (Auth::check()) <!-- Vérifier si l'utilisateur est authentifié -->
    <form id="contact-form" action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="idUser" value="{{ Auth::user()->id }}">
        <div class="row">
            <div class="col-lg-12">
                <fieldset>
                    <label for="message">Message</label>
                    <textarea name="message" id="message" placeholder="Your Message" required></textarea>
                </fieldset>
            </div>
            <div class="col-lg-12">
                <fieldset>
                    <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                </fieldset>
            </div>
        </div>
    </form>
@else


<form id="contact-form" action="" method="POST">
        @csrf
        <div class="row">
        <div class="alert alert-danger">
        <p>Veuillez vous connecter pour ajouter un commentaire.</p>
    </div>
            <div class="col-lg-12">
                <fieldset>
                    <label for="message">Message</label>
                    <textarea name="message" id="message" placeholder="Your Message" disabled></textarea>
                </fieldset>
            </div>
            <div class="col-lg-12">
                <fieldset>
                    <button type="submit" id="form-submit" class="orange-button" disabled>Send Message</button>
                </fieldset>
            </div>
        </div>
    </form>
@endif


                </div>
            </div>
        </div>
    </div>


@endsection

