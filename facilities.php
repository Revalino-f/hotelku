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
<link rel="stylesheet" type="text/css" href="css/common.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<style>
     .gambar {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
      }

      .gambar row img {
        width: 100%;
        height: auto;
        margin: 10px;
      }

      /* media query untuk perangkat mobile */
      @media only screen and (max-width: 600px) {
        .gambary {
          flex-direction: column;
          align-items: center;
        }

        .gambar row img {
          width: 80%;
          margin: 10px 0;
        }
      }
</style>

</head>
<body>

<?php require('inc/header.php'); ?>

<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">FACILITIES</h2>

  <div class="h-line bg-dark"></div>
 
</div>
<div class="gambar">
  <div>
            <div class="row">
              <?php
              $query = "SELECT * FROM galeri ORDER BY id_galeri ASC";
              $result = mysqli_query($koneksi, $query);
              if (!$result) {
                die("Query Error: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
              }

              $no = 1;

              while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-3">
                  <div class="card card-outline  border-0 shadow">
                    <!-- /.card-header -->
                    <div class="card-body">
                      <img class="d-block w-100" src="admin/gambar/<?php echo $row['foto']; ?>" height="200">
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <?php $no++; } ?>
              </div>
            </div>

          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      </div>

<?php require('inc/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>