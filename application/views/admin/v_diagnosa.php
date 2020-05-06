<?php 
    $this->load->view('layouts_admin/top');
  ?>

  <!-- Begin Page Content -->
         <div class="container-fluid">
           <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash');?>"></div>
          <!-- Page Heading -->
         
          <!-- DataTales Example -->

    <form class="user" action="<?=  base_url('admin/add_diagnosa'); ?>"method="post">
            <style type="text/css">
   .left    { text-align: left;}
   .right   { text-align: right;}
   .center  { text-align: center;}
   .justify { text-align: justify;}
</style>
          <div class="card shadow mb-4">
            <div class="left card-header py-3">
              <div class="col-xs-3" >
              <h5 class="left m-0 font-weight- text-primary">Data Diagnosa</h5> <br> <a href="<?php echo base_url().'admin/add_diagnosa'?>" class="btn btn-primary btn-user "> Tambah Data Diagnosa</a>
              </div>
            </form>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Keterangan Dignosa</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                       <?php
                          $no = 1;
                          foreach($diagnosa as $ds){
                        ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $ds->kode;?></td>
                          <td><?php echo $ds->nama;?></td>
                          <td>
                              <a href="<?php echo site_url('admin/edit_diagnosa/'.$ds->id);?>" class="fas fa-edit"></a>
                              &nbsp;
                               &nbsp;
                              <a href="<?php echo site_url('admin/delete_diagnosa/'.$ds->id);?>" class="fa fa-trash tombol-hapus"></a>
                          </td>
                        </tr>

                      <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          

      </div>
      <!-- End of Main Content -->

<?php 
    $this->load->view('layouts_admin/footer');
  ?>