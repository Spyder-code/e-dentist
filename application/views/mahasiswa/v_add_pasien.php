<?php 
    $this->load->view('layouts_mahasiswa/top');
  ?>

   <?php
    $tgl_input = date("Y-m-d");
  ?>

  <!-- Begin Page Content -->
         <div class="container-fluid">

                   <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h5 class="left m-0 font-weight- text-primary">Tambah Data Pasien</h5>
              </div>
             
                <form class="user" action="<?php echo site_url('mahasiswa/save_pasien');?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="tanggal" value="<?= $tgl_input; ?>">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control form-control-user" id="exampleFormControlInput1" placeholder="Masukkan Nama Lengkap" required="">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">Tempat</label>
                    <input type="text" name="tempat" class="form-control form-control-user"  placeholder="Tempat Lahir" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputZip">Tanggal Lahir</label>
                    <input type="date" name="ttl" class="form-control form-control-user" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                  <select class="form-control" name="kelamin" id="exampleFormControlSelect1 "style="border-radius:30px; height:50px">
                    <option><h6>Laki-Laki</h6></option>
                    <option>Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">No Telepon</label>
                  <input type="number" name="no_telepon" class="form-control form-control-user" placeholder="Masukkan No Telepon" required="">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Alamat</label>
                  <input type="text" name="alamat" class="form-control form-control-user" id="exampleFormControlInput1" placeholder="Masukkan Alamat Lengkap" required="">
                  <!-- <label for="exampleFormControlTextarea1">Alamat</label>
                  <textarea class="form-control form-control-user" name="alamat" id="exampleFormControlTextarea1" required="" ></textarea> -->
                </div>
                <br>
                 <hr>
                <button type="submit" class="btn btn-primary btn-user  btn-block">Submit</button>
                 <hr>
                <br>
              </form>
             
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

      </div>
      <!-- End of Main Content -->

<?php 
    $this->load->view('layouts_mahasiswa/footer');
  ?>