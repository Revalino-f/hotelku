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
      <div class="content">
        <div class="container">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
            
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama</th>
                      <th>emil</th>
                      <th>subject</th>
                      <th>Message</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "select * from kontak");
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['name']; ?></td>
                        <td><?php echo $d['email']; ?></td>
                        <td><?php echo $d['subject']; ?></td>
                        <td><?php echo $d['message']; ?></td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->
    
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->

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