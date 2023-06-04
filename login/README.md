Cara Instalasi:
1. Ektrak folder SEMIRA ke dalam folder web server (html atau htdocs atau wwww)
2. Buat database baru dan import file database yang ada di folder db/SEMIRA.sql (dapat menggunakan PHPMyAdmin) tutor lewat terminal ada di http://muhidin.web.id/backup-and-restore-mysql-database-using-terminal/
3. Sesuaikan isian database pada file sambungan.php, misal menggunakan xampp tanpa password dengan nama database SEMIRA, maka settingan-nya menjadi (jangan lupa php buka dan tutupnya):
<pre>
  $host="localhost";
  $userdb="root";
  $passdb="";
  $namadb="SEMIRA";
  $koneksi=mysqli_connect($host,$userdb,$passdb,$namadb);
</pre>
4. Jalankan browser http://localhost/SEMIRA
5. Ada usulan untuk perubahan ke depankah, misal menggunakan framework CI atau Laravel?
