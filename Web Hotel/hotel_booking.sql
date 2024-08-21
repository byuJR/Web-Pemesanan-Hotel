CREATE DATABASE hotel_booking;

USE hotel_booking;

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pemesan VARCHAR(255) NOT NULL,
    nomor_identitas VARCHAR(16) NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    tipe_kamar VARCHAR(50) NOT NULL,
    durasi_menginap INT NOT NULL,
    discount DECIMAL(5,2) NOT NULL,
    total_bayar DECIMAL(10,2) NOT NULL
);