<?php
include 'config.php';
session_start();

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] == 'admin') {
                    header("Location: admin/index.php");
                } else {
                    header("Location: pagers/verify.php");
                }
                exit;
            } else {
                $msg = "❌ Password salah.";
            }
        } else {
            $msg = "⚠️ Username tidak ditemukan.";
        }
    } else {
        $msg = "Mohon isi semua kolom.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login - Wedding Guest</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&family=Great+Vibes&display=swap"
        rel="stylesheet">
    <style>
    body {
        margin: 0;
        font-family: "Poppins", sans-serif;
        background: url("images/background.png") center/cover fixed no-repeat;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #555;
    }

    .login-box {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(5px);
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        width: 360px;
        padding: 2rem 2.5rem;
        text-align: center;
        animation: fadeIn 0.8s ease-in;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h1 {
        font-family: "Great Vibes", cursive;
        font-size: 3rem;
        color: #d6336c;
        margin-bottom: 1rem;
    }

    input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 10px;
        border: 1px solid #f8a1c4;
        font-size: 1rem;
    }

    button {
        background: linear-gradient(90deg, #f8a1c4, #f9d1d1);
        border: none;
        padding: 12px 25px;
        border-radius: 25px;
        color: white;
        font-weight: 500;
        cursor: pointer;
        transition: 0.3s;
        width: 100%;
    }

    button:hover {
        transform: scale(1.05);
        background: linear-gradient(90deg, #f7b2c6, #f8dada);
    }

    .msg {
        margin-top: 10px;
        color: #b64260;
        font-weight: 500;
        min-height: 24px;
    }

    footer {
        margin-top: 20px;
        font-size: 0.9rem;
        color: #777;
    }
    </style>
</head>

<body>
    <div class="login-box">
        <h1>💍 Wedding Login</h1>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Masuk</button>
        </form>
        <p class="msg"><?= htmlspecialchars($msg) ?></p>
        <footer>✨ Cinta Abadi Rizqiya & Akmal ✨</footer>
    </div>
</body>

</html>