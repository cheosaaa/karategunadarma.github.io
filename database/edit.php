<?php
include 'koneksi.php';
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM pendaftaran_anggota WHERE id_pendaftar='$id'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $no_wa = $_POST['no_wa'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $alasan = $_POST['alasan'];

    $update = "UPDATE pendaftaran_anggota SET 
                nama='$nama', nim='$nim', no_wa='$no_wa', 
                jurusan='$jurusan', email='$email', alasan='$alasan' 
               WHERE id_pendaftar='$id'";

    if (mysqli_query($conn, $update)) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Gagal update data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Pendaftar</title>
</head>
<body>
    <h2>Edit Data Pendaftar</h2>
    <form method="POST">
        Nama: <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required><br><br>
        NIM: <input type="text" name="nim" value="<?php echo $data['nim']; ?>" required><br><br>
        No WA: <input type="text" name="no_wa" value="<?php echo $data['no_wa']; ?>" required><br><br>
        Jurusan: <input type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo $data['email']; ?>" required><br><br>
        Alasan: <textarea name="alasan" required><?php echo $data['alasan']; ?></textarea><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
