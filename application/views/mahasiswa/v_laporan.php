<?php 
    $this->load->view('layouts_mahasiswa/top');
  ?>

  <!-- Begin Page Content -->
         <div class="container-fluid">
           <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash');?>"></div>

          <!-- Page Heading -->
         
          <!-- DataTales Example -->
          <br>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h5 class="left m-0 font-weight- text-primary">Laporan Perawatan</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pasien</th>
                      <th>Nama Mahasiswa</th>
                      <th>Nama Dosen</th>
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
                        foreach($laporan as $lp){
                        ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $lp->nama;?></td>
                          <td><?php echo $lp->mahasiswa;?></td>
                           <td><?php echo $lp->dosen;?></td>
                          <td><?php echo $lp->diagnosaa;?></td>
                          <td><?php echo $lp->keluhan;?></td>
                          <td><?php echo $lp->gigi;?></td>
                          <td><?php echo $lp->tindakan;?></td>
                          <td><?php echo $lp->tanggal;?></td>
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
    $this->load->view('layouts_mahasiswa/footer');
  ?>