<?php 
include_once "atas.php"; 
include_once "../sambungan.php";
//$sql="SELECT kandidat.idkandidat,nama,nokandidat,foto,count(idpemilihan) as kandidat,datapemilihan.idkandidat FROM kandidat FULL OUTER JOIN datapemilihan ON kandidat.idkandidat=datapemilihan.idkandidat";
//$sql="SELECT kandidat.idkandidat as idk,nama,nokandidat,foto, datapemilihan.idpemilihan,count(datapemilihan.idkandidat) as kandidat,datapemilihan.idkandidat FROM kandidat LEFT OUTER JOIN datapemilihan ON kandidat.idkandidat=datapemilihan.idkandidat ORDER BY nokandidat";
$sql="SELECT * FROM kandidat ORDER BY nokandidat";
$query=mysqli_query($koneksi,$sql);

$sqljs="SELECT sum(jumlahsuara) as jsuara FROM kandidat";
$queryjs=mysqli_query($koneksi,$sqljs);
$rjs=mysqli_fetch_array($queryjs);

$idpemilih=$_SESSION['idgkasis'];
$sqlpilih="SELECT * FROM datapemilihan WHERE idpemilih='$idpemilih'";
$querypilih=mysqli_query($koneksi,$sqlpilih);
$ada=mysqli_num_rows($querypilih);

/*$sjumlah="SELECT count(idpemilihan) as kandidat,idkandidat FROM datapemilihan GROUP BY idkandidat ORDER BY idkandidat";
$qjumlah=mysqli_query($koneksi,$sjumlah);
$j=mysqli_fetch_assoc($qjumlah);
*/
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Dashboard Dosen & Staff SEMIRA
        <small>Pemilihan Ketua BKM</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <h4 class="text-danger">Anda tidak dapat membatalkan pilihan yang sudah dipilih, jika sudah memilih maka pilihan tidak dapat diubah.</h4>
      <!-- Small boxes (Stat box) -->
      <div class="row">
<?php
//var_dump($sql);
while($r=mysqli_fetch_array($query)){
echo '        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">';
echo "<h3>".$r['nokandidat']."</h3>";
// echo $r['jumlahsuara']." suara";
// echo "<h2>".round(($r['jumlahsuara']/$rjs['jsuara']*100),2)."%</h2>";
echo "<b>".$r['nama']."</b>";
echo '            </div>
            <div class="icon">
              <img src="../gambar/kandidat/'.$r['foto'].'" height="100px"/>
            </div>';
        if($ada==0){
            // echo'<a href="?m=dosenstaff&s=pilihan&id='.$r['idkandidat'].'" class="small-box-footer">Pilihan Anda? <i class="fa fa-arrow-circle-up"></i></a>';
              // modal cofirmation
          echo '<a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-default'.$r['idkandidat'].'">Pilih <i class="fa fa-arrow-circle-right"></i></a>';
          echo '<div class="modal fade" id="modal-default'.$r['idkandidat'].'">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header text-primary">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Konfirmasi Pilihan</h4>
                </div>
                <div class="modal-body text-primary">
                  <p>Apakah anda yakin memilih <b>'.$r['nama'].'</b> ?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                  <a href="?m=mahasiswa&s=pilihan&id='.$r['idkandidat'].'" class="btn btn-primary">Ya</a>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->';
		}else{
			echo '<a href="#" class="small-box-footer">Anda sudah memilih <i class="fa fa-check"></i></a>';
		}
        echo '  </div>
        </div>';
}
?>        
      </div>
      <!-- /.row -->

<?php include "bawah.php"; ?>
