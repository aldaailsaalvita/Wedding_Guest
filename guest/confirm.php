<?php
include '../inc/db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$status = $_POST['status'];
$plus_one = $_POST['plus_one'];

$stmt = $conn->prepare("INSERT INTO guests (name, email, status, plus_one) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $name, $email, $status, $plus_one);

if ($stmt->execute()) {
    echo "
    <div style='font-family:Poppins;text-align:center;margin-top:100px;'>
      <h2 style='color:#e17b9c;font-family:Great Vibes;'>Terima kasih, $name 💖</h2>
      <p>Konfirmasi Anda telah kami terima. Sampai jumpa di hari bahagia kami!</p>
      <a href='../index.php'><button style='margin-top:20px;background:#f8a1c4;border:none;color:white;padding:10px 20px;border-radius:20px;'>Kembali</button></a>
    </div>";
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}
?>