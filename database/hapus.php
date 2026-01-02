<?php
include 'koneksi.php';
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$sql = "DELETE FROM pendaftaran_anggota WHERE id_pendaftar='$id'";

if (mysqli_query($conn, $sql)) {
    header("Location: dashboard.php");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($conn);
}
?>
