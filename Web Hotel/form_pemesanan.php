<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- Include Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Form Pemesanan</h2>
            <?php
            // Contoh data hotel
            $hotels = [
                1 => [
                    "title" => "Standar",
                    "price" => "600000"
                ],
                2 => [
                    "title" => "Deluxe",
                    "price" => "800000"
                ],
                3 => [
                    "title" => "Family",
                    "price" => "1815000"
                ]
            ];

            // Ambil ID hotel dari URL
            $id = $_GET['id'];
            $hotel = $hotels[$id];

            // Proses penyimpanan data ke database
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nama_pemesan = $_POST['namaPemesan'];
                $nomor_identitas = $_POST['nomorIdentitas'];
                $jenis_kelamin = $_POST['jenisKelamin'];
                $tipe_kamar = $_POST['tipeKamar'];
                $durasi_menginap = $_POST['durasiMenginap'];
                $total_bayar = $_POST['totalBayar'];
                $discount = ($durasi_menginap > 3) ? 10 : 0;

                // Impor file koneksi database
                require 'db_connect.php';

                // Simpan data ke tabel bookings
                $sql = "INSERT INTO bookings (nama_pemesan, nomor_identitas, jenis_kelamin, tipe_kamar, durasi_menginap, discount, total_bayar)
                        VALUES ('$nama_pemesan', '$nomor_identitas', '$jenis_kelamin', '$tipe_kamar', $durasi_menginap, $discount, $total_bayar)";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>toastr.success('Data berhasil disimpan');</script>";
                } else {
                    echo "<script>toastr.error('Error: " . $sql . "<br>" . $conn->error . "');</script>";
                }

                $conn->close();
            }
            ?>
            <form id="bookingForm" method="POST" action="">
                <div class="mb-3">
                    <label for="namaPemesan" class="form-label">Nama Pemesan</label>
                    <input type="text" class="form-control" id="namaPemesan" name="namaPemesan" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <div>
                        <input type="radio" id="lakiLaki" name="jenisKelamin" value="Laki-laki" required>
                        <label for="lakiLaki">Laki-laki</label>
                        <input type="radio" id="perempuan" name="jenisKelamin" value="Perempuan" required>
                        <label for="perempuan">Perempuan</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nomorIdentitas" class="form-label">Nomor Identitas</label>
                    <input type="text" class="form-control" id="nomorIdentitas" name="nomorIdentitas" maxlength="16" required>
                </div>
                <div class="mb-3">
                    <label for="tipeKamar" class="form-label">Tipe Kamar</label>
                    <input type="text" class="form-control" id="tipeKamar" name="tipeKamar" value="<?php echo $hotel['title']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga" value="<?php echo number_format($hotel['price'], 0, ',', '.'); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="tanggalPesan" class="form-label">Tanggal Pesan</label>
                    <input type="text" class="form-control" id="tanggalPesan" placeholder="DD/MM/YYYY" required>
                </div>
                <div class="mb-3">
                    <label for="durasiMenginap" class="form-label">Durasi Menginap</label>
                    <input type="number" class="form-control" id="durasiMenginap" name="durasiMenginap" required>
                    <small class="form-text text-muted">Pesan lebih dari 3 hari mendapatkan diskon 10%</small>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="termasukBreakfast">
                    <label class="form-check-label" for="termasukBreakfast">Termasuk Breakfast</label>
                    <small class="form-text text-muted">Termasuk breakfast dikenakan tambahan Rp80.000</small>
                </div>
                <div class="mb-3">
                    <label for="totalBayar" class="form-label">Total Bayar</label>
                    <input type="text" class="form-control" id="totalBayar" name="totalBayar" readonly>
                </div>
                <button type="button" class="btn btn-primary" onclick="hitungTotalBayar()">Hitung Total Bayar</button>
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary" onclick="window.history.back()">Cancel</button>
            </form>
        </div>
    </div>
    <!-- Include Bootstrap JS scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <!-- Include Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        function hitungTotalBayar() {
            const harga = parseFloat(document.getElementById('harga').value.replace(/\./g, ''));
            const durasiMenginap = parseInt(document.getElementById('durasiMenginap').value);
            const termasukBreakfast = document.getElementById('termasukBreakfast').checked;
            let total = harga * durasiMenginap;

            if (durasiMenginap > 3) {
                total *= 0.9; // Diskon 10%
            }

            if (termasukBreakfast) {
                total += 80000;
            }

            document.getElementById('totalBayar').value = total.toFixed(2);
        }

        document.getElementById('bookingForm').addEventListener('submit', function(event) {
            const nomorIdentitas = document.getElementById('nomorIdentitas').value;
            if (nomorIdentitas.length !== 16 || isNaN(nomorIdentitas)) {
                toastr.error('Isian salah..data harus 16 digit');
                event.preventDefault();
            }
        });
    </script>
    <!-- Tambahkan tombol untuk menampilkan display_booking.php -->
    <div class="text-center my-4">
            <a href="display_booking.php" class="btn btn-success">Lihat Booking</a>
        </div>
</body>
</html>