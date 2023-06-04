<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $judul;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- favicon -->
    <link rel="shortcut icon" href="../../assets/img/logo-bkm.png">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Ionicons https://code.ionicframework.com/ionicons/2.0.1/ -->
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-green sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="." class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">BKM</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>SEMIRA</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../gambar/pengguna/<?php echo $_SESSION['fotokasis']; ?>" class="user-image" alt="<?php echo $_SESSION['userkasis']; ?>">
                  <span class="hidden-xs"><?php echo $_SESSION['namakasis']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../gambar/pengguna/<?php echo $_SESSION['fotokasis']; ?>" class="img-circle" alt="<?php echo $_SESSION['userkasis']; ?>">
                    <p>
                      <?php echo $_SESSION['namakasis']; ?>
                      <small><?php echo $_SESSION['jabatankasis']; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="?m=admin&s=profil" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../gambar/pengguna/<?php echo $_SESSION['fotokasis']; ?>" class="img-circle" alt="<?php echo $_SESSION['userkasis']; ?>">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['namakasis']; ?></p>
              <a href="?m=admin&s=profil"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu Utama</li>
            <li class="<?php if($aktif=='Beranda') echo 'active';?> treeview">
              <a href=".">
                <i class="fa fa-dashboard"></i> <span>Beranda</span>
              </a>
            </li>
            <li class="<?php if($aktif=='Kelas') echo 'active';?> treeview">
              <a href="#">
                <i class="fa fa-graduation-cap"></i> <span>Kelas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?m=kelas"><i class="fa fa-list"></i> Daftar</a></li>
                <li><a href="?m=kelas&s=tambah"><i class="fa fa-plus"></i> Tambah</a></li>
              </ul>
            </li>
            <li class="<?php if($aktif=='mahasiswa') echo 'active';?> treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>mahasiswa</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?m=mahasiswa"><i class="fa fa-list"></i> Daftar</a></li>
                <li><a href="?m=mahasiswa&s=tambah"><i class="fa fa-user-plus"></i> Tambah</a></li>
              </ul>
            </li>
            <li class="<?php if($aktif=='dosenstaff') echo 'active';?> treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Dosen & Staff</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?m=dosenstaff"><i class="fa fa-list"></i> Daftar</a></li>
                <li><a href="?m=dosenstaff&s=tambah"><i class="fa fa-user-plus"></i> Tambah</a></li>
              </ul>
            </li>
            <li class="<?php if($aktif=='Kandidat') echo 'active';?> treeview">
              <a href="#">
                <i class="fa fa-calendar"></i> <span>Kandidat</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?m=kandidat"><i class="fa fa-list"></i> Daftar</a></li>
                <li><a href="?m=kandidat&s=tambah"><i class="fa fa-user-plus"></i> Tambah</a></li>
              </ul>
            </li>
            <li class="<?php if($aktif=='Admin') echo 'active';?> treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Administrator</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?m=admin"><i class="fa fa-list"></i> Daftar</a></li>
                <li><a href="?m=admin&s=tambah"><i class="fa fa-user-plus"></i> Tambah</a></li>
              </ul>
            </li>
            <li>
              <a href="logout.php">
                <i class="fa fa-th"></i> <span>Logout</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
