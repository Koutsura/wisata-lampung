<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <link href="images/icon.png" rel="shortcut icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    {{--  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">  --}}

    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        background-color: #2b3133;

    }

    .logo {
        width: 200px;
        height: auto;
    }

    .profil {
        width: 50px;
        height: auto;
    }




    @keyframes slideInUp {
        from {
            transform: translateY(100%);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }



    .container {
        display: flex;
        align-items: flex-start;
    }

    .content {
        flex: 1;
    }




    p {
        text-align: justify;
        max-width: 100%;
        /* Sesuaikan agar tidak meluber */
        padding-right: 20px;
        /* Menambahkan padding di sebelah kanan */
    }
</style>


<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class= "logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cara Memesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('pesanan') }}">Pesanan</a>
                    </li>
                    @if (auth()->user()->role == 'superadmin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('hakakses.index') }}">Role</a>
                        </li>
                    @endif
                </ul>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ asset('images/profil.jpg') }}" alt="profil" class= "profil">
                        <div class="d-sm-none d-lg-inline-block">
                            Hai, {{ auth()->check() ? substr(auth()->user()->name, 0, 10) : 'Tamu' }}
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title">
                            Selamat Datang, {{ auth()->check() ? substr(auth()->user()->name, 0, 10) : 'Tamu' }}
                        </div>
                        <a class="dropdown-item has-icon edit-profile" href="{{ route('profile.edit') }}"
                            data-id="{{ \Auth::id() }}">
                            <i class="fa fa-user"></i> Edit Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                            onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




    <br>
    <div class="card text-center">
        <div class="card-header">
            Paket 1
        </div>
        <div class="card-body">
            <h5 class="card-title">Pantai Tiska</h5>
            <p class="card-text">Lokasi: Terletak di Kecamatan Kalianda, Kabupaten Lampung Selatan.</p>
            <a href="{{ route('tiska.index') }}" class="btn btn-primary">Pesanan Saya</a>
        </div>

    </div>

    <br>
    <div class="card text-center">
        <div class="card-header">
            Paket 2
        </div>
        <div class="card-body">
            <h5 class="card-title">Pantai Marina</h5>
            <p class="card-text">Lokasi: Terletak di Kecamatan Kalianda, Kabupaten Lampung Selatan.</p>
            <a href="{{ route('marina.index') }}" class="btn btn-primary">Pesanan Saya</a>
        </div>

    </div>
    <br>
    <div class="card text-center">
        <div class="card-header">
            Paket 3
        </div>
        <div class="card-body">
            <h5 class="card-title">Pantai Kedu Warna</h5>
            <p class="card-text">Lokasi: Pantai ini berada di Kabupaten Pesawaran, Lampung.</p>
            <a href="{{ route('kedu_warna.index') }}" class="btn btn-primary">Pesanan Saya</a>
        </div>

    </div>
    <br>
    <div class="card text-center">
        <div class="card-header">
            Paket 4
        </div>
        <div class="card-body">
            <h5 class="card-title">Pantai Sanggar</h5>
            <p class="card-text">Lokasi: Pantai Sanggar terletak di Kabupaten Tanggamus, Lampung.</p>
            <a href="{{ route('sanggar.index') }}" class="btn btn-primary">Pesanan Saya</a>
        </div>

    </div>
    <br>





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
