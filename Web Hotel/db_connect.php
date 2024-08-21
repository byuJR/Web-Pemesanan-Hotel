<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "hotel_booking";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} 
?>