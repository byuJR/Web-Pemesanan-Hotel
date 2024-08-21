<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="card">
            <div class="card-body text-center">
                <h2 class="my-4">Booking Details</h2>
                <?php
                // Impor file koneksi database
                require 'db_connect.php';

                // Ambil data booking terakhir
                $sql = "SELECT * FROM bookings ORDER BY id DESC LIMIT 1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Tampilkan data booking
                    while($row = $result->fetch_assoc()) {
                        echo "<p><strong>Nama Pemesan:</strong> " . $row["nama_pemesan"] . "</p>";
                        echo "<p><strong>Nomor Identitas:</strong> " . $row["nomor_identitas"] . "</p>";
                        echo "<p><strong>Jenis Kelamin:</strong> " . $row["jenis_kelamin"] . "</p>";
                        echo "<p><strong>Tipe Kamar:</strong> " . $row["tipe_kamar"] . "</p>";
                        echo "<p><strong>Durasi Menginap:</strong> " . $row["durasi_menginap"] . " Hari</p>";
                        echo "<p><strong>Discount:</strong> " . $row["discount"] . "%</p>";
                        echo "<p><strong>Total Bayar:</strong> Rp " . number_format($row["total_bayar"], 0, ',', '.') . "</p>";
                    }
                } else {
                    echo "<p>Tidak ada data booking.</p>";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS scripts -->
    <script src="path/to/jquery.min.js"></script>
    <script src="path/to/popper.min.js"></script>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>
</html>
