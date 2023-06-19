<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit;
}

// Fungsi untuk mengupdate jumlah suara dan menandai pengguna telah melakukan vote
function updateJumlahSuara($koneksi, $id)
{
	// Mengambil jumlah suara saat ini dari database
	$query = mysqli_query($koneksi, "SELECT jumlah_suara FROM kandidat WHERE id = $id");
	$row = mysqli_fetch_assoc($query);
	$jumlahSuara = $row['jumlah_suara'];

	// Menambahkan 1 suara
	$jumlahSuara++;

	// Mengupdate jumlah suara di database
	mysqli_query($koneksi, "UPDATE kandidat SET jumlah_suara = $jumlahSuara WHERE id = $id");
}

// Cek apakah tombol "Vote" diklik
if (isset($_POST['vote'])) {
	$idKandidat = $_POST['id_kandidat'];

	// Cek apakah pengguna sudah melakukan vote sebelumnya
	$id = $_SESSION['id']; // Diasumsikan Anda telah menyimpan ID pengguna dalam variabel sesi
	$query = mysqli_query($koneksi, "SELECT has_vote FROM users WHERE id = $id");
	$row = mysqli_fetch_assoc($query);
	$hasVote = $row['has_vote'];

	if ($hasVote == 0) {
		// Panggil fungsi untuk mengupdate jumlah suara dan menandai pengguna telah melakukan vote
		updateJumlahSuara($koneksi, $idKandidat);

		// Menandai pengguna telah melakukan vote dengan mengatur 'has_vote' menjadi 1
		mysqli_query($koneksi, "UPDATE users SET has_vote = 1 WHERE id = $id");

		// Redirect ke halaman sukses setelah voting
		header("Location: sukses_vote.php");
		exit;
	} else {
		// Redirect ke halaman error jika pengguna sudah melakukan vote sebelumnya
		exit;
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Vote</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="../../assets/img/favicon.png" rel="icon">
	<link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="../../assets/css/vote.css" rel="stylesheet">

	<!-- =======================================================
  * Template Name: Bootslander
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top d-flex align-items-center header-transparent">
		<div class="container d-flex align-items-center justify-content-between">

			<div class="logo">
				<h1><a href="index.html"><span>Bootslander</span></a></h1>
				<!-- Uncomment below if you prefer to use an image logo -->
				<!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
			</div>

			<nav id="navbar" class="navbar">
				<ul>
					<li><a class="nav-link scrollto active" href="#hero">Home</a></li>
					<li><a class="nav-link scrollto" href="#team">Team</a></li>
					<li><a class="nav-link scrollto" href="#contact">Contact</a></li>
					<li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav>
			<!-- .navbar -->

		</div>
	</header>
	<!-- End Header -->

	<!-- ======= Hero Section ======= -->
	<section id="hero">

		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
					<div data-aos="zoom-out">
						<h1>Selamat Datang</h1>
						<h2>Silahkan Pilih Kandidat</h2>
						<div class="text-center text-lg-start">
							<a href="#team" class="btn-get-started scrollto">Get Started</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
					<img src="../../assets/img/vote.png" class="img-fluid animated" alt="">
				</div>
			</div>
		</div>

		<svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
			<defs>
				<path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
			</defs>
			<g class="wave1">
				<use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
			</g>
			<g class="wave2">
				<use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
			</g>
			<g class="wave3">
				<use xlink:href="#wave-path" x="50" y="9" fill="#fff">
			</g>
		</svg>

	</section>
	<!-- End Hero -->

	<main id="main">
		<div class="status">
			<div class="timer" id="timer">00:00:00</div>
			<div class="progress-bar">
				<div class="progress" id="progress"></div>
			</div>
		</div>

		<!-- ======= Team Section ======= -->
		<section id="team" class="team">
			<div class="container">

				<div class="section-title" data-aos="fade-up">
					<h2>Kandidat</h2>
					<p>Kandidat Katua BEM</p>
				</div>

				<div class="row" data-aos="fade-left">
					<?php
					include "koneksi.php";

					// Mengambil data kandidat dengan ID 1
					$id1_query = mysqli_query($koneksi, "SELECT * FROM kandidat WHERE id = 1");
					$kandidat1 = mysqli_fetch_assoc($id1_query);

					// Mengambil data kandidat dengan ID 2
					$id2_query = mysqli_query($koneksi, "SELECT * FROM kandidat WHERE id = 2");
					$kandidat2 = mysqli_fetch_assoc($id2_query);
					?>

					<!-- Kandidat 1 -->
					<div class="col-lg-5 col-md-9 mt-7 mt-lg-0">
						<div class="member" data-aos="zoom-in" data-aos-delay="300">
							<div class="pic"><img src="../../assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
							<div class="member-info">
								<h4><?php echo $kandidat1['nama']; ?></h4>
								<h6>Visi</h6>
								<p><?php echo $kandidat1['visi']; ?></p>
								<h6>Misi</h6>
								<p><?php echo $kandidat1['misi']; ?></p>
								<form method="POST" action="">
									<input type="hidden" name="id_kandidat" value="<?php echo $kandidat1['id']; ?>">
									<button id="voteButton1" type="submit" name="vote" class="btn btn-primary" onclick="return konfirmasiVote()">Vote</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 mt-2 mt-lg-0">
					</div>
					<!-- Kandidat 2 -->
					<div class="col-lg-5 col-md-9 mt-7 mt-lg-0">
						<div class="member" data-aos="zoom-in" data-aos-delay="300">
							<div class="pic"><img src="../../assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
							<div class="member-info">
								<h4><?php echo $kandidat2['nama']; ?></h4>
								<h6>Visi</h6>
								<p><?php echo $kandidat2['visi']; ?></p>
								<h6>Misi</h6>
								<p><?php echo $kandidat2['misi']; ?></p>
								<form method="POST" action="">
									<input type="hidden" name="id_kandidat" value="<?php echo $kandidat2['id']; ?>">
									<button id="voteButton2" type="submit" name="vote" class="btn btn-primary" onclick="return konfirmasiVote()">Vote</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Team Section -->
		<!-- ======= Contact Section ======= -->
		<section id="contact" class="contact">
			<div class="container">

				<div class="section-title" data-aos="fade-up">
					<h2>Contact</h2>
					<p>Contact Us</p>
				</div>

				<div class="row">
					<div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
						<div class="info">
							<div class="address">
								<i class="bi bi-geo-alt"></i>
								<h4>Location:</h4>
								<p>Jalan Ir. Sutami 36 Kentingan, Jebres, Surakarta, Jawa Tengah, Indonesia 57126.</p>
							</div>

							<div class="email">
								<i class="bi bi-envelope"></i>
								<h4>Email:</h4>
								<p>bemuns@student.uns.ac.id</p>
							</div>

							<div class="phone">
								<i class="bi bi-phone"></i>
								<h4>Call:</h4>
								<p>087715245616</p>
							</div>

						</div>

					</div>
				</div>
			</div>
		</section>
		<!-- End Contact Section -->
	</main>
	<!-- End #main -->

	<!-- ======= Footer ======= -->
	<footer id="footer">
		<div class="container">
			<div class="copyright">
				&copy; Copyright <strong><span>bemuns</span></strong>. All Rights Reserved
			</div>
		</div>
	</footer>
	<!-- End Footer -->


	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
	<div id="preloader"></div>

	<!-- Vendor JS Files -->
	<script src="../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
	<script src="../../assets/vendor/aos/aos.js"></script>
	<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="../../assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="../../assets/js/pemilihan.js"></script>
	<script>
		function konfirmasiVote() {
			return confirm("Apakah Anda yakin ingin memilih kandidat ini?");
		}
	</script>
	<script>
		// Mengatur waktu awal pemilihan (dalam detik)
		var duration = 300; // misalnya 1 jam

		// Mengambil elemen timer, progress, dan tombol vote
		var timerElement = document.getElementById('timer');
		var progressElement = document.getElementById('progress');
		var voteButton = document.getElementById('voteButton');

		// Menghitung waktu yang tersisa dalam format jam:menit:detik
		function formatTime(seconds) {
			var hours = Math.floor(seconds / 3600);
			var minutes = Math.floor((seconds % 3600) / 60);
			var remainingSeconds = seconds % 60;

			return (
				hours.toString().padStart(2, '0') +
				':' +
				minutes.toString().padStart(2, '0') +
				':' +
				remainingSeconds.toString().padStart(2, '0')
			);
		}

		// Mengupdate timer dan progress bar setiap detik
		function updateTimer() {
			duration--;

			if (duration >= 0) {
				timerElement.innerHTML = formatTime(duration);
				progressElement.style.width = ((duration / 3600) * 100) + '%';

				// Cek apakah tersisa waktu kurang dari 10 detik
				if (duration <= 150) {
					progressElement.classList.add('critical'); // Tambahkan class critical pada elemen progres
				}
				setTimeout(updateTimer, 1000);
			} else {
				timerElement.innerHTML = 'Waktu pemilihan telah berakhir';
				voteButton1.disabled = true; // Menonaktifkan tombol vote
				voteButton2.disabled = true;
			}
		}

		// Memulai pembaruan timer dan progress bar
		updateTimer();
	</script>

</body>

</html>