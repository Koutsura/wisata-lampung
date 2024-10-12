<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pantai Kedu Warna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .form-container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .form-group input[type="checkbox"] {
            width: auto;
        }

        .form-actions {
            text-align: center;
        }

        .form-actions button {
            padding: 10px 15px;
            margin: 5px;
        }

        .btn-save {
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn-calculate {
            background-color: dodgerblue;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn-reset {
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <form action="{{ route('kedu_warna.update', $kedu_warna->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Pemesan:</label>
                <input type="text" id="nama" name="nama" value="{{ $kedu_warna->nama }}" maxlength="500">
            </div>

            <div class="form-group">
                <label for="nmr_tlp">Nomor HP/Telp:</label>
                <input type="text" id="nmr_tlp" name="nmr_tlp" value="{{ $kedu_warna->nmr_tlp }}" maxlength="100">
            </div>

            <div class="form-group">
                <label for="tgl">Tanggal Pesan:</label>
                <input type="date" id="tgl" name="tgl" value="{{ $kedu_warna->tgl }}">
            </div>

            <div class="form-group">
                <label for="jml_psr">Jumlah Peserta:</label>
                <input type="number" id="jml_psr" name="jml_psr" value="{{ $kedu_warna->jml_psr }}" maxlength="100">
            </div>

            <div class="form-group">
                <label for="jml_hr">Waktu Pelaksanaan Perjalanan:</label>
                <input type="text" id="jml_hr" name="jml_hr" value="{{ $kedu_warna->jml_hr }}" maxlength="100">
            </div>

            <div class="form-group">
                <label>Pelayanan Paket Perjalanan:</label>
                <div>
                    <input type="checkbox" id="akomodasi" name="services[]" value="Penginapan"
                        {{ $kedu_warna->akomodasi == 'Y' ? 'checked' : '' }}>
                    <label for="akomodasi">Penginapan (Rp 100.000)</label>
                </div>
                <div>
                    <input type="checkbox" id="transport" name="services[]" value="Transportasi"
                        {{ $kedu_warna->transport == 'Y' ? 'checked' : '' }}>
                    <label for="transport">Transportasi (Rp 580.000)</label>
                </div>
                <div>
                    <input type="checkbox" id="service" name="services[]" value="Servis/Makan"
                        {{ $kedu_warna->service == 'Y' ? 'checked' : '' }}>
                    <label for="service">Servis/Makan (Rp 250.000)</label>
                </div>
            </div>

            <div class="form-group">
                <label for="hrg_pkt">Harga Paket Perjalanan:</label>
                <input type="text" id="hrg_pkt" name="hrg_pkt" "{{ $kedu_warna->hrg_pkt }}" readonly>
            </div>

            <div class="form-group">
                <label for="ttl_tgh">Jumlah Tagihan:</label>
                <input type="text" id="ttl_tgh" name="ttl_tgh" "{{ $kedu_warna->jml_hr }}" readonly>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-save">Update</button>
                <button type="button" class="btn-calculate" onclick="calculateTotal()">Hitung</button>
                <button type="reset" class="btn-reset">Reset</button>
            </div>
        </form>
    </div>

    <script>
        function calculateTotal() {
            const services = document.querySelectorAll('input[name="services[]"]:checked');
            const jml_psr = document.getElementById('jml_psr').value;
            let totalPrice = 0;

            services.forEach(service => {
                if (service.value === 'Penginapan') {
                    totalPrice += 100000;
                } else if (service.value === 'Transportasi') {
                    totalPrice += 580000;
                } else if (service.value === 'Servis/Makan') {
                    totalPrice += 250000;
                }
            });

            document.getElementById('hrg_pkt').value = totalPrice;
            document.getElementById('ttl_tgh').value = totalPrice * jml_psr;
        }
    </script>

</body>

</html>
