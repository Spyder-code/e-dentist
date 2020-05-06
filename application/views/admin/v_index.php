<?php 
    $this->load->view('layouts_admin/top');
  ?>

  <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Dosen Terdaftar</div>
                      <div class="h5 mb-0 font-weight-bold text-success-800"><?php echo $jml_dosen; ?></div>
                    </div>
                    <div class="col-auto">
                      <p style="color: #28a745"><i class="fas fa-chalkboard-teacher fa-2x -300"></i></p>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Mahasiswa Terdaftar D3</div>
                      <div class="h5 mb-0 font-weight-bold text-warning-800"><?php echo $jml_mahasiswad3; ?></div>
                    </div>
                    <div class="col-auto">
                       <p style="color:  #ffc107"> <i class="fas fa-user-graduate  fa-2x -300"></i></p>
                      <!-- <i class="fas fa-dollar-sign fa-2x text-300 icon-bg-primry"></i> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Mahasiswa Terdaftar D4</div>
                      <div class="h5 mb-0 font-weight-bold text-info-800"><?php echo $jml_mahasiswad4; ?></div>
                    </div>
                    <div class="col-auto">
                       <p style="color:  #17a2b8"> <i class="fas fa-user-graduate  fa-2x -300"></i></p>
                      <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Pasien Terdaftar</div>
                      <div class="h5 mb-0 font-weight-bold text-danger-800"><?php echo $jml_pasien; ?></div>
                    </div>
                    <div class="col-auto">
                     
                       <p style="color:   #dc3545"> <i class="fas fa-user-injured  fa-2x -300"></i></p>
                     <!--  <i class="fas fa-comments fa-2x text-gray-300"></i> -->

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

                    <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
           <!--  <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4"> -->
                <!-- Card Header - Dropdown -->
               <!--  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Perbandingan Jumlah Mahasiswa</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      
                    </div>
                  </div>
                </div> -->
                <!-- Card Body -->
                <!-- <div class="card-body">
                  <div class="chart-area">
                    <canvas id="mahasiswaChart" width="300" height="80"></canvas>
                  </div>
                </div>
              </div>
            </div>
 -->
             <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Perawatan Bulanan</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="ChartBulanan"></canvas>
                  </div>
                </div>
              </div>
            </div>


          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      
<?php 
    $this->load->view('layouts_admin/footer');
  ?>