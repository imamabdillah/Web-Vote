<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "mahasiswauns");

if (mysqli_connect_error()) {
    echo "Koneksi gagal: " . mysqli_connect_error();
    exit;
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    // Periksa apakah username sudah digunakan
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">';
        echo 'alert("Username sudah digunakan. Silakan gunakan username lain.")';
        echo '</script>';
        header("Location: register.php");
        exit;
    }

    // Tambahkan pengguna baru ke basis data
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($koneksi, $query)) {
        echo '<script language="javascript">';
        echo 'alert("Registrasi berhasil. Silakan login menggunakan akun yang telah dibuat.")';
        echo '</script>';
        header("Location: login.php");
        exit;
    } else {
        echo '<script language="javascript">';
        echo 'alert("Gagal menyimpan data pengguna. Silakan coba lagi.")';
        echo '</script>';
        header("Location: register.php");
        exit;
    }
}
