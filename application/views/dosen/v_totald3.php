<?php 
    $this->load->view('layouts_dosen/top');
  ?>
   <?php
    $tgl_input = date("Y-m-d");
  ?>

  <!-- Begin Page Content -->
         <div class="container-fluid">
           <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash');?>"></div>

          <!-- Page Heading -->
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="left m-0 font-weight- text-primary">Laporan Total Mahasiswa D3 </h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        foreach($totald3 as $day){
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