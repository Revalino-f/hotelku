     <!-- /.card -->
            <div class="container availability-form">
 	<div class="row">
 		         <div class="col-lg-12 bg-white shadow p-4 rounded">
            <form action="bukti.php" method="POST">
              <div class="col-md-12">
                <div class="card-body">
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Tanggal Cek In</label>
                    <div class="col-sm-2">                  
                      <input type="date" name="cek_in" class="form-control" placeholder=".col-3">
                    </div>
                    <label class="col-sm-2 col-form-label">Tanggal Cek Out</label>
                    <div class="col-sm-2">                  
                      <input type="date" name="cek_out" class="form-control" placeholder=".col-4">
                    </div>
                    <label class="col-sm-2 col-form-label">Jumlah Kamar</label>
                    <div class="col-sm-1">                  
                      <input type="text" name="jml_kamar" class="form-control" placeholder="Jumlah Kamar">
                    </div>
                    <div class="col-lg-1 mb-lg-3">
                    <button type="button"  class="btn btn-primary btn-kirim" onclick="tampilkanPopup()">Pesan</button>

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
                        <input type="text" name="nama_pemesan" class="form-control" placeholder="Masukan Nama Pemesan">
                      </div>
                      <div class="form-group">
                        <label>Email Pemesan</label>
                        <input type="email" name="email_pemesan" class="form-control" placeholder="Masukan Email Pemesan">
                      </div>
                      <div class="form-group">
                        <label>No. Handphone</label>
                        <input type="text" name="hp_pemesan" class="form-control" placeholder="Masukan No. Handphone">
                      </div>
                      <div class="form-group">
                        <label>Nama Tamu</label>
                        <input type="text" name="nama_tamu" class="form-control" placeholder="Masukan Nama Tamu">
                      </div>
                      <div class="form-group">
                        <label>No. Kamar</label>
                        <select name="id_kamar" class="form-control">
                          <option value="">--- Pilih Kamar ---</option>
                          <?php
                          include 'koneksi.php';
                          $data = mysqli_query($koneksi, "select * from kamar");
                          while ($d = mysqli_fetch_array($data)) { 
                            ?>
                            <option value="<?php echo $d['id_kamar']; ?>"><?php echo $d['no_kamar']; ?></option>
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
                