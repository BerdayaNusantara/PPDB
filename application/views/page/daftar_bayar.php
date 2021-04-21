<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $nama_app;?> - <?php echo $page;?></title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url();?>asset/hompage/assets/img/favicon.png" rel="icon">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- =======================================================
  * Template Name: Bikin - v2.1.0
  * Template URL: https://bootstrapmade.com/bikin-free-simple-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <?php echo $header;?>
  <main id="main">
   
    <!-- ======= Features Section ======= -->
    <section id="features" class="features" data-aos="fade-up">
      <div class="container">
        <br>
        <br>
        <br>
        <div class="section-title">
          <h2>Silahkan melakukan pembayaran biaya pendaftaran</h2>
        </div>
        <div class="section-body">
        <div class="row">
          <div class="col-sm-2"></div>
          <div class="col-sm-8">
            <p>Silahkan melakukan pembayaran Via transfer ke Rekening Virtual Account Bank BNI Syariah</p>
            <form action=""  enctype="multipart/form-data" id="formPendaftaran" method="POST" class="form-horizontal"  role="form">
              <div>
                <label>Nomor Pendaftaran</label>
                <input type="text" name="id_daftar" id="id_daftar"/>
                <input type="text" name="no_daftar" id="no_daftar" class="form-control" required />
              </div>
              <div>
                <label>Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required />
              </div>
              <div>
                <label>Jumlah Bayar</label>
                <input type="text" name="jumlah_bayar" id="jumlah_bayar" class="form-control" required />
              </div>
              <br>
              <button type="submit" id="submitbtn" class="btn btn-block btn-primary">Simpan</button>
            </form>
          </div>
          <div class="col-sm-2"></div>
        </div>
        </div>

      </div>
    </section><!-- End Features Section -->

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
  <script type="text/javascript">
    function passwordconf() {
      var password = $("#password").val();
      var pass = $("#conf_password").val();
      if(password!=pass){
        document.getElementById("note_pass").style.display = "block";
        document.getElementById("submitbtn").style.display = "none";
      }else{
        document.getElementById("note_pass").style.display = "none";
        document.getElementById("submitbtn").style.display = "block";
      }
    }
    $(function () {
      $('#formPendaftaran').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
          url: "<?php  echo base_url(); ?>backoffice/daftar_siswa",
          type: "POST",
          data:  new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          dataType:'json', 
          success: function(data){
            if(data.hasil==1){
              Swal.fire(
                'Selamat anda berhasil register',
                data.pesan,
              ).then(function(){
                    window.location.href = "<?php echo base_url();?>home/daftar_bayar/"+data.iduniq;
              });
            }else{
              Swal.fire({
                icon: 'warning',
                title: data.pesan,
                showConfirmButton: false,
                timer: 1000
              })
            }
            document.getElementById("formPendaftaran").reset();
          }   
        });
      });
    });
  </script>
</body>

</html>