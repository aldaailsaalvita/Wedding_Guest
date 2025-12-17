<?php
session_start();
include '../config.php';

// Hanya admin yang bisa hapus
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM guests WHERE id = $id");
}

header("Location: index.php");
exit;
?>