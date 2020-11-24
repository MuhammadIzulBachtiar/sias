  
</div>
</div>
</div>
<footer style="width: 100%;left: 0;position: fixed;bottom: 0" class="footer footer-static footer-light navbar-border">
  <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2019 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">Proyek Akhir Aplikasi Pembuatan Surat</a>, All rights reserved. </span></p>
</footer>

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
<!-- END PAGE LEVEL JS-->
</body>
</html>
