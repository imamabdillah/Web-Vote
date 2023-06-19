<?php
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Hapus sesi
session_destroy();

// Arahkan pengguna ke halaman login
header("Location: ../../index.php");
exit;
