<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];

    mysqli_query($koneksi, "UPDATE kandidat SET nama='$nama', visi='$visi', misi='$misi' WHERE id='$id'") or die(mysqli_error($koneksi));
}

$koneksi->close();
header("Location: index.php");
exit();
