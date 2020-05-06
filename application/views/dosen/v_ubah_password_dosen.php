<?php 
    $this->load->view('layouts_dosen/top');
  ?>

  <div class="container">


    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                 <h5 class="left m-0 font-weight- text-primary" ><center>Ubah Password </center></h5>
                <br>
                <h6><?= $this->session->flashdata('message');?></h6>
              </div>
              <form class="user" action="<?=  base_url('dosen/save_password'); ?>"method="post">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Password Lama</label>
                  <input type="password" class="form-control form-control-user" id="current_password" name="old" value="<?php echo set_value('old');?>" placeholder="Password Lama" required>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="exampleFormControlInput1">Password Baru</label>
                    <input type="password" class="form-control form-control-user"  id="new_password1" name="new" value="<?php echo set_value('new');?>" placeholder="Password Baru" required>
                  </div>
                  <div class="col-sm-6">
                    <label for="exampleFormControlInput1">Ulangi Password Baru</label>
                    <input type="password" class="form-control form-control-user" id="new_password2" name="re_new" value="<?php echo set_value('re_new'); ?>" placeholder="Ulangi Password Baru Lagi" required>
                  </div>
                </div>
                <hr>
                
                <button type="submit"  class="btn btn-primary btn-user btn-block " > Ubah Password</button>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
 <?php 
    $this->load->view('layouts_dosen/footer');
  ?>