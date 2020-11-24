<?php 
$admin = $this->db->where('id_pegawai',$this->session->userdata('kepala'))->get('pegawai')->result();
?>

<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title><?php echo $title ?></title>
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('assets/') ?>app-assets/images/ico/apple-icon-60.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/') ?>app-assets/images/ico/apple-icon-76.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/') ?>app-assets/images/ico/apple-icon-120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/') ?>app-assets/images/ico/apple-icon-152.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/') ?>app-assets/images/ico/favicon.ico">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/') ?>app-assets/images/ico/favicon-32.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>app-assets/css/bootstrap.css">
  <!-- font icons-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>app-assets/fonts/icomoon.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
 
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
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout  vertical-menu 2-columns  fixed-navbar">

  <!-- navbar-fixed-top-->
  <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow ">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav">
          <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
          
          <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
        </ul>
      </div>
      <div class="navbar-container content container-fluid">
        <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
          <ul class="nav navbar-nav">
            <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5"></i></a></li>
            
          </ul>
         
      </div>
    </div>
  </div>
</nav>

<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
  <!-- main menu header-->
   <div class="sidebar sidebar-main sidebar-fixed">
        <div class="sidebar-content">

          <!-- User menu -->
           <div class="main-menu-header">
            <center>
            <img src="<?php echo base_url();?>assets/app-assets/images/icons/abe.png" width="100px">
            </center>
          </div>
          <div class="sidebar-user">
            <div class="category-content">
              <div class="media">
                <a class="media-left"></a> 
                <div class="media-body">
                    
              <span class="media-heading text-semibold"><?php echo $admin[0]->nama ?></span>
              <div class="text-size-mini text-muted">
                <i class="text-size-medium"></i> &nbsp;<?php echo $admin[0]->jabatan?>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
  <!-- / main menu header-->
  <!-- main menu content-->
  <div class="main-menu-content">
     <span>Menu</span>
    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
      <li class=" nav-item"><a href="<?php echo base_url('kepala') ?>"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span></a>
      </li>

       <li class=" nav-item"><a href="#"><i class="fa fa-envelope"></i><span data-i18n="nav.advance_cards.main" class="menu-title">Arsip Surat</spanent></a>
        <ul class="menu-cont">
          <li><a href="<?php echo base_url('kepala/suratmasuk') ?>" data-i18n="nav.cards.masuk" class="menu-item">Surat Masuk</a>
          </li>
          <li><a href="<?php echo base_url('kepala/suratkeluar') ?>" data-i18n="nav.cards.keluar" class="menu-item">Surat Keluar</a>
          </li>
        </ul>
      </li>


      <li class=" nav-item"><a href="<?php echo base_url('kepala/disposisi') ?>"><i class="fa fa-envelope-open"></i><span data-i18n="nav.dash.main" class="menu-title">Disposisi Surat</span></a>
      </li>


      <li class=" nav-item"><a href="<?php echo base_url('kepala/rekapitulasisurat') ?>"><i class="fa fa-file"></i><span data-i18n="nav.dash.main" class="menu-title">Rekapitulasi Surat</span></a>
      </li>

      <li class="nav-item"><a href="<?php echo base_url('auth/logout')?>"><i class="icon-switch"></i> <span data-i18n="nav.dash.main" class="menu-title">Keluar </span></a></li>

    </ul>
  </div>  
</div>
<!-- / main menu-->

<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- Statistics -->
      <script>
        function cek() {
          if ($("#lama").val()!=='') {
            $.ajax({
              type: "GET",
              url: "<?php echo base_url('kepala/carilama/') ?>"+$("#lama").val(),
              success: function (data) {
                var dataa = data;
                if (dataa==1) {
                  $("#btnganti").prop('disabled',true);
                  $("#msgpassword").removeClass('hide');
                }else{
                  $("#btnganti").prop('disabled',false);
                  $("#msgpassword").addClass('hide');
                }
              }
            }); 
          }else{
            $("#msgpassword").addClass('hide');
            $("#btnganti").prop('disabled',false);
          }
        }

        function cekusername() {
          if ($("#user").val()!=='') {
            $.ajax({
              type: "GET",
              url: "<?php echo base_url('kepala/cariusername/') ?>"+$("#user").val(),
              success: function (data) {
                var dataa = data;
                if (dataa==1) {
                  $("#btnusername").prop('disabled',true);
                  $("#msgusername").removeClass('hide');
                }else{
                  $("#btnusername").prop('disabled',false);
                  $("#msgusername").addClass('hide');
                }
              }
            }); 
          }else{
            $("#msgusername").addClass('hide');
            $("#btnusername").prop('disabled',false);
          }
        }

        function sama() {
          if ($("#baru").val()!=='' && $("#baru2").val()!=='') {
           if ($("#baru").val()===$("#baru2").val()) {
            $("#msg2").addClass('hide');
            $("#btnganti").prop('disabled',false);
          }else{
            $("#msg2").removeClass('hide');
            $("#btnganti").prop('disabled',true);
          }
        }else{
          $("#msg2").addClass('hide');
          $("#btnganti").prop('disabled',false);
        }
      }

      function liat() {
        $("#lama").attr('type','text');
          // alert('haha');
        }
        function tutup() {
          $("#lama").attr('type','password');
          // alert('haha');
        }

        function liat3() {
          $("#lama3").attr('type','text');
        }
        function tutup3() {
          $("#lama3").attr('type','password');
          // alert('haha');
        }
        function liat2() {
          $("#baru").attr('type','text');
          // alert('haha');
        }
        function tutup2() {
          $("#baru").attr('type','password');
          // alert('haha');
        }
      </script>