<?php 
include 'koneksi.php';
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
  <title>Pesan Hotel Ajaa</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="new.css">
  <?php require('inc/links.php'); ?>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<style type="text/css">
	
	.availability-form{
		margin-top: -50px;
		z-index: 2;
		position: relative;
	}

	@media screen and (max-width: 575px) {
	.availability-form{
		margin-top: 25px;
		padding: 0 35px;
	}

	}
</style>
</head>
<body>

    <!-- Navbar -->
    <?php require('inc/header.php'); ?>
<!-- Swiper Carousal-->
 <div class="container-fluid px-lg-4 mt-4">
 	 <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="images/carousel/1.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/2.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/3.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/4.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/5.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/6.png" class="w-100 d-block" />
        </div>
       
      </div>
      
    </div>
 </div>

    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
            <?php 
            if(isset($_GET['pesan'])){
              if($_GET['pesan']=="gagal"){?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan !!!</h5>
                  Mohon maaf anda tidak bisa mengakses halaman ini
                </div>
              <?php }} ?>
            </div>
          </div>
        </div> 
        <div class="content">
        <div class="container">
          <div class="col-md-12">
        <div class="alert alert-success alert-dismissible fade show d-none my-alert" role="alert">
                <strong>Terima kasih!</strong>Pesan anda sudah kami terima.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php require('pemesanan.php') ?>
            </div>     
          </div>
         </div>
       
         <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">KAMAR</h2>
       
           <div class="container">
  
 	           <div class="row">
              <?php
          $query = "SELECT * FROM kamar ORDER BY id_kamar ASC";
          $result = mysqli_query($koneksi, $query);
          if (!$result) {
            die("Query Error: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
          }

          $no = 1;

          while ($row = mysqli_fetch_assoc($result)) {
            ?>

 	           	<div class="col-lg-4 col-md-6 my-3">
   
 			<div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
			  <img src="admin/gambar/<?php echo $row['foto']; ?>" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $row['no_kamar']; ?></h5>
			    <h6 class="mb-4">Rp.<?php 
  $fasilitas_kamar = mysqli_query($koneksi, "select * from fasilitas_kamar");
  while ($a = mysqli_fetch_array($fasilitas_kamar)) {
    if ($a['id_kamar'] == $row['id_kamar']) {
      $harga = $a['harga'];
      $formatted_harga = number_format($harga, 0, ',', '.');
      echo $formatted_harga;
    }
  }
?> per Malam </h6>
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
    				</span>
			    </div>
			    <div class="Facilities mb-4">
			    	<h6 class="mb-1">FASILITAS</h6>
			    	<span class="badge rounded-pill bg-light text-dark text-wrap">
			    		Wifi
    				</span>
    				<span class="badge rounded-pill bg-light text-dark text-wrap">
			    		Television
    				</span>
    				<span class="badge rounded-pill bg-light text-dark text-wrap">
			    		AC
    				</span>
    				<span class="badge rounded-pill bg-light text-dark text-wrap">
			    		Room Heater
    				</span>
    			</div>

    				<div class="rating mb-4">

    					<h6 class="mb-1">Rating</h6>
    					<span class="badge rounded-pill bg-light">
    						<i class="bi bi-star-fill text-warning"></i>
    						<i class="bi bi-star-fill text-warning"></i>
    						<i class="bi bi-star-fill text-warning"></i>
    						<i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-grey"></i>
    					</span>
             
    				</div>
			  </div>
			</div>
    
    
 		</div>
     <?php $no++; } ?>
  </div>
      
    
        <div>
          </div>
         
         </div>  
         

        
         <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">LOKASI</h2>

 <div class="container">
 	<div class="row">
 		<div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
 		<iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126586.6894453521!2d112.62532928202674!3d-7.483570013968983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7de41fd253ccb%3A0xcf6ce9058394f838!2sSMA%20Negeri%201%20Porong!5e0!3m2!1sid!2sid!4v1684145710598!5m2!1sid!2sid"></iframe>	
 		</div>
 		<div class="col-lg-4 col-md-4 ">
 			<div class="bg-white p-4 rounded">
 				<h5>Call us</h5>
 				<a href="tel: +62 85784785293" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +94 768799665</a>
 				<br>
 				<a href="tel: +62 85784785293" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +94 768799665</a>
 			</div>	
 			<div class="bg-white p-4 rounded">
 				<h5>Follow us</h5>
 				<a href="#" class="d-inline-block mb-3">
 					<span class="badge bg-light text-dark fs-6 p-2">
 						<i class="bi bi-twitter me-1"></i>Twitter
 					</span>
 				</a>
 				<br>
 				<a href="#" class="d-inline-block mb-3">
 					<span class="badge bg-light text-dark fs-6 p-2">
 						<i class="bi bi-facebook me-1"></i>Facebook
 					</span>
 				</a>
 				<br>
 				<a href="#" class="d-inline-block">
 					<span class="badge bg-light text-dark fs-6 p-2">
 						<i class="bi bi-instagram me-1"></i>Instagram
 					</span>
 				</a>
 			</div>
 		</div>
 	</div>
 </div>   
       <?php require('inc/footer.php') ?>
       
             
    <!-- REQUIRED SCRIPTS -->
    <script>
      function tampilkanPopup() {
      var overlay = document.getElementById("overlay");
       overlay.style.display = "block";
      }

function tutupPopup() {
  var overlay = document.getElementById("overlay");
  overlay.style.display = "none";
}
</script>
<script>
      var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
        	delay: 3500,
        	disableOnInteraction: false,
        }
      });

      var swiper = new Swiper(".swiper-testimonials", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        slidesPerView: "3",
        loop: true,
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: false,
        },
        pagination: {
          el: ".swiper-pagination",
        },
        breakpoints: {
        	320: {
        		slidesPerView: 1,
        	},
        	640: {
        		slidesPerView: 1,
        	},
        	768: {
        		slidesPerView: 2,
        	},
        	1024: {
        		slidesPerView: 3,
        	},
        }
      });
    </script>
    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
 
  </body>
  </html>