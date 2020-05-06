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
                 <h5 class="left m-0 font-weight- text-primary">Edit Data Diagnosa</h5>
              </div>
              <br>
              <form class="user" action="<?php echo site_url('admin/update_diagnosa');?>" method="post">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Kode Diagnosa</label>
                  <input type="text" name="kode" class="form-control form-control-user" id="exampleFormControlInput1" placeholder="Masukkan Nama Lengkap" required="" value="<?php echo $kode;?>">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama Diagnosa</label>
                  <input type="text" name="nama" class="form-control form-control-user" id="exampleFormControlInput1" placeholder="Masukkan Nama Diagnosa" required="" value="<?php echo $nama;?>">
                </div>
                 
                <br>
                 <hr>
                <button type="submit" class="btn btn-primary mb-2 float-right btn-user btn-block">Submit</button>
                <br>
                 <hr>
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