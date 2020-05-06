<?php 
    $this->load->view('layouts_dosen/top');
  ?>
   <?php
    $year = date("Y");
  ?>

  <!-- Begin Page Content -->
         <div class="container-fluid">
           <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash');?>"></div>

          <!-- Page Heading -->
        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
               <h5 class="left m-0 font-weight- text-primary">Filter Mahasiswa D3</h5>
               <br>
            <form class="user" action="<?php echo site_url('dosen/filter_d3');?>" method="post">
              <input type="hidden" name="year" value="<?= $year; ?>">
              <div class="form-row ">
                
                <div class="col ">

                  <select class="form-control " name="bulan" id="bulan" style="border-radius:30px; height:50px">
                    <option value="" disabled selected>-- Filter Bulan --</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>

                  </select>
                </div>
                <div class="col">
                  <input type="number" class="form-control form-control-user" name="tahun" placeholder="Tahun">
                </div>
                <div class="col">
                 <button type="submit" class="btn btn-primary btn-user">Pilih</button>
                </div>
              </div>
            </form>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" style="border-radius:18px">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Mahasiswa</th>
                      <th>Nama Pasien</th>
                      <th>Diagnosa</th>
                      <th>Keluhan</th>
                      <th>Kode Gigi</th>
                      <th>Tindakan</th>
                      <th>Tanggal Ditambah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $no = 1;
                        foreach($hasil as $day){
                        ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $day->mahasiswa;?></td>
                          <td><?php echo $day->nama;?></td>
                          <td><?php echo $day->diagnosa;?></td>
                          <td><?php echo $day->keluhan;?></td>
                          <td><?php echo $day->kode_gigi;?></td>
                          <td><?php echo $day->tindakan;?></td>
                          <td><?php echo $day->tanggal;?></td>
                        </tr>
                      <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
      <!-- End of Main Content -->

<?php 
    $this->load->view('layouts_dosen/footer');
  ?>