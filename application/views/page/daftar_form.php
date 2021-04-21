  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $page;?> - <?php echo $instansi;?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="https://smkmuhammadiyah2cepu.sch.id/asset/logo/logo_sekolah.png" rel="icon">
  <link href="https://smkmuhammadiyah2cepu.sch.id/asset/logo/logo_sekolah.png" rel="apple-touch-icon">

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Form Pendaftaran</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
     
      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

        <div class="col-lg-2 mt-5 mt-lg-0">
        </div>
        <div class="col-lg-8 mt-5 mt-lg-0">

        <form action=""  enctype="multipart/form-data" id="formPendaftaran"  method="post" role="form" class="php-email-form">
        <div class="row">
            <div class="col-md-12 form-group">
            <input type="text" name="no_wali_santri" id="no_wali_santri" class="form-control" oninput="whastappconf()" placeholder="Nomor whatsapp" require>
            <p id="note_whatsapp" style="display: none; color:#FF0000;">Pastikan Nomor whatsapp aktif</p>
            <p id="otp_berhasil" style="display: none; color:#198754;">Nomor Whatsapp Terkonfirmasi</p>
            </div>
            <div class="col-md-12 form-group text-center"  style="display:none;" id="div_btotp">
            <button type="button" class="btn btn-sm btn-success" id="btnotp" onclick="kirimotp()">Kirim OTP</button><br>
            </div>
            <div class="col-md-12 form-group"  style="display:none;" id="div_textotp">
            <input type="text" name="kode_otp" id="kode_otp" class="form-control" placeholder="Masukkan Kode OTP">
            </div>
            <div class="col-md-12 form-group text-center"  style="display:none;" id="div_konfirmotp">
            <button type="button" class="btn btn-sm btn-success" id="konfirmotp" onclick="actkonfirmotp()">Konfirmasi</button>
            <button type="button" class="btn btn-sm btn-warning" id="konfirmotp" onclick="actresetotp()">Input Nomor Ulang</button>
            <button type="button" class="btn btn-sm btn-danger" id="konfirmotp" onclick="kirimotp()">Kirim Ulang</button><br>
            </div>
            <div class="col-md-12 form-group">
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" require readonly>
            </div>
            <div class="col-md-12 form-group">
            <input type="text" name="nisn" id="nisn" class="form-control" placeholder="NISN" require readonly>
            </div>
            <div class="col-md-12 form-group">
            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" require disabled>
                <option value="">Pilih jenis kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            </div>
            
            <div class="col-md-12 form-group">
            <input type="text" name="email_wali_santri" id="email_wali_santri" class="form-control" placeholder="Alamat Email" require readonly>
            </div>
            <div class="col-md-12 form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" require readonly>
            </div>
            <div class="col-md-12 form-group">
            <input type="password" name="conf_password" id="conf_password" oninput="passwordconf()"  class="form-control" placeholder="Konfirmasi Password" require readonly>
            <p id="note_pass" style="display: none; color:#FF0000;">Password tidak cocok</p>
            </div>
            <div class="col-md-12 form-group">
            <select class="form-control" name="jenjang" id="jenjang" onchange="changejenjang()" require disabled>
                <option value="">Pilih Jenjang/Jurusan</option>
                <?php foreach($data_jenjang as $dj){?>
                <option value="<?php echo $dj->id;?>"><?php echo $dj->nama;?></option>
                <?php } ?>
            </select>
            </div>
        </div>
        <div class="text-center"><button type="submit" id="submitbtn" style="display:none;">Daftar</button></div>
        <!-- <div class="text-center"><button type="button" onclick="resetform()" >Reset Form</button></div> -->
        </form>
        </div>
        </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
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

  <script type="text/javascript">
    function resetform(){
      document.getElementById("note_whatsapp").style.display = "none";
      document.getElementById("otp_berhasil").style.display = "none";
      document.getElementById("div_btotp").style.display = "none";
      document.getElementById("div_textotp").style.display = "none";
      document.getElementById("div_konfirmotp").style.display = "none";
      document.getElementById("note_pass").style.display = "none";
      document.getElementById("jenjang").style.display = "disabled";
      document.getElementById("no_wali_santri").value="";
      document.getElementById("nama").value="";
      document.getElementById("nisn").value="";
      document.getElementById("jenis_kelamin").value="";
      document.getElementById("email_wali_santri").value="";
      document.getElementById("password").value="";
      document.getElementById("conf_password").value="";
      document.getElementById("jenjang").value="";
      document.getElementById("nama").readOnly = true;
      document.getElementById("nisn").readOnly = true;
      document.getElementById("jenis_kelamin").disabled = true;
      document.getElementById("email_wali_santri").readOnly = true;
      document.getElementById("password").readOnly = true;
      document.getElementById("conf_password").readOnly = true;
      document.getElementById("jenjang").disabled = true;
    }
    const showLoading = function() {
    Swal.fire({
      title: 'Proses, Mohon tunggu...',
      allowEscapeKey: false,
      allowOutsideClick: false,
      timer: 2000,
      onOpen: () => {
        swal.showLoading();
      }
    }).then(
      () => {},
      (dismiss) => {
        if (dismiss === 'timer') {
          console.log('closed by timer!!!!');
          Swal.fire({ 
            title: 'Finished!',
            type: 'success',
            timer: 2000,
            showConfirmButton: false
          })
        }
      }
    )
    };
    const showLoadingLong = function() {
    Swal.fire({
      title: 'Proses, Mohon tunggu...',
      allowEscapeKey: false,
      allowOutsideClick: false,
      timer: 7000,
      onOpen: () => {
        swal.showLoading();
      }
    }).then(
      () => {},
      (dismiss) => {
        if (dismiss === 'timer') {
          console.log('closed by timer!!!!');
          Swal.fire({ 
            title: 'Finished!',
            type: 'success',
            timer: 7000,
            showConfirmButton: false
          })
        }
      }
    )
    };

    $(document).ready( function () {
      $.ajax({
        type: "POST",
				url: "<?php  echo base_url(); ?>home/cek_buka",
        dataType:'json',
        success: function(data) {
          if(data.status=="Tutup"){
            Swal.fire({
              icon: 'warning',
              title: "Mohon maaf pendafataran di tutup",
              showConfirmButton: true
            }).then(function(){
                    window.location.href = "<?php echo base_url();?>";
            });
          }else if(data.status=="Belum buka")
          {
            Swal.fire({
              icon: 'warning',
              title: "Mohon maaf pendafataran "+data.status,
              showConfirmButton: true
            }).then(function(){
                    window.location.href = "<?php echo base_url();?>";
            });
          }else if(data.status=="Sudah tutup")
          {
            Swal.fire({
              icon: 'warning',
              title: "Mohon maaf pendafataran "+data.status,
              showConfirmButton: true
            }).then(function(){
                    window.location.href = "<?php echo base_url();?>";
            });
          }
        }
      });
    });
    function changejenjang(){
      var jenjang = $("#jenjang").val();
      $.ajax({
        type: "POST",
				url: "<?php  echo base_url(); ?>jenjang/cek_kuota",
				data:{
          jenjang:jenjang
        },
        dataType:'json',
        success: function(data) {
          if(data.sisa==0){
            Swal.fire({
              icon: 'warning',
              title: "Mohon maaf kuota jenjang sudah habis",
              showConfirmButton: false,
              timer: 1000
            });
            $("#jenjang").val("");
          }
        }
      });
      
    }
    function whastappconf(){

      var nowhatsapp = $("#no_wali_santri").val(); 
      document.getElementById("note_whatsapp").style.display = "block";
      if(nowhatsapp.length>=10)
      {
        document.getElementById("div_btotp").style.display = "unset";
      }else{
        document.getElementById("div_btotp").style.display = "none";
      }
    }
    function generateOTP() { 
      var digits = '0123456789'; 
      let OTP = ''; 
      for (let i = 0; i < 6; i++ ) { 
        OTP += digits[Math.floor(Math.random() * 10)]; 
      } 
      return OTP; 
    } 
    function actkonfirmotp()
    {
      var otp = document.getElementById("kode_otp").value;
      var nowa = document.getElementById("no_wali_santri").value;
      $.ajax({
        type: "POST",
				url: "<?php  echo base_url(); ?>backoffice/konfirmotp",
				data:{
          otp:otp,
          nomor:nowa,
        },
        dataType:'json',
        success: function(data) {
          if(data.hasil==1){
            document.getElementById("div_textotp").style.display = "none";
            document.getElementById("div_konfirmotp").style.display = "none";
            document.getElementById("otp_berhasil").style.display = "unset";
            document.getElementById("nama").readOnly = false;
            document.getElementById("nisn").readOnly = false;
            document.getElementById("no_wali_santri").readOnly = false;
            document.getElementById("email_wali_santri").readOnly = false;
            document.getElementById("password").readOnly = false;
            document.getElementById("conf_password").readOnly = false;
            document.getElementById("jenjang").disabled = false;
            document.getElementById("jenis_kelamin").disabled = false;
            document.getElementById("submitbtn").style.display = "unset";
            Swal.fire({
              icon: 'success',
              title: "Nomor Whatsapp sudah terkonfirmasi",
              showConfirmButton: false,
              timer: 1000
            })
          }else{
            Swal.fire({
              icon: 'warning',
              title: "Kode OTP yang dimasukkan salah mohon input ulang",
              showConfirmButton: false,
              timer: 1000
            })
          }
        }
      });
    }
    function kirimotp(){
      showLoading();
      var otp = generateOTP();
      var nowa = document.getElementById("no_wali_santri").value;
      $.ajax({
        type: "POST",
				url: "<?php  echo base_url(); ?>backoffice/kirimotp",
				data:{
          otp:otp,
          nomor:nowa,
        },
        dataType:'json',
        success: function(data) {
          if(data.hasil==1){
            document.getElementById("div_btotp").style.display = "none";
            document.getElementById("no_wali_santri").readOnly = true;
            document.getElementById("div_textotp").style.display = "unset";
            document.getElementById("div_konfirmotp").style.display = "unset";
            document.getElementById("note_whatsapp").style.display = "none";
            Swal.fire({
              icon: 'success',
              title: 'Kode OTP dikirim ke whatsapp kamu',
              showConfirmButton: false,
              timer: 2000
            });
          }else{
            Swal.fire({
              icon: 'warning',
              title: 'Nomor anda sudah terdaftar di sistem',
              showConfirmButton: false,
              timer: 2000
            });
          }
        }
      });
    }
    function passwordconf() {
      var password = $("#password").val();
      var pass = $("#conf_password").val();
      if(password!=pass){
        document.getElementById("note_pass").style.display = "block";
        document.getElementById("submitbtn").style.display = "none";
      }else{
        document.getElementById("note_pass").style.display = "none";
        document.getElementById("submitbtn").style.display = "unset";
      }
    }
    $(function () {
      $('#formPendaftaran').on('submit', function (e) {
        showLoadingLong();
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
           	  var iduniq = data.iduniq;
	           	var jenjang = document.getElementById("jenjang").value;
	           	var key="<?php echo $ipaymu; ?>";
	           	var product=["Biaya Pendaftaran Peserta Didik"];
              var biaya_daftar = <?php echo $biaya;?>;
        		  var price=[biaya_daftar];
        		  var pricetotal = parseInt(biaya_daftar);
              var quantity=["1"];
              var unotify="<?php echo base_url();?>/backoffice/siswa_bayar_status";
			        var pay_method="bni";
			        var buyer_name=document.getElementById("nama").value;
			        var buyer_email=document.getElementById("email_wali_santri").value;
			        var buyer_phone=document.getElementById("no_wali_santri").value;
			        var urlpayment="";
              $.ajax({
				        type: "POST",
				        url: "https://my.ipaymu.com/payment",
				        data:{
                  key:key,
                  action:'action',
                  "product[]":product,
                  "price[]":price,
                  "quantity[]":quantity,
                  unotify:unotify,
                  buyer_name:buyer_name,
                  buyer_email:buyer_email,
                 	buyer_phone:buyer_phone,
                 	format:'json'
               	},
               	mimeType: 'multipart/form-data',
               	dataType:'json',
				        success: function(data) {
                  urlpayment=data.url;
                  $.ajax({
                    type: "POST",
						        url: "<?php  echo base_url(); ?>backoffice/daftar_siswa_bayar",
						        data:{
                      iduniq:iduniq,
                      buyer_name:buyer_name,
                      jenjang:jenjang,
                      urlpayment:urlpayment,
                      price:pricetotal,
                      buyer_phone:buyer_phone,
                      buyer_email:buyer_email,
                    },
						        dataType:'json',
						        success: function(data) {
                      resetform();
                      Swal.fire({
                     	  icon: 'success',
			        			    title: 'Selamat anda berhasil register,silahkan lanjutkan pembayaran',
			        			    showConfirmButton: true,
			        			    confirmButtonText:'Lanjutkan Pembayaran',
			        			  }).then(function(){
                          window.location.href = urlpayment;
					       		  });
                    }
                  });
               	}
              });        	
		        }else{
        		  Swal.fire({
        			  icon: 'warning',
        			  title: data.pesan,
        			  showConfirmButton: false,
        			  timer: 3000
        			})
        		}
          }   
        });
      });
    });
  </script>
</body>

</html>