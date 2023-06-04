<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/mahasiswa/tampil.php"; break;
	case 'tambah': include "modul/mahasiswa/tambah.php"; break;
	case 'simpan': include "modul/mahasiswa/simpan.php"; break;
	case 'edit': include "modul/mahasiswa/edit.php"; break;
	case 'update': include "modul/mahasiswa/update.php"; break;
	case 'hapus': include "modul/mahasiswa/hapus.php"; break;
	case 'detail': include "modul/mahasiswa/detail.php"; break;
	case 'profil': include "modul/mahasiswa/profil.php"; break;
}
?>
