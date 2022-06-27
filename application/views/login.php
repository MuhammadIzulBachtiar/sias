<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Sistem Informasi Arsip Surat</title>
    <link href="<?php echo base_url();?>assets/app-assets/images/icons/PEKALONGAN1.png" rel='shortcut icon'>
    <!-- <img src="<?php echo base_url();?>assets/app-assets/images/icons/abe.png" width="100px"> -->
    
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

</head>
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
        <!-- ////////////////////////////////////////////////////////////////////////////-->
        <div class="app-content content container-fluid" style="background: url('<?php echo base_url('assets/background.jpg');?>'); background-size: cover;">
        <!-- <div class="app-content content container-fluid" style="background-color: white; background-size: cover;"> -->
            <div class="content-wrapper">
             <div class="content-header row">
              </div>
              <div class="content-body"><section class="flexbox-container">
                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header no-border">
                            <div class="card-title text-xs-center">
                            <img src="<?php echo base_url();?>assets/app-assets/images/icons/PEKALONGAN1.png" width="100px">
                            <h2 class="text-primary mb-4"><b>Sistem Informasi Arsip Surat</b></h2>
                            <h6 class="text-gray-900 mb-4">Badan Pengelolaan Keuangan Daerah<br>Kabupaten Pekalongan</h6>

                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    <form class="form-horizontal form-simple" action="<?php echo base_url('auth/login') ?>" method="post" novalidate>
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="text" class="form-control form-control-lg input-lg" autocomplete="off" id="user-name" name="username" placeholder="Username" required>
                                            <div class="form-control-position">
                                                <i class="icon-person"></i>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                         <input type="password" class="form-control form-control-lg input-lg" id="user-password" autocomplete="off" name="password" placeholder="Password" required>
                                         <div class="form-control-position">
                                            <i class="icon-key2"></i>
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block"></i> Login</button>
                                </form>
                            </div>
                        </div>
                         <?php if ($this->session->flashdata('error')!==null): ?>
                            <div class="alert alert-danger">
                             Maaf Username atau Password anda salah!
                         </div>
                         <?php else: ?>
                            <p class="float-sm-left text-xs-center m-0"></p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
</body>
</html>