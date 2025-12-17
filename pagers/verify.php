<?php
include '../config.php';
session_start();

// pastikan hanya pager yang bisa masuk
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'pager') {
    header("Location: ../login.php");
    exit;
}

// update status kehadiran di tempat (checkin_status)
if (isset($_GET['checkin'])) {
    $id = intval($_GET['checkin']);
    $conn->query("UPDATE guests SET checkin_status='Sudah Masuk' WHERE id=$id");
    header("Location: verify.php");
    exit;
}

// ambil semua tamu
$result = $conn->query("SELECT * FROM guests ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Verifikasi Tamu - Wedding Guest</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&family=Great+Vibes&display=swap"
        rel="stylesheet">
    <style>
    body {
        margin: 0;
        font-family: "Poppins", sans-serif;
        background: url("../images/background.png") center/cover fixed no-repeat;
        color: #444;
    }

    .container {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(5px);
        border-radius: 20px;
        max-width: 950px;
        margin: 80px auto;
        padding: 2rem 3rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    h1 {
        font-family: "Great Vibes", cursive;
        text-align: center;
        font-size: 3rem;
        color: #d6336c;
        margin-bottom: 2rem;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }

    th,
    td {
        border-bottom: 1px solid #f8a1c4;
        padding: 10px;
        text-align: center;
    }

    th {
        background: #fde2e4;
        color: #b64260;
    }

    tr:hover {
        background: rgba(255, 240, 245, 0.6);
    }

    .btn {
        background: linear-gradient(90deg, #f8a1c4, #f9d1d1);
        border: none;
        color: white;
        padding: 6px 15px;
        border-radius: 20px;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .logout {
        position: absolute;
        top: 15px;
        right: 20px;
        color: #d6336c;
        text-decoration: none;
        font-weight: bold;
    }

    footer {
        text-align: center;
        margin-top: 2rem;
        color: #8c5a6e;
    }

    /* Bunga-bunga terbang */
    .flower {
        position: fixed;
        width: 25px;
        height: 25px;
        background: url("https://cdn-icons-png.flaticon.com/512/861/861205.png") no-repeat center/contain;
        opacity: 0.8;
        animation: float 15s linear infinite;
        pointer-events: none;
        z-index: 100;
    }

    @keyframes float {
        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
        }

        100% {
            transform: translateY(100vh) rotate(360deg);
            opacity: 0;
        }
    }
    </style>
</head>

<body>
    <a href="../logout.php" class="logout">Logout</a>

    <div class="container">
        <h1>🌸 Verifikasi Kedatangan</h1>

        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status RSVP</th>
                <th>Status Check-in</th>
                <th>Plus One</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['status']) ?></td>
                <td>
                    <?php if ($row['checkin_status'] === 'Sudah Masuk') : ?>
                    <span style="color:green;font-weight:bold;">✔ Sudah Masuk</span>
                    <?php else : ?>
                    <span style="color:#d6336c;">Belum Masuk</span>
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($row['plus_one']) ?></td>
                <td>
                    <?php if ($row['checkin_status'] !== 'Sudah Masuk') : ?>
                    <a class="btn" href="?checkin=<?= $row['id'] ?>">✅ Tandai Hadir</a>
                    <?php else : ?>
                    <span style="color:#888;">✔ Selesai</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <footer>✨ Selamat Bertugas, Pager Ayu! ✨</footer>
    </div>

    <!-- efek bunga terbang -->
    <script>
    const total = 15;
    for (let i = 0; i < total; i++) {
        const flower = document.createElement("div");
        flower.classList.add("flower");
        flower.style.left = Math.random() * 100 + "vw";
        flower.style.animationDuration = (10 + Math.random() * 10) + "s";
        flower.style.width = flower.style.height = (20 + Math.random() * 15) + "px";
        document.body.appendChild(flower);
    }
    </script>
</body>

</html>