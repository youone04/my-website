<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?= $judul ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!--  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700" rel="stylesheet"> -->
     <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
     <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icon.jpg'); ?>"/>
     <link rel="stylesheet" href="<?= base_url('assets/css/open-iconic-bootstrap.min.css') ?>">
     <link rel="stylesheet" href="<?= base_url('assets/css/animate.css') ?>">
    
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap-4.3.1/css/bootstrap.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/aos.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/ionicons.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-datepicker.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/jquery.timepicker.css') ?>">

    
    <link rel="stylesheet" href="<?= base_url('assets/css/flaticon.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/icomoon.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/noscript.css') ?>">
  </head>
  <body>

     <div class="KW_progressContainer">
      <div class="KW_progressBar">

      </div>
    </div>
    <div class="page">
    <nav id="colorlib-main-nav" role="navigation">
      <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
      <div class="js-fullheight colorlib-table">
        <div class="img" style="background-image: url(<?= base_url('assets/images/yudi.jpg') ?>);"></div>
        <div class="colorlib-table-cell js-fullheight">
          <div class="row no-gutters">
            <div class="col-md-12 text-center">
              <h1 class="mb-4"><a href="<?= base_url('Controler_Portopolio') ?>" class="logo">Yudi Gunawan</a></h1>
              <ul>

                <?php if($this->session->userdata('nama') != null) {?>
                <li class="active"><a href="<?= base_url('Controler_Portopolio/Ds_admin') ?>"><span>Admin</span></a></li>
                <?php } ?>
                <li class="active"><a href="<?= base_url('Controler_Portopolio') ?>"><span>Halaman Utama</span></a></li>
                <li><a href="<?= base_url('Controler_Portopolio/Portopolio') ?>"><span>Portopolio</span></a></li>
                <li><a href="<?= base_url('Controler_Portopolio/Tentang') ?>"><span>Tentang</span></a></li>
                <li><a href="<?= base_url('Controler_Portopolio/berita') ?>"><span>Berita</span></a></li>
                <li><a href="<?= base_url('Controler_Portopolio/Kontak') ?>"><span>Kontak</span></a></li>
                <?php if($this->session->userdata('nama') == null){ ?>
                 <li><a href="<?= base_url('Controler_Portopolio/Login') ?>"><span>Login</span></a></li>
                <?php }else{ ?>
                   <li><a href="<?= base_url('Controler_Portopolio/LogOut') ?>"><span>Log Out</span></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    
    <div id="colorlib-page">
      <header>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="colorlib-navbar-brand">
                <a class="colorlib-logo" href="<?= base_url('Controler_Portopolio') ?>"><span class="logo-img" style="background-image: url(<?= base_url('assets/images/yudi.jpg') ?>);"></span>Yudi Gunawan</a>
              </div>
              <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
            </div>
          </div>
        </div>
      </header>

