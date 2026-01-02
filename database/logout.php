<?php
session_start();
session_destroy();

// arahkan ke halaman utama
header("Location: ../index.html");
exit;
?>
