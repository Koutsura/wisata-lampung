<head>
    <title>Data Kedu Warna</title>
    <link href="images/icon.png" rel="shortcut icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    {{--  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">  --}}

    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    {{--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  --}}

</head>
</head>
<div class="section-header">
    <h1>Data Kedu Warna</h1>
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

                <form action="{{ route('kedu_warna.index') }}" method="GET">
                </form>
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali halaman utama</a>
        <br>
        <br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Pemesan</th>
                    <th>Nomor HP/Telp</th>
                    <th>Tanggal Pesan</th>
                    <th>Jumlah Peserta</th>
                    <th>Waktu Pelaksanaan Perjalanan</th>
                    <th>Pelayanan Paket Perjalanan</th>
                    <th>Transportasi</th>
                    <th>Servis/Makan</th>
                    <th>Harga Paket Perjalanan</th>
                    <th>Jumlah Tagihan</th>
                    @if (auth()->user()->role == 'superadmin')
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($kedu_warna as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nmr_tlp }}</td>
                        <td>{{ $item->tgl }}</td>
                        <td>{{ $item->jml_psr }}</td>
                        <td>{{ $item->jml_hr }}</td>
                        <td>{{ $item->akomodasi }}</td>
                        <td>{{ $item->transport }}</td>
                        <td>{{ $item->service }}</td>
                        <td>{{ $item->hrg_pkt }}</td>
                        <td>{{ $item->ttl_tgh }}</td>
                        @if (auth()->user()->role == 'superadmin')
                            <td>
                                <a href="{{ route('kedu_warna.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('kedu_warna.delete', $item->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</section>
</div>

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<!-- js untuk bootstrap4  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
<!-- js untuk select2  -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $("#kota").select2({
            theme: 'bootstrap4',
            placeholder: "Please Select"
        });

        $("#kota2").select2({
            theme: 'bootstrap4',
            placeholder: "Please Select"
        });
    });
</script>
