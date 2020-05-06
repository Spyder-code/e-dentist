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
                <h5 class="left m-0 font-weight- text-primary">Tambah Data Mahasiswa D3</h5>
              </div>
              <br>
             
                <form class="user" action="<?php echo site_url('admin/save_mahasiswa');?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="tanggal" value="<?= $tgl_input; ?>">
                <div class="form-group">
                  <label for="exampleFormControlInput1">NIM</label>
                  <input type="text" name="nim" class="form-control form-control-user" id="exampleFormControlInput1" placeholder="Masukkan NIM Mahasiswa" required="">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="inputCity">Jenjang Mahasiswa</label>
                    <input type="text" name="jenjang" class="form-control form-control-user" id="exampleFormControlInput1" value="D3" placeholder="Masukkan Jenjang Saat Ini" required="" readonly="">
                  </div>
                
                <br> <hr>
                <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
                 <hr><br>
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
    $this->load->view('layouts_admin/footer');
      ?>







