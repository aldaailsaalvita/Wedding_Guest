<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wedding_guest2";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) die("Koneksi gagal: " . $conn->connect_error);

$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

$conn->query("CREATE TABLE IF NOT EXISTS guests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    status ENUM('Belum Konfirmasi','Hadir','Tidak Hadir') DEFAULT 'Belum Konfirmasi',
    plus_one INT DEFAULT 0
)");

$conn->query("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    role ENUM('admin','pager') NOT NULL
)");

$check = $conn->query("SELECT * FROM users");
if($check->num_rows == 0){
    $conn->query("INSERT INTO users (username,password,role) VALUES
        ('admin', '".password_hash('admin123', PASSWORD_DEFAULT)."', 'admin'),
        ('pager', '".password_hash('pager123', PASSWORD_DEFAULT)."', 'pager')
    ");
}

echo "<h2>✅ Database dan akun default berhasil dibuat!</h2>";
echo "<p>Admin login: <b>admin / admin123</b></p>";
echo "<p>Pager login: <b>pager / pager123</b></p>";
echo "<a href='index.php'>👉 Buka halaman utama</a>";
?>
