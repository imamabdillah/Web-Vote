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

	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($koneksi, $query);

	if (mysqli_num_rows($result) > 0) {
		$user = mysqli_fetch_assoc($result);

		$_SESSION['username'] = $user['username'];
		$_SESSION['id'] = $user['id'];
		$_SESSION['has_vote'] = $user['has_vote'];

		if ($user['has_vote'] == 0) {
			header("Location: index1.php");
			exit;
		} elseif ($user['has_vote'] == 1) {
			header("Location: sukses_vote.php");
			exit;
		}
	} else {
		echo '<script language="javascript">';
		echo 'alert ("Username/Password ada yang salah, atau akun anda belum Aktif, Jika ada kendala bisa hubungi ADMIN")';
		echo '</script>';
		header("Location: login.php");
		exit;
	}
}
