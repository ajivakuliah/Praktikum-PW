<?php
session_start();
session_unset();     // Hapus semua session
session_destroy();   // Hapus data session
header("Location: login.php"); // Arahkan ke halaman login
exit();
?>
