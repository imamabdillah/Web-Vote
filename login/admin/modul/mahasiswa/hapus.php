<?php
if(isset($_GET['nis'])){
	include "../sambungan.php";
	$id=$_GET['nis'];
	$sql   = "SELECT * FROM mahasiswa WHERE nis='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	$r     = mysqli_fetch_array($hapus);
	if ($r['foto']!=''){
		$foto=$r['foto'];
		// hapus file gambar yang berhubungan dengan berita tersebut
		unlink("../gambar/mahasiswa/$foto");
	}
	$sql   = "DELETE FROM mahasiswa WHERE nis='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
		header("Location: ?m=mahasiswa");
	}else{
		include "index.php?m=mahasiswa&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal dihapus.")';
		echo '</script>';
	}
}
?>
