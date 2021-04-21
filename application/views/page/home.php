<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $nama_app;?> - <?php echo $page;?></title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url();?>asset/image/logo.png" rel="icon">
  <link href="<?php echo base_url();?>asset/hompage/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <script src="https://kit.fontawesome.com/0592fb1a10.js" crossorigin="anonymous"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();?>asset/hompage/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>asset/hompage/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>asset/hompage/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>asset/hompage/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>asset/hompage/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url();?>asset/hompage/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url();?>asset/hompage/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bikin - v2.1.0
  * Template URL: https://bootstrapmade.com/bikin-free-simple-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <?php echo $header;?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">
      <h1>Selamat Datang Calon Pesert Didik Baru TP. 2021/2022</h1>
      <h2>TKIT - SDIT - SMPIT Al-Fityan Boarding School Bogor</h2>
      <a href="#about" class="btn-get-started scrollto">Pendaftaran</a>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-right">
            <div class="content">
              <h3>WELCOME TO ABSB</h3>
              <p>
                <?php echo $tentang;?>
              </p>
              <a href="https://alfityanbogor.sch.id/profileabsb/" target="_blank" class="about-btn">Tentang Kami <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
          <div class="col-xl-7 d-flex align-items-stretch" data-aos="fade-left">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="fa fa-school"></i>
                  <h4>TKIT</h4>
                  <p><?php echo $tk;?></p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="fa fa-school"></i>
                  <h4>SDIT</h4>
                  <p><?php echo $sd;?></p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="fa fa-school"></i>
                  <h4>SMPIT</h4>
                  <p><?php echo $smp;?></p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="fa fa-school"></i>
                  <h4>SMAIT</h4>
                  <p><?php echo $sma;?></p>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      
    </section><!-- End Clients Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features" data-aos="fade-up">
      <div class="container">

        <div class="section-title">
          <h2>Sekilas Al-Fityan Boarding School Bogor</h2>
        </div>

        <div class="row content">
          <div class="col-md-12" data-aos="fade-right" data-aos-delay="100">
            <iframe width="100%" height="600px" src="<?php echo $video;?>"></iframe>
          </div>
          
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Steps Section ======= -->
    <section id="steps" class="steps">
   
    </section><!-- End Steps Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Alasan Memilih Al-Fityan Boarding School Bogor</h2>
          <p></p>
        </div>

        <div class="row">
          <?php foreach ($alasan as $a) {?>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href=""><?php echo $a->judul;?></a></h4>
              <p class="description"><?php echo $a->deskripsi;?></p>
            </div>
          </div>
          <?php } ?>

        </div>

      </div>
    </section><!-- End Services Section -->
     <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Brosur dan Panduan PPDB</h2>
          
        </div>

        <div class="row">
          <div class="col-lg-2 col-md-2 mt-2 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="box">
              <h3>Brosur</h3>
              <div class="btn-wrap">
                <a href="<?php echo $brosur;?>" class="btn btn-lg btn-primary">Download Brosur</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="box">
              <h3>Panduan PPDB</h3>
              <div class="btn-wrap">
                <a href="<?php echo $paunduan;?>" class="btn btn-lg btn-primary">Download Panduan</a>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 mt-2 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
          </div>
        </div>
      </div>
    </section><!-- End Pricing Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Kontak</h2>
        </div>
        <div class="row">
          <div class="col-lg-2">
          </div>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="fa fa-whatsapp"></i>
                  <h3>Layanan Whatsapp</h3>
                  <?php foreach ($kontak as $k) {?>
                  <p><?php echo $k->whatsapp;?></p>
                  <?php } ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Center</h3>
                  <?php foreach ($call as $c) {?>
                  <p><?php echo $c->kontak;?><br>
                  </p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <?php echo $footer;?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url();?>asset/hompage/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>asset/hompage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>asset/hompage/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url();?>asset/hompage/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url();?>asset/hompage/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>asset/hompage/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url();?>asset/hompage/assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?php echo base_url();?>asset/hompage/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url();?>asset/hompage/assets/js/main.js"></script>

</body>

</html>