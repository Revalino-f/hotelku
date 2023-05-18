<?php 
session_start();

  // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:index.php?pesan=gagal");
}

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi UKK 2022 | Pemesanan Hotel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php
        include './header.php';
    ?>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-body">
                <div class="row">
                  <?php
                  include '../koneksi.php';
                  $no = 1;
                  $data = mysqli_query($koneksi, "select * from pesanan");
                  $jumlah_pesanan = mysqli_num_rows($data);
                  ?>
                  <div class="col-lg-12 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>
                          <?php echo $jumlah_pesanan; ?>                              
                        </h3>

                        <p>Data Pesanan</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-home"></i>
                      </div>
                      <a href="pesanan.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                    <div class="row">
                  <?php
                  include '../koneksi.php';
                  $no = 1;
                  $data = mysqli_query($koneksi, "select * from kontak");
                  $jumlah_pesanan = mysqli_num_rows($data);
                  ?>
                  <div class="col-lg-12 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>
                          <?php echo $jumlah_pesanan; ?>                              
                        </h3>

                        <p>Contact</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-home"></i>
                      </div>
                      <a href="contact.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
      <!-- Main content -->
     
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

  
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.min.js"></script>
</body>
</html>