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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
              <h1 class="m-0 text-dark">Jadwal Ujian</h1>
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
            <?if(($status_ortu!="Lengkap")&&($status_profile!="Lengkap")){?>
            <div class="col-md-12">
                <div class="alert alert-warning alert-with-icon" data-notify="container">
                    <i class="fa fa-info"></i>
                    <span data-notify="message">Silahkan lengkapi data terlebih dahulu</span>
                </div>
                </div>
            <?php }else{
              foreach($data_jadwal as $dj){
                if($dj->tanggal_day=="Sunday"){
                  $hari ="Minggu";
                }else if($dj->tanggal_day=="Monday"){
                  $hari ="Senin";
                }else if($dj->tanggal_day=="Tuesday"){
                  $hari ="Selasa";
                }else if($dj->tanggal_day=="Wednesday"){
                  $hari ="Rabu";
                }else if($dj->tanggal_day=="Thursday"){
                  $hari ="Kamis";
                }else if($dj->tanggal_day=="Friday"){
                  $hari ="Jumat";
                }else if($dj->tanggal_day=="Saturday"){
                  $hari ="Sabtu";
                }?>
              <div class="col-md-4">
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <h3 class="profile-username text-center"><?php echo $dj->nama_tes;?></h3>
                    <p class="text-muted text-center"><?php echo $hari;?>, <?php echo $dj->tanggal;?></p>
                    <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Kouta</b> <a class="float-right"><?php echo $dj->kuota;?> </a>
                    </li>
                    <li class="list-group-item">
                      <b>Sisa</b> <a class="float-right"><?php echo ($dj->kuota)-($dj->jumlah_peserta);?></a>
                    </li>
                  </ul>
                  <?php if((($dj->kuota)-($dj->jumlah_peserta))>0){
                          if(empty($iddetailjad)){
                            if($idjadwal!=$dj->id){?>
                                <button onclick=pilihJadwal(<?php echo $dj->id;?>) class="btn btn-primary btn-block">Pilih Jadwal</button>
                      <?php } ?>
                    <?php }else {
                            if($idjadwal!=$dj->id){?>
                                <button onclick=ubahJadwal(<?php echo $dj->id;?>) class="btn btn-warning btn-block">Ubah Jadwal</button>
                      <?php } ?>
                    <?php } ?>
                  <?php }else{?>
                            <button class="btn btn-danger btn-block">Kuota Habis</button>
                  <?php } ?>
                  </div>
                </div>
              </div>

            <?php } }?>
          </div>
        </div>
      </section>
    </div>
    <?php echo $footer;?>
  </div>
   <!--   Core JS Files   -->
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
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/theme/dist/js/demo.js"></script>
  <script>
    function konfirmBayar() {
      Swal.fire({
        icon: 'warning',
        title: 'Lakukan pembayaran terlebih dahulu untuk membuka menu',
        showConfirmButton: true,
        timer: 5000
      })
    }
    function pilihJadwal(idjadwal)
    {
      $.ajax({
        url: "<?php  echo base_url(); ?>santri/pilihJadwal",
        type: "POST",
        data: {
          idjadwal:idjadwal
        },
        dataType:'json', 
        success: function(data){
          if(data.hasil==1){
            Swal.fire({
              icon: 'success',
              title: data.pesan,
              showConfirmButton: false,
              timer: 1000
            }).then(function(){
              window.location.href = "<?php echo base_url();?>santri/jadwal_ujian";
            });
          }else{
            Swal.fire({
              icon: 'warning',
              title: data.pesan,
              showConfirmButton: false,
              timer: 1000
            })
          }
          document.getElementById("formJadwal").reset();
        }   
      });
    }
    function ubahJadwal(idjadwal)
    {
      $.ajax({
        url: "<?php  echo base_url(); ?>santri/ubahJadwal",
        type: "POST",
        data:  {
          idjadwal:idjadwal
        },
        dataType:'json', 
        success: function(data){
          if(data.hasil==1){
            Swal.fire({
              icon: 'success',
              title: data.pesan,
              showConfirmButton: false,
              timer: 1000
            }).then(function(){
              window.location.href = "<?php echo base_url();?>santri/jadwal_ujian";
            });
          }else{
            Swal.fire({
              icon: 'warning',
              title: data.pesan,
              showConfirmButton: false,
              timer: 1000
            })
          }
          document.getElementById("formJadwal").reset();
        }
      });
    }
  </script>
</body>
</html>