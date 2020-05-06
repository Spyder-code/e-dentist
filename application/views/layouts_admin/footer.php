<!-- Footer -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <form class="user" action="<?=  base_url('index.php/login/logout'); ?>"method="post">
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah Yakin Anda Keluar ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" di bawah ini jika Anda Yakin untuk mengakhiri sesi Anda saat ini</div>
        <div class="modal-footer">
          <button type="button"class="btn btn-outline-primary waves-effect btn-user"  data-dismiss="modal">Cancel</button>
         
          <a type ="submit"class="btn btn-primary btn-user" href="<?php echo base_url('index.php/login/logout'); ?>" >Logout</a>
        </div>
      </form>

      </div>
    </div>
  </div>
   </div>

  <!-- Bootstrap core JavaScript-->

  <script src="<?php echo base_url().'assets/backend/vendor/jquery/jquery.min.js'?>"></script>
  
  <script src="<?php echo base_url().'assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url().'assets/backend/vendor/jquery-easing/jquery.easing.min.js'?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url().'assets/backend/js/sb-admin-2.min.js'?>"></script>
  <!-- Page level plugins -->
  <script src="<?php echo base_url().'assets/backend/vendor/datatables/jquery.dataTables.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/backend/vendor/datatables/dataTables.bootstrap4.min.js'?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url().'assets/backend/js/demo/datatables-demo.js'?>"></script>
  <script src="<?php echo base_url().'assets/alert/js/sweetalert2.all.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/alert/js/myscript.js'?>"></script>
  <script src="<?php echo base_url().'assets/alert/js/sweetalert2.all.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/backend/vendor/chart.js/Chart.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/chartjs/admin/bulanan.js'?>"></script>
  <script>
    var ctx = document.getElementById('mahasiswaChart').getContext('2d');
    var data_jenjang = [];
    var data_jumlah= [];

    $.post("<?= base_url('admin/getData') ?>",
      function(data){
        var objek = JSON.parse(data);
        $.each(objek, function (test,item){
          data_jenjang.push(item.jenjang);
          data_jumlah.push(item.total);
        });
      
    var mahasiswaChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: data_jenjang,
            datasets: [{
                label: 'Jumlah',
                data: data_jumlah,
                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                borderColor: "black",
                borderWidth: 2
            }]
        },
        options: {
          rotation: -Math.PI,
          cutoutPercentage: 50,
          //circumference: Math.PI,
          legend: {
            position: 'left'
          },
          animation: {
            animateRotate: false,
            animateScale: true
          }
        }
    });
    });
</script>

<script>
  var data_bln = [];
    var data_jmlh= [];

    $.post("<?= base_url('admin/getDataBulan') ?>",
      function(data){
        var obj = JSON.parse(data);
        $.each(obj, function (test,item){
          data_bln.push(item.bulan);
          data_jmlh.push(item.total);
        });
  var myLineChart = new Chart(fgh, {
  type: 'line',
  data: {
    labels: data_bln,
    datasets: [{
      label: "Jumlah",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: data_jmlh,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
});
</script>


</body>

</html>
