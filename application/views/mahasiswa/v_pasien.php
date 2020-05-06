<?php 
    $this->load->view('layouts_mahasiswa/top');
  ?>

  <!-- Begin Page Content -->
         <div class="container-fluid">
           <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash');?>"></div>

          <!-- Page Heading -->
          
          <!-- DataTales Example -->
           <form class="user" action="<?=  base_url('dosen/save_password'); ?>"method="post">
            <style type="text/css">
   .left    { text-align: left;}
   .right   { text-align: right;}
   .center  { text-align: center;}
   .justify { text-align: justify;}
</style>
          <div class="card shadow mb-4">
            <div class="left card-header py-3">
              <div class="col-xs-3" >
              <h5 class="left m-0 font-weight- text-primary"$nbsp;>Data Pasien </h5> <br> <a href="<?php echo base_url().'mahasiswa/add_pasien'?>" class="btn btn-primary btn-user "> Tambah Data Pasien</a> 
              </div> 
            </form>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pasien</th>
                      <th>Tempat Tanggal Lahir</th>
                      <th>Alamat</th>
                      <th>Jenis Kelamin</th>
                      <th>No Telepon</th>
                      <th>Tanggal Ditambah</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                       <?php
                        $no = 1;
                        foreach($pasien as $ps){
                        ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $ps->nama;?></td>
                          <td><?php echo $ps->tempat;?>, <?php echo $ps->ttl;?></td>
                          <td><?php echo $ps->alamat;?></td>
                          <td><?php echo $ps->kelamin;?></td>
                          <td><?php echo $ps->no_telepon;?></td>
                          <td><?php echo $ps->tanggal;?></td>
                          <td>
                            <a href="<?php echo site_url('mahasiswa/perawatan_pasien/'.$ps->id);?>" class="fas fa-notes-medical "></a>
                              
                               &nbsp;
                                &nbsp;
                              <a href="<?php echo site_url('mahasiswa/edit_pasien/'.$ps->id);?>" class="fas fa-edit"></a>
                               &nbsp;
                                &nbsp;
                              <a href="<?php echo site_url('mahasiswa/delete_pasien/'.$ps->id);?>" class="fa fa-trash tombol-hapus"></a>
                          </td>
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