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
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Hak Akses</h1>
        </div>
        <form action="{{ route('hakakses.update', $hakakses->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Hak Akses</label>
                <input type="text" name="role" id="role" class="form-control" value="{{ $hakakses->role }}">
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
</div>
</section>
</div>
