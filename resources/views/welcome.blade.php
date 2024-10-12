<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="images/icon.png" rel="shortcut icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->

    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
        .bg-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;

        }

        header {
            text-align: center;
            padding: 200px;
        }
    </style>
</head>

<body>

    <video class="bg-video" src="{{ asset('images/sunset.mp4') }}" loop muted autoplay></video>
    <header>
        <img src="{{ asset('images/logo1.png') }}" alt="Logo1" class= "logo">
        <br>
        <h1>
            <font color= "#f5faf5"> Selamat Datang Mohon Login atau Register terlebih dahulu </font>
        </h1>


        <br>
        <div class="">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-primary">Dashboard</a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
                    <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
                @endauth
            @endif
        </div>
    </header>


    <section class="" style="background-color: rgba(94, 121, 243, 0.941);">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Company name
                    </h6>
                    <p> WISLAM atau disebut wisata lampung adalah website yang dibuat untuk pendaftaran di pantai
                        lampung berbagai paket yang tersedia.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Products
                    </h6>
                    <p>
                        <a href="https://www.php.net/" class="text-reset">PHP</a>
                    </p>
                    <p>
                        <a href="https://getbootstrap.com/" class="text-reset">Boostrap</a>
                    </p>
                    <p>
                        <a href="https://www.w3schools.com/js/" class="text-reset">Javascript</a>
                    </p>
                    <p>
                        <a href="https://laravel.com/" class="text-reset">Laravel</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Pricing</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Settings</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Orders</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Help</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i> Lampung,Bandar Lampung,Indonesia</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        info@wislam.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> + 62 81 01 02 22</p>
                    <p><i class="fas fa-print me-3"></i> + 62 83 22 12 11</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>

    <footer class="bg-body-tertiary text-center">

        <div class="text-center p-3" style="background-color: rgb(240, 182, 37);">
            © 2024 Digital Talent Junior Web Developer :
            <a class="text-body" href="#">M. Denny Tri Lisandi</a>
        </div>

    </footer>
</body>

</html>
