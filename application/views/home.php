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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
  <section id="hero" class="d-flex justify-content-center align-items-center" style="background:url(<?php echo base_url();?>upload/image/brosurcepu.png);background-size:cover;background-repeat:no-repeat;">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1><?php echo $nama_sekolah;?></h1>
      <h2>Penerimaan Peserta Didik Baru Tahun 2021/2022</h2>
      <a href="<?php echo base_url();?>daftar" class="btn-get-started">Daftar</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          &nbsp;

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="content" style="width:100%">
                    <h3>Cek NISN Anda disini</h3>
                    <p>
                    Silahkan cek NISN anda disini untuk melihat status pendaftaran anda
                    </p>
                    <div class="text-center">
                    <form action="" id="formCek"  method="post" role="form" class="php-email-form">
                        
                      <div class="col-md-12 form-group">
                      <input type="text" name="nisn" id="nisn" class="form-control" placeholder="NISN" require><br>
                      </div>
                       <div class="text-center"><button type="submit" id="submitbtn" class="btn btn-md btn-primary" style="display:unset;">Cek NISN</button></div>
                    </form>
                        <!-- <a href="about.html" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a> -->
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
          <div class="col-lg-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <?php foreach($data_jenjang as $dj){?>
                <div class="col-xl-3 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <img src="<?php echo base_url();?>upload/logo/<?php echo $dj->logo;?>"/>
                    <h4><?php echo $dj->nama;?></h4>
                    <p><?php echo $dj->keterangan;?></p>
                  </div>
                </div>
                <?php } ?>
                
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Popular Courses Section ======= -->
    <section id="why-us" class="why-us" >
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Informasi PPDB</h2>
          <p>Jadwal Pendaftaran</p>
        </div>

        
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="content" style="background:#eef0ef;color:#000;width:100%">
                    <?php foreach($jadwal as $dj){?>
                    <p style="margin-bottom:5px;"><i class="fa fa-calendar"></i> <?php echo $dj->tanggal_mulai_format;?> - <?php echo $dj->tanggal_selesai_format;?>
                        <h5> <i class="fa fa-chevron-right"></i> <?php echo $dj->nama;?></h5>
                        </p>
                    
                    <?php } ?>
                </div>
            </div>
        </div>
        
      </div>
    </section><!-- End Popular Courses Section -->

    <!-- ======= Popular Courses Section ======= -->
    <section id="why-us" class="why-us" >
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Informasi PPDB</h2>
          <p>Syarat Administrasi</p>
        </div>

        
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="content" style="background:#eef0ef;color:#000;width:100%">
                    <?php foreach($syarat as $s){?>
                    <p style="margin-bottom:5px;">
                        <h5> <i class="fa fa-chevron-right"></i> <?php echo $s->nama;?></h5>
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
  <script src="<?php echo base_url();?>asset/hompage/assets/vendor/jquery/jquery.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url();?>assets/themehompage/assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url();?>assets/themehompage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/themehompage/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url();?>assets/themehompage/assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?php echo base_url();?>assets/themehompage/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url();?>assets/themehompage/assets/js/main.js"></script>
  <script>

    $(function () {
      $('#formCek').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
          url: "<?php  echo base_url(); ?>backoffice/ceknik",
          type: "POST",
          data:  new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          dataType:'json', 
          success: function(data){
            if(data.hasil=="0"){
              Swal.fire({
                icon: "warning",
                title: data.pesan,
                showConfirmButton: false,
                timer: 1000
              });
            }else{
              Swal.fire({
                icon: "success",
                title: data.pesan,
                showConfirmButton: false,
                timer: 1000
              });
            }
          }   
        });
      });
    });
  </script>
</body>

</html>