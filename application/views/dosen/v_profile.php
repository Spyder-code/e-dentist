<?php 
    $this->load->view('layouts_dosen/top');
  ?>
  <?php
    $tgl_input = date("Y-m-d");
  ?>
  <div class="container-fluid">
  <style >
      
   .left    { text-align: left;}
   .right   { text-align: right;}
   .center  { text-align: center;}
   .justify { text-align: justify;}
       
  </style>
  <div class="container">
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash');?>"></div>

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">

                 <h5 class="left m-0 font-weight- text-primary"><center>Edit Profile dosen</h5> </center>  
              </div>
              <br>
             
              <form class="user" action="<?php echo site_url('dosen/update_profile');?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <input type="hidden" name="tanggal" value="<?= $tgl_input; ?>">
                <input type="hidden" name="filelama" value="<?= $gambar; ?>">
                <div class="a">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama Lengkap</label>
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukkan Nama Lengkap" name="nama" value="<?= $nama; ?>" required>
                </div>
                </div>
                <div class="a">
                <div class="form-group">
                  <label for="exampleFormControlInput1">NIP</label>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Masukkan NIP" name="nip" value="<?= $nip; ?>" readonly>
                </div>
                </div>
                <div class="a">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Alamat Lengkap</label>
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukkan Alamat Lengkap" name="alamat" value="<?= $alamat; ?>" required>
                </div>
                </div>
               <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="exampleFormControlInput1">Tempat Lahir</label>
                    <input type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukkan Tempat Lahir" name="tempat" value="<?= $tempat; ?>" required>
                  </div>
                  <div class="col-sm-6">
                    <label for="exampleFormControlInput1">Tanggal Lahir</label>
                    <input type="date" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Masukkan Tanggal Lahir" name="ttl" value="<?= $ttl; ?>" required>
                  </div>
                </div>
                <div class="a">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nomor Telepon</label>
                  <input type="number" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukkan Nomor Telepon" name="no_telepon" value="<?= $no_telepon; ?>" required>
                </div>
                </div>
                <div class="a">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Tambahkan Foto</label>
                  <input type="file" name="fotopost" >
                </div>
                </div>


                <hr>
                <button type="submit"  class="btn btn-primary btn-user btn-block " > </i> Update</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?php echo base_url('dosen/ubah_password'); ?>">Ubah Password</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


 <?php 
    $this->load->view('layouts_dosen/footer');
  ?>





