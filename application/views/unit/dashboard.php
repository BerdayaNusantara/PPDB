<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $page;?> - <?php echo $instansi;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">
    <?php echo $navbar;?>
    <?php echo $sidebar;?>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- End Navbar -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <p class="card-category"><i class="fa fa-user-tie "></i>  Jumlah Pendaftar<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nama_jenjang;?></p>
                  <h3 class="card-title"><?php echo $jumlah_siswa;?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo base_url();?>unit/siswa" class="btn btn-sm btn-success">Lihat daftar calon siswa</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <p class="card-category"><i class="fa fa-money-bill-wave"></i>  Pembayaran Selesai<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nama_jenjang;?></p>
                  <h3 class="card-title"><?php echo "Rp. ".number_format($jumlah_berhasil);?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo base_url();?>unit/pembayaran" class="btn btn-sm btn-success">Lihat daftar pembayaran</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <p class="card-category"><i class="fa fa-money-bill-wave"></i>  Pembayaran Pending<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nama_jenjang;?></p>
                  <h3 class="card-title"><?php echo "Rp. ".number_format($jumlah_pending);?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo base_url();?>unit/pembayaran" class="btn btn-sm btn-success">Lihat daftar pembayaran</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <p class="card-category"><i class="fa fa-users"></i>  Master User</p>
                  <h3 class="card-title"><?php echo $jum_user;?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo base_url();?>backoffice/user" class="btn btn-sm btn-success">Lihat master user</a>
                  </div>
                </div>
              </div>
            </div> -->

            <div class="col-lg-6 col-md-6 col-sm-6">
              	<div class="card card-stats">
					<canvas id="pie-chart"></canvas>
				</div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              	<div class="card card-stats">
					<canvas id="pie-chart-pembayaran"></canvas>
				</div>
            </div>
          </div>
        </div>
      </section>
      </div>
      <?php echo $footer;?>
  </div>
  <!--   Core JS Files   -->
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/theme/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>assets/theme/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>assets/theme/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/theme/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url();?>assets/theme/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url();?>assets/theme/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>assets/theme/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>assets/theme/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/theme/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/theme/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url();?>assets/theme/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>assets/theme/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/theme/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/theme/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/theme/dist/js/demo.js"></script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
  <script>
    $(document).ready(function() {
		var cData = JSON.parse(`<?php echo $charts_jenjang; ?>`);
      	var ctx = $("#pie-chart");

      	//pie chart data
      	var data = {
        	labels: cData.label,
        	datasets: [{
            	label: "Users Count",
            	data: cData.data,
            	backgroundColor: [
            		"#0275d8",
              		"#5cb85c",
              		"#5bc0de",
              		"#f0ad4e",
              		"#d9534f",
              		"#292b2c",
              		"#f7f7f7",
            	],
            	borderColor: [
              		"#0275d8",
              		"#5cb85c",
              		"#5bc0de",
              		"#f0ad4e",
              		"#d9534f",
              		"#292b2c",
              		"#f7f7f7",
            	],
            	borderWidth: [1, 1, 1]
          	}]
      	};
      	var options = {
        	responsive: true,
        	title: {
          		display: true,
          		position: "top",
          		text: "Jumlah Pendaftar Berdasarkan Jenjang",
          		fontSize: 18,
          		fontColor: "#111"
        	},
        	legend: {
          		display: true,
          		position: "bottom",
          		labels: {
            		fontColor: "#333",
            		fontSize: 16
            	}
        	}
      	};
      	var chart1 = new Chart(ctx, {
        	type: "pie",
        	data: data,
        	options: options
      	});

      	var ctxPembayaran = $("#pie-chart-pembayaran");
      	var dataPembayaran = {
        	labels: ["Selesai", "Pending",],
        	datasets: [{
            	label: "Users Count",
            	data: [<?php echo $jumlah_berhasil;?>,<?php echo $jumlah_pending;?>],
            	backgroundColor: [
            		"#5cb85c",
              		"#d9534f",
            	],
            	borderColor: [
              		"#5cb85c",
              		"#d9534f",
            	],
            	borderWidth: [1, 1]
          	}]
      	};

      	var optionsPembayaran = {
        	responsive: true,
        	title: {
          		display: true,
          		position: "top",
          		text: "Jumlah Pembayaran Berdasarkan Status",
          		fontSize: 18,
          		fontColor: "#111"
        	},
        	legend: {
          		display: true,
          		position: "bottom",
          		labels: {
            		fontColor: "#333",
            		fontSize: 16
            	}
        	}
      	};

      	var chart2 = new Chart(ctxPembayaran, {
        	type: "pie",
        	data: dataPembayaran,
        	options: optionsPembayaran
      	});

    });
  </script>
</body>

</html>