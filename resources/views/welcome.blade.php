<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Jobs on High</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('./css-welcome/styles.css') }}" rel="stylesheet" />
        <style>
            body{
                overflow-x: hidden !important;
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Jobs On High</a>
                <button class="text-white rounded navbar-toggler text-uppercase font-weight-bold bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="mx-0 nav-item mx-lg-1"><a class="px-0 py-3 rounded nav-link px-lg-3" href="{{ url('/register') }}">Register</a></li>
                        <li class="mx-0 nav-item mx-lg-1"><a class="px-0 py-3 rounded nav-link px-lg-3" href="{{ url('/login') }}">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="text-center text-white masthead" style="background-color: #01285A">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="mb-5 masthead-avatar" src="{{ asset('./logo.jpeg') }}" alt="Logo" />
                <!-- Masthead Heading-->
                <h1 class="mb-0 masthead-heading text-uppercase">Jobs on High</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="mb-0 masthead-subheading font-weight-light">Apply For Jobs Anywhere In The World!</p>
            {{-- apply now button with register link --}}
            <a href="{{ url('/register') }}" class="mt-5 rounded btn btn-primary btn-xl">Apply Now</a>
            </div>
        </header>
        <!-- Portfolio Section-->
         <section style="background-color: #01285A; color: white">
            <!-- How we work-->
            <div class="mb-3 text-center ">
              <h3>How We Work</h3>
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="p-5">
                            <img class="img-fluid rounded-circle" src="{{ asset('./step1.png') }}" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4">Step 1</h2>
                            <p>Choose the country you want to work in</p>
                        </div>
                    </div>

                </div>
 <!-- How we work 2-->
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5">
                            <img class="img-fluid rounded-circle" src="{{ asset('./step2.png') }}" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Step 2</h2>
                            <p>Fill all your personal details to continue</p>
                        </div>
                    </div>
                </div>
                <!-- How we work 3-->
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="p-5">
                            <img class="img-fluid rounded-circle" src="{{ asset('./step3.png') }}" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4">Step 3</h2>
                            <p>Complete the payment and done.</p>
                        </div>
                    </div>
         </section>

        <!-- Copyright Section-->
        <section class="py-4 text-center text-white copyright">
            <div class="container"><small>Copyright © Jobs on High 2020</small></div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
