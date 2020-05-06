<?php 
    $this->load->view('layouts_admin/top');
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
                <h5 class="left m-0 font-weight- text-primary">Edit Data Mahasiswa</h5>
              </div>
              <br>
              <form class="user" action="<?php echo site_url('admin/update_mahasiswa');?>" method="post">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <input type="hidden" name="tanggal" value="<?= $tgl_input; ?>">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control form-control-user" id="exampleFormControlInput1" placeholder="Masukkan Nama Lengkap"  value="<?php echo $nama;?>">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">NIM Mahasiswa</label>
                  <input type="text" name="nim" class="form-control form-control-user" id="exampleFormControlInput1" placeholder="Masukkan NIM Mahasiswa"  value="<?php echo $nim;?>">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">Tempat</label>
                    <input type="text" name="tempat" class="form-control form-control-user"  placeholder="Tempat Lahir" value="<?php echo $tempat;?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputZip">Tanggal Lahir</label>
                    <input type="date" name="ttl" class="form-control form-control-user"  value="<?php echo $ttl;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">No Telepon</label>
                  <input type="number" name="no_telepon" class="form-control form-control-user" placeholder="Masukkan No Telepon" value="<?php echo $no_telepon;?>">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Alamat</label>
                  <input type="text" class="form-control form-control-user" name="alamat" id="exampleFormControlTextarea1"  rows="3" value="<?php echo $alamat;?>"></input>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Jenjang Kuliah</label>
                  <select class="form-control form-control-user" name="jenjang" value="<?php echo $jenjang;?>" id="exampleFormControlSelect1">
                    <option>D3</option>
                  </select>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary mb-2 float-right btn-user btn-block">Submit</button>
                <hr>

                <br>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

      </div>
      <!-- End of Main Content -->

<?php 
    $this->load->view('layouts_admin/footer');
  ?>