     <!-- /.card -->
     <link rel="stylesheet" href="style.css">
            <div class="container availability-form">
 	<div class="row">
   <script>
  function validatePhoneNumber() {
    var phoneNumber = document.getElementById("hp_pemesan").value;
    var pattern = /^\d{10,15}$/; // Format nomor telepon: 10 hingga 15 digit angka

    if (!pattern.test(phoneNumber)) {
      alert("Nomor telepon tidak valid. Harap masukkan nomor telepon dengan 10-15 digit angka.");
      return false;
    }

    return true;
  }
</script>
        
 	<div class="row">
 		<div class="col-lg-12 bg-white shadow p-4 rounded">
 			<form action="bukti.php" method="POST" onsubmit="return validatePhoneNumber();">
 				<div class="row align-items-end">
 					<div class="col-lg-4 mb-3">
 						<label class="form-label" style="font-weight: 500;">Check-in</label>
 						<input type="date" class="form-control shadow-none" name="cek_in" required>
 					</div>
 					<div class="col-lg-4 mb-3">
 						<label class="form-label" style="font-weight: 500;">Check-out</label>
 						<input type="date" class="form-control shadow-none"  name="cek_out" required>
 					</div>
 					<div class="col-lg-2 mb-3">
 						<label class="form-label" style="font-weight: 500;">Jumlah Kamar</label>
 						<select class="form-select shadow-none" name="jml_kamar" required>
  					
  						<option value="1">1</option>
  						<option value="2">2</option>
  						<option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="5">6</option>
						</select>
 					</div>
 					<div class="col-lg-2 mb-lg-3 mt-2">
 						<button type="button" class="btn btn btn-primary"  onclick="tampilkanPopup()">pesen</button>
 					</div>

                    </div>
                  </div>
                </div>
              </div>
           

              <div class="overlay" id="overlay">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Form Pemesanan</h4>
                      <button type="button" class="close" class="close" onclick="tutupPopup()">&times;

                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nama Pemesan</label>
                        <input type="text" name="nama_pemesan" class="form-control" placeholder="Masukan Nama Pemesan" required>
                      </div>
                      <div class="form-group">
                        <label>Email Pemesan</label>
                        <input type="email" name="email_pemesan" class="form-control" placeholder="Masukan Email Pemesan" required>
                      </div>
                      <div class="form-group">
                        <label>No. Handphone</label>
                        <input type="tel" name="hp_pemesan" id="hp_pemesan" class="form-control" placeholder="Masukan No. Handphone" pattern="[0-9]{10,12}"  maxlength="12" required>
                      </div>
                      <div class="form-group">
                        <label>Nama Tamu</label>
                        <input type="text" name="nama_tamu" class="form-control" placeholder="Masukan Nama Tamu"required>
                      </div>
                      <div class="form-group">
                        <label>No. Kamar</label>
                        <select name="id_kamar" class="form-control" required>
                          <option value="">--- Pilih Kamar ---</option>
                          <?php
                          include 'koneksi.php';
                          $data = mysqli_query($koneksi, "select * from kamar");
                          while ($d = mysqli_fetch_array($data)) { 
                            ?>
                            <option value="<?php echo $d['id_kamar'] . '|' . $d['no_kamar']; ?>" ><?php echo $d['no_kamar']; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default"  onclick="tutupPopup()">Close</button>
                      <button type="submit" class="btn btn-primary btn-kirim">Konfirmasi Pesanan</button>
                    </div>
                  </div>
                   <form>     
                