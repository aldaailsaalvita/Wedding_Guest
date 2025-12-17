<?php include 'inc/db.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Rizqiya & Akmal Wedding Invitation</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;500&display=swap"
        rel="stylesheet">
</head>


<body>

    <div class="hero">
        <div class="overlay">
            <h1>💍 Rizqiya & Akmal</h1>
            <p>Dua hati, satu janji <br> Kini kami melangkah bersama dalam kisah cinta yang ingin kami rayakan bersama
                Anda
            </p>
        </div>
    </div>

    <div class="content">
        <section>
            <h2>💕 LOVE</h2>
            <p>Dari pertemuan kecil tumbuh rasa yang besar. Dari percakapan singkat lahir janji yang kekal. Kini, di
                bawah langit yang sama, kami mengikat cinta menjadi satu cerita dan dengan penuh syukur, kami ingin
                membaginya dengan Anda.</p>
        </section>

        <section>
            <h2>📅 Hari Bahagia Kami</h2>
            <p>Sabtu, 14 Desember 2025<br>🏨 Hotel Grand Aluna, Bandung<br>🕙 Pukul 10.00 WIB <br> <br> Dengan penuh
                cinta dan syukur, kami mengundang Anda untuk menjadi bagian dari awal perjalanan baru kami. Hadir dan
                doakan langkah kami menuju kebahagiaan yang abadi. </p>
            <p> 👗 Dress Code: <br> Nuansa Pastel Elegan — warna lembut seperti blush, cream, dusty blue, atau sage
                green. </p>
        </section>

        <section>
            <h2>🎉 RSVP (Konfirmasi Kehadiran)</h2>
            <form action="guest/confirm.php" method="POST">
                <input type="text" name="name" placeholder="Nama Lengkap" required>
                <input type="email" name="email" placeholder="Email (opsional)">
                <select name="status" required>
                    <option value="">Apakah Anda akan hadir?</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Tidak Hadir">Tidak Hadir</option>
                </select>
                <select name="plus_one" required>
                    <option value="0">Datang Sendiri</option>
                    <option value="1">+1 Orang</option>
                    <option value="2">+2 Orang</option>
                </select>
                <button type="submit">Kirim Konfirmasi</button>
            </form>
        </section>
    </div>

    <footer>
        <p>💗 Terima kasih telah menjadi bagian dari hari bahagia kami ©aldaailsaalvita_221011401324 💗</p>
    </footer>

    <!-- Dekorasi bunga-bunga beterbangan -->
    <div class="flower-floating">
        <span class="petal"></span>
        <span class="petal"></span>
        <span class="petal"></span>
        <span class="petal"></span>
        <span class="petal"></span>
        <span class="petal"></span>
        <span class="petal"></span>
        <span class="petal"></span>
        <span class="petal"></span>
    </div>


</body>

</html>