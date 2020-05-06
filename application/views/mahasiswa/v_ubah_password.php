<?php 
    $this->load->view('layouts_mahasiswa/top');
  ?>
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h5 class="left m-0 font-weight- text-primary">Ubah Password </h5>
                <h6><?= $this->session->flashdata('message');?></h6>
              </div>
              <br>
              <form class="user" action="<?=  base_url('mahasiswa/save_password'); ?>"method="post">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Password Lama</label>
                  <input type="password" class="form-control form-control-user" id="current_password" name="old" value="<?php echo set_value('old');?>" placeholder="Masukkan Password Lama" required>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="exampleFormControlInput1">Password Baru</label>
                    <input type="password" class="form-control form-control-user"  id="new_password1" name="new" value="<?php echo set_value('new');?>" placeholder="Masukkan Password Baru" required>
                  </div>
                  <div class="col-sm-6">
                    
                    <label for="exampleFormControlInput1">Ulangi Password baru Lagi</label>
                    <input type="password" class="form-control form-control-user" id="new_password2" name="re_new" value="<?php echo set_value('re_new'); ?>" placeholder="Ulangi Password baru Lagi" required>
                  </div>
                </div>
                <hr>
                <button type="submit"  class="btn btn-primary btn-user btn-block" > <i class="fa fa-key"></i> Ubah Password</button>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


 <?php 
    $this->load->view('layouts_mahasiswa/footer');
  ?>