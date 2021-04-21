<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $page;?> - <?php echo $instansi;?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/plugins/fontawesome-free/css/all.min.css">
  <!-- Favicons -->
  <link href="https://smkmuhammadiyah2cepu.sch.id/asset/logo/logo_sekolah.png" rel="icon">
  <link href="<?php echo base_url();?>assets/themehompage/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();?>assets/themehompage/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/themehompage/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/themehompage/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/themehompage/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/themehompage/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/themehompage/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/themehompage/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url();?>assets/themehompage/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v4.0.1
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="<?php echo base_url();?>"><img src="http://smkmuhammadiyah2cepu.sch.id/asset/logo/logo_sekolah.png"  style="display:block;margin:auto;"/></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <?php echo $navbar;?>

    </div>
  </header><!-- End Header -->



  <!-- ======= Hero Section ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Biaya Pendidikan</h2>
      </div>
    </div><!-- End Breadcrumbs -->
  <main id="main">
    
    <!-- ======= Popular Courses Section ======= -->
    <section id="why-us" class="why-us" >
      <div class="container" data-aos="fade-up">
      <div class="section-title">
          <h2>Informasi PPDB</h2>
          <p>Rincian Biaya Pendidikan</p>
        </div>
        
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="content" style="background:#eef0ef;color:#000;width:100%">
                    <?php foreach($data_biaya as $s){?>
                    <p style="margin-bottom:5px;">
                        <h5> <i class="fa fa-chevron-right"></i> <?php echo $s->keterangan;?><br>
                                &nbsp;&nbsp;&nbsp; <?php echo number_format($s->biaya);?></h5>
                        </p>
                    
                    <?php } ?>
                </div>
            </div>
        </div>
        
      </div>
      
    </section><!-- End Popular Courses Section -->
    <section id="why-us" class="why-us" >
      <div class="container" data-aos="fade-up">
      <div class="section-title">
          <h2>Informasi PPDB</h2>
          <p>Kriteria Keringanan Biaya Pendidikan</p>
        </div>
        
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="content" style="background:#eef0ef;color:#000;width:100%">
                    <?php foreach($data_biaya_ringan as $s){?>
                    <p style="margin-bottom:5px;">
                        <h5> <i class="fa fa-chevron-right"></i> <?php echo $s->keterangan;?></h5>
                        </p>
                    
                    <?php } ?>
                </div>
            </div>
        </div>
        
      </div>
      
    </section><!-- End Popular Courses Section -->


  </main><!-- End #main -->
  <?php echo $footer;?>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url();?>assets/themehompage/assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url();?>assets/themehompage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/themehompage/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url();?>assets/themehompage/assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?php echo base_url();?>assets/themehompage/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url();?>assets/themehompage/assets/js/main.js"></script>

</body>

</html>