<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>Cetak Surat <?php echo $perihal;?></title>

  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>app-assets/css/bootstrap.css">
  <!-- font icons-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>app-assets/fonts/icomoon.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>app-assets/vendors/css/extensions/pace.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN ROBUST CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>app-assets/css/bootstrap-extended.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>app-assets/css/colors.css">
  <!-- END ROBUST CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>app-assets/css/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>app-assets/css/core/colors/palette-gradient.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>css/dropify.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>date-picker/bootstrap-datepicker.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/data-table/select2.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>summernote/summernote.css">


  <style type="text/css">
    html body{
      overflow-x: hidden;
    }
    .hide{
      display: none;
    }
    .alert{
      color:white!important;
    }
  </style>
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns">

<section>
  <div class="tab-pane p-4" id="profile2" role="tabpanel" >
              <div class="col-md-12 p-4" id="print" style="padding-top: 10px; padding-right: 50px; padding-left: 50px;">
                <br>
                <ul class="media-list row" style="border: 0px!important;margin-left: -50px;margin-right: -50px;">
                  <li class="media" style="border: 0px!important;">
                    <div class="media-left">
                      <a href="#">
                        <img class="media-object width-170" src="<?php echo base_url('assets/aye.png') ?>" alt="Generic placeholder image"  style="width: 120px;">
                      </a>
                    </div>
                    <div class="media-body media-search">
                      <tr>
                        <center>
                          <h5 style="margin: 0;font-family: sans-serif;font-size: 1rem;font-weight: 500;"> KEMENTERIAN PERHUBUNGAN</h5>
                          <h3 style="margin: 0;font-weight: 500;">DIREKTORAT JENDRAL PERHUBUNGAN LAUT</h3>
                          <h2 style="margin: 0;font-family: sans-serif;">KANTOR KESYAHBANDARAN DAN OTORITAS</h2>
                          <h2 style="margin: 0;font-family: sans-serif;">PELABUHAN KELAS II GRESIK</h2>
                      </center>
                      <td width="20%"></td>
                      </tr>
                      <table class="table" style="border-bottom: 1px double #000 width:100%">
                      <tr>
                        <td style="text-align: center;width: 30%;padding:15px;font-family: sans-serif;">
                          <h4 style="margin-bottom: 8px;">Jl. Yos Sudarso Gresik</h4>
                          <h4 style="margin: 0">Kode Pos : 61114</h4>
                        </td>
                        <td style="text-align: left;width: 40%;padding:5px 15px;border-left: 1px solid #000;border-right: 1px solid #000">
                          <div><span style="display: inline-block;width: 70px;">Telp</span><span>: (031) 3981902</span></div>
                          <div><span style="display: inline-block;width: 70px;">E-mail</span><span>:</span></div>
                          <div style="display: inline-block;width: 70px;"><span>Web-site</span><span>:</span></div>
                        </td>
                        <td style="text-align: left;width: 30%;padding: 5px 15px;">
                          <div><span style="display: inline-block;width: 70px;">TGM</span><span>:</span></div>
                          <div><span style="display: inline-block;width: 70px;">TLX</span><span>:</span></div>
                          <dir><span style="display: inline-block;width: 70px;">FAX</span><span>: (031) 3990588</span></dir>
                        </td>
                      </tr> 
                    </table>
                    </div>
                  </li>
                </ul>
                <hr>
                
                <span style="float: right;margin-right: 150px;" id="tempat">Gresik, <?php echo $tempat_tanggal;?></span><br>
                <span style="float: right;margin-right: 150px;">Kepada:</span><br>
                <span style="float: right;margin-right: 0px; width: 200px;" id="kepada"><?php echo $kepada;?></span>
                <p>
                  <table width="100%">
                    <tr>
                      <td width="10%"><b>Nomor</b></td>
                      <td width="1%">:</td>
                      <td><?php echo $nomor;?></td>
                    </tr>
                    <tr>
                      <td><b>Sifat</b></td>
                      <td>:</td>
                      <td><?php echo $sifat;?></td>
                    </tr>
                    <tr>
                      <td><b>Lampiran</b></td>
                      <td>:</td>
                      <td><?php echo $lampiran;?></td>
                    </tr>
                    <tr>
                      <td><b>Perihal</b></td>
                      <td>:</td>
                      <td><?php echo $perihal;?></td>
                    </tr>
                  </table>
                </p>
                <!-- <p style="margin-top: -10px!important;">Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span id="nomor"></span></p>
                <p style="margin-top: -10px!important;">Sifat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span id="sifat"></span></p>
                <p style="margin-top: -10px!important;">Lampiran &nbsp;&nbsp;&nbsp;&nbsp;: <span id="lampiran"></span></p>
                <p style="margin-top: -10px!important;">Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span ><u><b id="perihal"></b></u></span></p> -->
                <p style="top: 0px;" id="isi"><?php echo $isi_surat;?></p>
                <p style="text-align: right; right: 50px;margin-top: 100px;">KEPALA KANTOR</p>
                <p style="text-align: right; right: 60px;margin-top: 100px;">KESYAHBANDARAN DAN OTORITAS PELABUHAN KELAS II GRESIK</p>
                <br>
                <br>
                <br>
                <p style="text-align: right;"><u><b><u>R.TOTOK MUKARTOK,SH,CN,M.SI</u></b></u><br>Pembina Tk I (IV/b) <br> NIP : 19670122 199003 1 001</p>
                <span style="text-align: left;left: 80px;">Tembusan:</span><br>
                <p id="tembusan"><?php echo $tembusan;?></p>
              </div>
            </div>
</section>
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
<script type="text/javascript">
  window.print();
</script>
</body>
</html>
