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
          <h2>Pendaftaran Peserta Didik Baru 2020/2021</h2>
        </div>

        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <form action=""  enctype="multipart/form-data" id="formPendaftaran" method="POST" class="form-horizontal"  role="form">
              <div>
                <label>Nama Lengkap Calon Santri</label>
                <input type="text" name="nama" id="nama" class="form-control" required />
              </div>
              <div>
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div>
                <label>Nomor Whatsapp Wali Santri</label>
                <input type="text" name="no_wali_santri" id="no_wali_santri" class="form-control" required />
              </div>
              <div>
                <label>Email Wali Santri</label>
                <input type="text" name="email_wali_santri" id="email_wali_santri" class="form-control" required />
              </div>
              <div>
                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control" required />
              </div>
              <div>
                <label>Konfirmasi Password</label>
                <input type="password" name="conf_password" id="conf_password" oninput="passwordconf()" class="form-control" required />
                <p id="note_pass" style="display: none; color:#FF0000;">Password tidak cocok</p>
              </div>
              <div>
                <label>Jenjang</label>
                <select name="jenjang" id="jenjang" class="form-control" required>
                  <option value="">Pilih Jenjang</option>
                  <option value="TKIT A">TKIT A</option>
                  <option value="TKIT B">TKIT B</option>
                  <option value="SDIT">SDIT</option>
                  <option value="SMPIT Quran">SMPIT Quran</option>
                  <option value="SMPIT Akademik">SMPIT Akademik</option>
                  <option value="SMAIT">SMAIT</option>
                </select>
              </div>
              <br>
              <button type="submit" id="submitbtn" class="btn btn-block btn-primary">Simpan</button>
            </form>
          </div>

          <div class="col-md-2"></div>
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
           		var iduniq = data.iduniq;
	           	var jenjang = document.getElementById("jenjang").value;
	           	var key="<?php echo $ipaymu; ?>";
	           	var product=["Biaya Pendaftaran Peserta Didik","Biaya Administrasi Peserta Didik"];
	           	if(jenjang=="TKIT A"){
	           	    var biaya_daftar = <?php echo $biayatk_a;?>;
	           	    var biaya_admin = <?php echo $biayatk_a_admin;?>;
                }else if(jenjang=="TKIT B"){
        		    var biaya_daftar = <?php echo $biayatk_b;?>;
        		    var biaya_admin = <?php echo $biayatk_b_admin;?>;
        		}else if(jenjang=="SDIT"){
        			var biaya_daftar = <?php echo $biayasd;?>;
        			var biaya_admin = <?php echo $biayasd_admin;?>;
        		}else if(jenjang=="SMPIT Quran"){
        			var biaya_daftar = <?php echo $biayasmp_quran;?>;
        			var biaya_admin = <?php echo $biayasmp_quran_admin;?>;
        		}else if(jenjang=="SMPIT Akademik"){
        			var biaya_daftar = <?php echo $biayasmp_akademik;?>;
        			var biaya_admin = <?php echo $biayasmp_akademik_admin;?>;
        		}else if(jenjang=="SMAIT"){
        			var biaya_daftar = <?php echo $biayasma;?>;
        			var biaya_admin = <?php echo $biayasma_admin;?>;
        		}
        		var price=[biaya_daftar,biaya_admin];
        		var pricetotal = parseInt(biaya_daftar)+parseInt(biaya_admin);
              	var quantity=["1","1"];
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