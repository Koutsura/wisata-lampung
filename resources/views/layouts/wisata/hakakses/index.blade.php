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

<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        {{--  background-color: #2b3133;  --}}
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
                        <a class="nav-link" href="{{ route('pesanan') }}">Pesanan</a>
                    </li>
                    @if (auth()->user()->role == 'superadmin')
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('hakakses.index') }}">Role</a>
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


    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Hak Akses</h1>
            </div>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="section-body">
                <div class="table-responsive">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form action="{{ route('hakakses.index') }}" method="GET">

                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hakakses as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->role }}</td>

                                    <td>
                                        <a href="{{ route('hakakses.edit', $item->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ route('hakakses.delete', $item->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td> <!-- Add Edit and Delete buttons for each row -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</body>

<!-- JS Libraries -->

<!-- Page Specific JS File -->
