<?php


$koneksi = mysqli_connect("localhost","root","","mahasiswauns");

if (mysqli_connect_error()) {
	echo "koneksi peset".mysqli_connect();
}

$user = $_POST['username'];
$pass = $_POST['password'];
$sql = "SELECT * FROM db_admin WHERE username='$user' AND password='$pass'";
$login=mysqli_query($koneksi,$sql);
if ($login == false) {
	echo "Error: " . mysqli_error($koneksi);
  } else {
	$ketemu = mysqli_num_rows($login);
	$b = mysqli_fetch_object($login);
}

if(mysqli_num_rows($login) > 0){
	echo '<script>window.location="index.php"</script>';
}else{
	echo '<script language="javascript">';
		echo 'alert ("Username/Password ada yang salah, atau akun anda belum Aktif ,Jika ada kendala bisa hubungi ADMIN")';
	echo '</script>';
	echo '<script>window.location="login.php"</script>';
}
?>
