<?php
if(isset($_GET['nip'])){
	include "../sambungan.php";
	$id=$_GET['nip'];
	$sql   = "SELECT * FROM dosenstaff WHERE nip='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	$r     = mysqli_fetch_array($hapus);
	if ($r['foto']!=''){
		$foto=$r['foto'];
		// hapus file gambar yang berhubungan dengan berita tersebut
		unlink("../gambar/dosenstaff/$foto");
		$sql   = "DELETE FROM dosenstaff WHERE nip='$id'";
	}else{
		$sql   = "DELETE FROM dosenstaff WHERE nip='$id'";
	}
		
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=dosenstaff");
	}else{
		echo 'Data Kelas GAGAL di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>
