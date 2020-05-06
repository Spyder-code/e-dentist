<?php 
    $this->load->view('layouts_mahasiswa/top');
  ?>

  <?php
    $tgl_input = date("Y-m-d");
  ?>

  <?php
    $bulan = array(
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
        );
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
                <h5 class="left m-0 font-weight- text-primary">Form Perawatan Pasien</h5>
              </div>
              <br>
              <form class="user" action="<?php echo site_url('mahasiswa/save_perawatan');?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_mahasiswa" value="<?php echo $this->session->userdata('ses_id');?>" >
                <input type="hidden" name="tanggal" value="<?= $tgl_input; ?>">
                <input type="hidden" name="bulan" value="<?= $bulan[date('m')]; ?>">

                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama Dosen</label>
                  <select class="custom-select " name="id_dosen" id="exampleFormControlSelect1" required=""style="border-radius:30px; height:50px">
                    <option value="" disabled selected>-- Pilih Nama Dosen --</option>
                    <?php                                
                      foreach ($dosen as $row) {  
                    echo "<option value='".$row->id."'>".$row->nama."</option>";
                    }
                  ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama Pasien</label>
                  <input type="text" name="nama" class="form-control form-control-user" id="exampleFormControlInput1" placeholder="Masukkan Nama Pasien" required="" value="<?php echo $nama;?>" readonly>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">Diagnosa</label>
                    <select class="custom-select " name="diagnosa" id="kodee" required=""style="border-radius:30px; height:50px">
                    <option value="" disabled selected>-- Pilih Diagnosa --</option>
                    <?php                                
                      foreach ($diagnosa as $row) {  
                    echo "<option value='".$row->id."'>".$row->kode."</option>";
                    }
                  ?>
                  </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputZip">'</label>
                    <input type="text" name="namaa" class="form-control form-control-user" required="" placeholder="Deskripsi Diagnosa" readonly="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Keluhan</label>
                  <input type="text" name="keluhan" class="form-control form-control-user" placeholder="Masukkan Keluhan" required="">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Kode Gigi</label>
                  <a href="" type="button" data-toggle="modal" data-target="#myGigi"><h10>Pilih Kode</h10></a>
                  <div ></div>
                  <!-- <select class="form-control" name="kode_gigi" id="kode_gigi" required="">
                    <option value="" selected>-- Pilih Kode Gigi --</option>
                    <?php                                
                      foreach ($gigi as $row) {  
                    echo "<option value='".$row->kode_gigi."'>".$row->kode_gigi."</option>";
                    }
                  ?>
                  </select> -->
                </div>
                <input type="text" name="kode_gigi" id="inputKodeGigi" class="form-control form-control-user" readonly="" required="">
                <br>

                <div class="form-group">
                  <label for="exampleFormControlInput1">Tindakan</label>
                  <input type="text" name="tindakan" class="form-control form-control-user" placeholder="Masukkan Tidakan" required="">
                </div>

                <br>
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
      <!-- Modal -->
      <div id="myGigi" class="modal fade bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Kode Gigi</h4>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <p>Pilih Kode Gigi Yang Sesuai.</p>

          <div class="container">
            
            <div class="row">
              <?php foreach ($kode_gigi as $kode) : ?> 
              <div class="col col-2">
                <div class="card mt-2">
                  <div class="card-header text-center"><?php echo $kode['kode'];?></div>
                  <div class="card-body">
                    <img src="<?php echo base_url().'assets/gigi/'.$kode['image'];?>" class="kodeGigi img-thumbnail" data-kode="<?php echo $kode['kode'];?>"> 


                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            
          </div>
          
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary mb-2 float-right"  data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


<script>
  $(function(){
    $('.kodeGigi').on('click',function(){
      console.log("ok");
      var a = $(this).attr('data-kode');
      console.log(a);
     $('#inputKodeGigi').attr('value',a);
    $('#myGigi').modal('hide');
    });
  });
</script>
<?php 
    $this->load->view('layouts_mahasiswa/footer');
  ?>