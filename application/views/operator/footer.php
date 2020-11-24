  
</div>
</div>
</div>
<footer style="width: 100%;left: 0;position: fixed;bottom: 0" class="footer footer-static footer-light navbar-border">
  <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2019 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">Proyek Akhir Aplikasi Pembuatan Surat </a>, All rights reserved. </span></p>
</footer>
<?php
  $undangan = $this->db->query("SELECT * FROM masuk WHERE kategori LIKE '%Undangan%'")->num_rows();
  $Permohonan = $this->db->query("SELECT * FROM masuk WHERE kategori LIKE '%Permohonan%'")->num_rows();
  $Laporan = $this->db->query("SELECT * FROM masuk WHERE kategori LIKE '%Laporan%'")->num_rows();
  $Pemberitahuan = $this->db->query("SELECT * FROM masuk WHERE kategori LIKE '%Pemberitahuan%'")->num_rows();
  $Himbauan = $this->db->query("SELECT * FROM masuk WHERE kategori LIKE '%Himbauan%'")->num_rows();
  $undangankeluar = $this->db->query("SELECT * FROM keluar WHERE kategori LIKE '%Undangan%'")->num_rows();
  $Permohonankeluar = $this->db->query("SELECT * FROM keluar WHERE kategori LIKE '%Permohonan%'")->num_rows();
  $Laporankeluar = $this->db->query("SELECT * FROM keluar WHERE kategori LIKE '%Laporan%'")->num_rows();
  $Pemberitahuankeluar = $this->db->query("SELECT * FROM keluar WHERE kategori LIKE '%Pemberitahuan%'")->num_rows();
  $Himbauankeluar = $this->db->query("SELECT * FROM keluar WHERE kategori LIKE '%Himbauan%'")->num_rows();
?>
<!-- BEGIN VENDOR JS-->
<script src="<?php echo base_url('assets/') ?>app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>

<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="<?php echo base_url('assets/') ?>app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="<?php echo base_url('assets/') ?>app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>app-assets/js/core/app.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>/data-table/datatable.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>/data-table/datatableButton.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>/data-table/flash.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>/data-table/html5.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>/data-table/jzip.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>/data-table/pdf.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>/data-table/print.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>/data-table/vfs.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>/js/dropify.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/') ?>summernote/summernote.js"></script>
<script src="<?php echo base_url('assets/') ?>date-picker/moment.js"></script>
<script src="<?php echo base_url('assets/') ?>date-picker/bootstrap-datepicker.js"></script>
<!-- <script src="{{ asset('public/assets/js/sweetalert.js') }}"></script> -->
<script src="<?php echo base_url('assets/') ?>/data-table/select2.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- <script src="<?php echo base_url('assets/') ?>app-assets/js/scripts/pages/dashboard-2.js" type="text/javascript"></script> -->
<script>
	jQuery(document).ready(function() {

  $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
          });

  $('.inline-editor').summernote({
    airMode: true
  });

});
  jQuery('.mydatepicker, #datepicker').datepicker({format : 'yyyy-m-d'});
 jQuery('#datepicker-autoclose').datepicker({
  autoclose: true,
  todayHighlight: true
});
 jQuery('#date-range').datepicker({
  toggleActive: true
});
 jQuery('#datepicker-inline').datepicker({
  todayHighlight: true
});
 $('#example23').DataTable({
  dom: 'Bfrtip',
  buttons: [
  'copy', 'csv', 'excel', 'pdf', 'print'
  ]
});
 $('#example22').DataTable({
  dom: 'Bfrtip',
  buttons: [
    // 'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });
 $('.tableku').DataTable({
    // dom: 'Bfrtip',
    buttons: [
    // 'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });
 $('.guru').DataTable({
    // dom: 'Bfrtip',
    buttons: [
    // 'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });
 $(".select2").select2();
 $(".dropify").dropify();
 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

	</script>
<script>
      var ctx = document.getElementById('myChart');
      var myChart = new Chart(ctx, {
          type: 'line',
          data: {
              labels: ['Undangan', 'Permohonan', 'Laporan', 'Pemberitahuan', 'Himbauan'],
              datasets: [{
                  label: 'Total Surat',
                  data: [<?php echo $undangan;?>, <?php echo $Permohonan;?>, <?php echo $Laporan;?>, <?php echo $Pemberitahuan;?>, <?php echo $Himbauan;?>],
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)'
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)'
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });
      </script>
      <script>
      var ctx = document.getElementById('keluar');
      var myChart = new Chart(ctx, {
          type: 'line',
          data: {
              labels: ['Undangan', 'Permohonan', 'Laporan', 'Pemberitahuan', 'Himbauan'],
              datasets: [{
                  label: 'Total Surat',
                  data: [<?php echo $undangankeluar;?>, <?php echo $Permohonankeluar;?>, <?php echo $Laporankeluar;?>, <?php echo $Pemberitahuankeluar;?>, <?php echo $Himbauankeluar;?>],
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)'
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)'
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });
      </script>
      <script>
          CKEDITOR.replace( 'editor1' );
      </script>
<!-- END PAGE LEVEL JS-->
</body>
</html>
