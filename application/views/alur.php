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
<style>
    .timeline {
	  list-style: none;
	  padding: 20px 0 20px;
	  position: relative;
	}
	.timeline:before {
	  top: 0;
	  bottom: 0;
	  position: absolute;
	  content: " ";
	  width: 3px;
	  background-color: #eeeeee;
	  left: 50%;
	  margin-left: -1.5px;
	}
	.timeline > li {
	  margin-bottom: 20px;
	  position: relative;
	}
	.timeline > li:before,
	.timeline > li:after {
	  content: " ";
	  display: table;
	}
	.timeline > li:after {
	  clear: both;
	}
	.timeline > li:before,
	.timeline > li:after {
	  content: " ";
	  display: table;
	}
	.timeline > li:after {
	  clear: both;
	}
	.timeline > li > .timeline-panel {
	  width: 50%;
	  float: left;
	  border: 1px solid #d4d4d4;
	  border-radius: 2px;
	  padding: 20px;
	  position: relative;
	  -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
	  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
	}
	.timeline > li.timeline-inverted + li:not(.timeline-inverted),
	.timeline > li:not(.timeline-inverted) + li.timeline-inverted {
	margin-top: -60px;
	}
	
	.timeline > li:not(.timeline-inverted) {
	padding-right:90px;
	}
	
	.timeline > li.timeline-inverted {
	padding-left:90px;
	}
	.timeline > li > .timeline-panel:before {
	  position: absolute;
	  top: 26px;
	  right: -15px;
	  display: inline-block;
	  border-top: 15px solid transparent;
	  border-left: 15px solid #ccc;
	  border-right: 0 solid #ccc;
	  border-bottom: 15px solid transparent;
	  content: " ";
	}
	.timeline > li > .timeline-panel:after {
	  position: absolute;
	  top: 27px;
	  right: -14px;
	  display: inline-block;
	  border-top: 14px solid transparent;
	  border-left: 14px solid #fff;
	  border-right: 0 solid #fff;
	  border-bottom: 14px solid transparent;
	  content: " ";
	}
	.timeline > li > .timeline-badge {
	  color: #fff;
	  width: 50px;
	  height: 50px;
	  line-height: 50px;
	  font-size: 1.4em;
	  text-align: center;
	  position: absolute;
	  top: 16px;
	  left: 50%;
	  margin-left: -25px;
	  background-color: #999999;
	  z-index: 100;
	  border-top-right-radius: 50%;
	  border-top-left-radius: 50%;
	  border-bottom-right-radius: 50%;
	  border-bottom-left-radius: 50%;
	}
	.timeline > li.timeline-inverted > .timeline-panel {
	  float: right;
	}
	.timeline > li.timeline-inverted > .timeline-panel:before {
	  border-left-width: 0;
	  border-right-width: 15px;
	  left: -15px;
	  right: auto;
	}
	.timeline > li.timeline-inverted > .timeline-panel:after {
	  border-left-width: 0;
	  border-right-width: 14px;
	  left: -14px;
	  right: auto;
	}
	.timeline-badge.primary {
	  background-color: #2e6da4 !important;
	}
	.timeline-badge.success {
	  background-color: #3f903f !important;
	}
	.timeline-badge.warning {
	  background-color: #f0ad4e !important;
	}
	.timeline-badge.danger {
	  background-color: #d9534f !important;
	}
	.timeline-badge.info {
	  background-color: #5bc0de !important;
	}
	.timeline-title {
	  margin-top: 0;
	  color: inherit;
	}
	.timeline-body > p,
	.timeline-body > ul {
	  margin-bottom: 0;
	}
	.timeline-body > p + p {
	  margin-top: 5px;
	}
    #icon_menu{
    	font-size: 40px;
    	margin-top: 5px;
    }
    @media only screen and (max-width: 600px) {
	  #icon_menu{
    	font-size: 25px;
    	margin-top: 5px;
    	}
	}
</style>
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
        <h2>Alur Pendaftaran</h2>
      </div>
    </div><!-- End Breadcrumbs -->
  <!-- End Hero -->

    <main id="main">
    <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts section-bg">
            <div class="container">
            <ul class="timeline">
			    	<?php 
			    	$no=1;
			    	$num=1;
			    	foreach($data_alur as $d){
			        $mod =  $no++ %2;?>
			        <?php if($mod==0){?>
			        <li class="timeline-inverted">
			        <?php }else{?>
			        <li>
			        <?php } ?>
			          <div class="timeline-badge"><?php echo $num++;?></div>
			          <div class="timeline-panel">
			            <div class="timeline-heading">
			              <h4 class="timeline-title"><?php echo $d->nama;?></h4>
			              <p><small class="text-muted"><i class="fa fa-calendar"></i> <?php echo $d->tanggal;?></small></p>
			            </div>
			            <div class="timeline-body" style="margin-right: -20px; margin-left: -10px;">
			            <p><?php echo $d->keterangan;?></p>  
			            </div>
			          </div>
			        </li>
			        <?php } ?>
			    </ul>
            </div>
        </section><!-- End Counts Section -->
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