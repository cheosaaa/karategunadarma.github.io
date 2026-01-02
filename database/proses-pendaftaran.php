<?php
include 'koneksi.php';

$nama    = $_POST['nama'];
$nim     = $_POST['nim'];
$no_wa   = $_POST['no_wa'];
$jurusan = $_POST['jurusan'];
$email   = $_POST['email'];
$alasan  = $_POST['alasan'];

$sql = "INSERT INTO pendaftaran_anggota (nama, nim, no_wa, jurusan, email, alasan)
        VALUES ('$nama', '$nim', '$no_wa' ,'$jurusan', '$email', '$alasan')";

if ($conn->query($sql) === TRUE) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Pendaftaran Berhasil</title>
        <meta http-equiv="refresh" content="5;url=../about.html">
        <style>
            body {
                font-family: Arial, sans-serif;
                background: linear-gradient(135deg, #6a11cb, #2575fc);
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .card {
                background: #fff;
                padding: 30px 40px;
                border-radius: 12px;
                box-shadow: 0 8px 20px rgba(0,0,0,0.2);
                text-align: center;
                max-width: 400px;
            }
            .card h2 {
                color: #333;
                margin-bottom: 10px;
            }
            .card p {
                color: #555;
                margin-bottom: 20px;
            }
            .button {
                display: inline-block;
                background: #2575fc;
                color: #fff;
                padding: 10px 20px;
                border-radius: 6px;
                text-decoration: none;
                font-weight: bold;
                transition: background 0.3s;
            }
            .button:hover {
                background: #6a11cb;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <h2>✅ Terima Kasih, <?= htmlspecialchars($nama) ?>!</h2>
            <p>Pendaftaranmu berhasil disimpan.</p>
            <p>Anda akan diarahkan ke halaman <b>About</b> dalam 5 detik...</p>
            <a href="../about.html" class="button">Kembali Sekarang</a>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "<h3 style='color:red;'>Gagal menyimpan data: " . $conn->error . "</h3>";
}

$conn->close();
?>
