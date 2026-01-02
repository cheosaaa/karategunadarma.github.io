<?php
session_start();
include 'koneksi.php';

// Cek apakah sudah login
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}

// Ambil data dari tabel pendaftaran_anggota
$sql = "SELECT * FROM pendaftaran_anggota ORDER BY id_pendaftar DESC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Data Pendaftar</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }
        .topbar {
            text-align: center;
            margin-top: 10px;
        }
        .logout {
            background: #c0392b;
            color: #fff;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }
        .logout:hover {
            background: #e74c3c;
        }
        table {
            width: 95%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        th {
            background: #333;
            color: #fff;
            padding: 12px;
            text-transform: uppercase;
            font-size: 14px;
        }
        td {
            padding: 10px;
            text-align: center;
            color: #444;
            font-size: 14px;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        tr:hover {
            background: #f1f1f1;
        }
        .aksi a {
            margin: 0 5px;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 12px;
        }
        .aksi .edit {
            background: #2980b9;
            color: #fff;
        }
        .aksi .edit:hover {
            background: #3498db;
        }
        .aksi .hapus {
            background: #c0392b;
            color: #fff;
        }
        .aksi .hapus:hover {
            background: #e74c3c;
        }
    </style>
</head>
<body>
    <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['username']); ?>!</h2>
    <div class="topbar">
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>No WA</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>Alasan</th>
            <th>Aksi</th>
        </tr>
        <?php
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                        <td>".$row['id_pendaftar']."</td>
                        <td>".$row['nama']."</td>
                        <td>".$row['nim']."</td>
                        <td>".$row['no_wa']."</td>
                        <td>".$row['jurusan']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['alasan']."</td>
                        <td class='aksi'>
                            <a class='edit' href='edit.php?id=".$row['id_pendaftar']."'>Edit</a>
                            <a class='hapus' href='hapus.php?id=".$row['id_pendaftar']."' onclick=\"return confirm('Yakin mau hapus data ini?');\">Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Belum ada pendaftar</td></tr>";
        }
        ?>
    </table>
</body>
</html>
