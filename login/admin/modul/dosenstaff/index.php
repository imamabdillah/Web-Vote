<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/dosenstaff/tampil.php"; break;
	case 'tambah': include "modul/dosenstaff/tambah.php"; break;
	case 'simpan': include "modul/dosenstaff/simpan.php"; break;
	case 'edit': include "modul/dosenstaff/edit.php"; break;
	case 'update': include "modul/dosenstaff/update.php"; break;
	case 'hapus': include "modul/dosenstaff/hapus.php"; break;
	case 'detail': include "modul/dosenstaff/detail.php"; break;
	case 'profil': include "modul/dosenstaff/profil.php"; break;
}
?>
