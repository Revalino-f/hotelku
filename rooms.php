<!DOCTYPE html>
<html>
<head>
	<title>Hotel Booking Website</title>
	<!-- CSS only -->
    <?php 
include 'koneksi.php';
?>
<?php require('inc/links.php'); ?>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="css/common.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


</head>
<body>

<?php require('inc/header.php'); ?>

<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>

  <div class="h-line bg-dark"></div>
 
</div>



<div class="col-lg-10 col-md-12 px-4">
<?php
          $query = "SELECT * FROM kamar ORDER BY id_kamar ASC";
          $result = mysqli_query($koneksi, $query);
          if (!$result) {
            die("Query Error: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
          }

          $no = 1;

          while ($row = mysqli_fetch_assoc($result)) {
            ?>
  <div class="card mb-4 border-0 shadow">
  <div class="row g-0 p-3 align-items-center">
    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
      <img src="admin/gambar/<?php echo $row['foto']; ?>" class="img-fluid rounded">
    </div>
    <div class="col-md-5 px-lg-3 px-md-3 px-0">
      <h5 class="mb-3"><?php echo $row['no_kamar']; ?></h5>
      <div class="features mb-4">
            <h6 class="mb-1">Features</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap">
            <?php 
                              $fasilitas_kamar = mysqli_query($koneksi, "select * from fasilitas_kamar");
                              while ($a = mysqli_fetch_array($fasilitas_kamar)) {
                                if ($a['id_kamar'] == $row['id_kamar']) { ?>
                                  <?php echo $a['fasilitas']; ?>
                                  <?php
                                }
                              }
                              ?> 
            </span><br>
            <h6 class="mb-1">Rp.<?php 
                              $fasilitas_kamar = mysqli_query($koneksi, "select * from fasilitas_kamar");
                              while ($a = mysqli_fetch_array($fasilitas_kamar)) {
                                if ($a['id_kamar'] == $row['id_kamar']) { ?>
                                  <?php echo $a['harga']; ?>
                                  <?php
                                }
                              }
                              ?> per Malam </h6>
    </div>
    
  </div>
 </div>
 
 
  </div>
  <?php $no++; } ?>
</div>



<?php require('inc/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>