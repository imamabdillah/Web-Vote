<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/dosenstaff/profil.php"; break;
	case 'edit': include "modul/dosenstaff/edit.php"; break;
	case 'update': include "modul/dosenstaff/update.php"; break;
	case 'profil': include "modul/dosenstaff/profil.php"; break;
	case 'pilihan': include "modul/dosenstaff/pilihan.php"; break;
}
?>
