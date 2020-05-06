<?php 
    $this->load->view('layouts_mahasiswa/top');
  ?>

  <!-- Begin Page Content -->
         <div class="container-fluid">
           <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash');?>"></div>
           <div class="flash-gagal" data-flashgagal="<?php echo $this->session->flashdata('gagal');?>"></div>

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"></h1>

          <!-- DataTales Example -->
             
          <div class="card shadow mb-4"class="rounded" style="max-width: 1000px;height:600px;top: 70px;position: relative;display: block;margin: auto;">

            <?php foreach($show_profile as $prf){
                     ?>
                     
            <form class="user" action="<?=  base_url('mahasiswa/profile'); ?>"method="post">
            <div class="row no-gutters">
              <div class="container">
               <img   src="<?=base_url()?>assets/profile/mahasiswa/<?=$prf->gambar?>" class="card shadow mb-9 img-responsive img-thumbnail img-circle "alt="..."style="width:250px;height:250px;border-radius: 100% ;border: 4px solid   #4e73df;display: block;margin: auto;position: relative; bottom: 60px">
              </div>
               </div>
               <tr>
              <div style="text-align:justify;"><font color=" #4e73df"><h1 class="card-title"><center><strong><?php echo $prf->nama;?></strong> </center>  </h1></font>
                <div class="containerr">
                    <font size="5" face="verdana" >
                    <table align="center" cellpadding="10" border="0">
                       <tr>
                          <td style="color:#4e73df;" >NIM</td>
                          <td style="color:#4e73df;">:</td>
                          <td style="color:#4e73df;"><?php echo $prf->nim;?></td>
                        </tr>
                        <tr>
                          <td style="color:#4e73df;">TTL</td>
                          <td style="color:#4e73df;">:</td>
                          <td style="color:#4e73df;"><?php echo $prf->tempat;?>, <?php echo $prf->ttl;?></td>
                        </tr>
                        <tr>
                          <td style="color:#4e73df;">ALAMAT</td>
                          <td style="color:#4e73df;">:</td>
                          <td style="color:#4e73df;"><?php echo $prf->alamat;?></td>
                        </tr>
                        <tr>
                          <td style="color:#4e73df;">NO.TELP</td>
                          <td style="color:#4e73df;">:</td>
                          <td style="color:#4e73df;"><?php echo $prf->no_telepon;?></td>
                        </tr>
                        <tr>
                          <td style="color:#4e73df;">JENJANG</td>
                          <td style="color:#4e73df;">:</td>
                          <td style="color:#4e73df;"><?php echo $prf->jenjang;?></td>
                        </tr>
                    </table>
                     </font>
                  </div>
                   <?php }?>
               
                <button  style=" display: block;margin: auto; "  class="btn btn-primary btn-user " > <style ></style> Edit Profile</button>
                <br>
              </div>
           </form>
               </div>
            </div>
          </div>


          

      </div>
      <!-- End of Main Content -->

<?php 
    $this->load->view('layouts_mahasiswa/footer');
  ?>







