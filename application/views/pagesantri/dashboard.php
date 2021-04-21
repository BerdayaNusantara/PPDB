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
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?php if(($status_bayar=="")||($status_bayar=="pending")){?>
                  <div class="alert alert-warning alert-with-icon" data-notify="container">
                    <i class="fa fa-info"></i>
                    <span data-notify="message"><b>Akun Anda Belum Aktif</b><br>Silahkan melakukan pembayaran pendaftaran untuk mengaktifkan akun anda.</span>
                  </div>
                <?php } ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <?php if(($status_bayar=="")||($status_bayar=="pending")){?>
                  <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                      <i class="fa fa-info"></i>
                    </div>
                    <p class="card-category">Akun anda belum aktif </p>
                    <h3 class="card-title"></h3>
                  </div>
                <?php }else{?>
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="fa fa-check"></i>
                    </div>
                    <p class="card-category">Selamat Akun anda sudah aktif </p>
                    <h3 class="card-title"></h3>
                  </div>
                  <?php } ?>                
                  <div class="card-footer">
                    <div class="stats">
                      <?php foreach($data_bayar as $db){ 
                      if(($status_bayar=="")||($status_bayar=="pending")){?>
                        <a target="_blank" href="<?php  echo $db->urlpayment; ?>" class="btn btn-sm btn-warning">Klik untuk melakukan pembayaran</a>
                      <?php }else if($status_bayar="berhasil"){?>
                        <a target="_blank" href="" class="btn btn-sm btn-success">Pembayaran Sudah berhasil</a>
                      <?php }}?>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-info"></i>
                  </div>
                    <?php if(($status_profile=="Lengkap")&&($status_ortu=="Lengkap")){?>
                      <p class="card-category">Silahkan Cetak Kartu Ujian</p>
                    <?php }else{?>
                      <p class="card-category">Maaf anda belum bisa cetak kartu ujian</p>
                    <?php } ?>
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  	 <?php if(($status_profile=="Lengkap")&&($status_ortu=="Lengkap")){?>
                      <a href="<?php echo base_url();?>/santri/cetak_kartu" class="btn btn-sm btn-success">Klik untuk cetak kartu ujian</a>
                    <?php }else{?>
                      <a href="" class="btn btn-sm btn-warning">Silahkan lengkapi data untuk mencetak kartu ujian</a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="ion ion-clipboard mr-1"></i>
                    Kelengkapan Data
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <ul class="todo-list" data-widget="todo-list">
                    <li>
                      <div  class="icheck-primary d-inline ml-2">
                        <input type="checkbox" value="" name="todo3" id="todoCheck3" disabled <?php if(($status_bayar=="")||($status_bayar=="pending")){ echo ""; }else{ echo "checked"; }?>>
                        <label for="todoCheck3"></label>
                      </div>
                      <span class="text">Pembayaran Pendaftaran</span>
                    </li>
                    <li>
                      <div  class="icheck-primary d-inline ml-2">
                        <input type="checkbox" value="" name="todo3" id="todoCheck3" disabled <?php if(($status_profile=="Lengkap")){ echo "checked"; }?>>
                        <label for="todoCheck3"></label>
                      </div>
                      <span class="text">Data Profile Siswa</span>
                    </li>
                    <li>
                      <div  class="icheck-primary d-inline ml-2">
                        <input type="checkbox" value="" name="todo3" id="todoCheck3" disabled <?php if(($status_ortu=="Lengkap")){ echo "checked"; }?>>
                        <label for="todoCheck3"></label>
                      </div>
                      <span class="text">Data Orang Tua</span>
                    </li>
                  </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                </div>
              </div>
            </div>
            <?php if($jalur==""){?>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
              <form action="" method="post" id="formjalur">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                  </div>
                    
                      <div class="alert alert-danger alert-dismissible">
                        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                        <h5><i class="icon fas fa-info"></i>  Silahkan pilih jalur pendaftaran</h5>
                          <input type="hidden" id="id_uniq" name="id_uniq" value="<?php echo $id_uniq;?>"/>
                          <select class="form-control" name="jalur" id="jalur" required>
                            <option value="">Pilih Jalur</option>
                            <option value="Reguler">Reguler (Melalui ujian masuk)</option>
                            <option value="Nilai">Nilai (Tanpa ujian masuk,Nilai diatas KKM)</option>
                            <option value="Kurang Mampu">Kurang Mampu (Tanpa ujian masuk, upload surat keterangan tidak mampu)</option>
                            <option value="Prestasi">Prestasi(Tanpa ujian masuk, upload sertifikat/piagam)</option>
                          </select>
                      </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
                </form>
              </div>
            </div>
            <?php } else{ ?>
              <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
              <form action="" method="post" id="formjalurupdate">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                  </div>
                      <div class="alert alert-success alert-dismissible">
                        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                        <h5><i class="icon fas fa-info"></i>  Jalur pendaftaran yang dipilih</h5>
                          <input type="hidden" id="id_uniq" name="id_uniq" value="<?php echo $id_uniq;?>"/>
                          <select class="form-control" name="jalur" id="jalur" required>
                            <option value="">Pilih Jalur</option>
                            <option value="Reguler" <?php if($jalur=="Reguler"){ echo "selected"; }?>>Reguler (Melalui ujian masuk)</option>
                            <option value="Nilai"  <?php if($jalur=="Nilai"){ echo "selected"; }?>>Nilai (Tanpa ujian masuk,Nilai diatas KKM)</option>
                            <option value="Kurang Mampu"  <?php if($jalur=="Kurang Mampu"){ echo "selected"; }?>>Kurang Mampu (Tanpa ujian masuk, upload surat keterangan tidak mampu)</option>
                            <option value="Prestasi"  <?php if($jalur=="Prestasi"){ echo "selected"; }?>>Prestasi(Tanpa ujian masuk, upload sertifikat/piagam)</option>
                          </select>
                      </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </div>
                </form>
              </div>
            </div>
            <?php }?>
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
  <script>
    function konfirmBayar() {
      Swal.fire({
        icon: 'warning',
        title: 'Lakukan pembayaran terlebih dahulu untuk membuka menu',
        showConfirmButton: true,
        timer: 5000
      })
    }
    $(function () {
        $('#formjalur').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?php  echo base_url(); ?>backoffice/updatejalur",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                dataType:'json',
                success: function(data){
                    if(data.hasil==1){
                        Swal.fire({
                            icon: 'success',
                            title: data.pesan,
                            showConfirmButton: false,
                            timer: 1000
                        })
                    }else{
                        Swal.fire({
                            icon: 'warning',
                            title: data.pesan,
                            showConfirmButton: false,
                            timer: 1000
                        })
                    }
                    document.getElementById("formjalur").reset();
                    location.reload();
                }
            });
        });
    });

    $(function () {
        $('#formjalurupdate').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?php  echo base_url(); ?>backoffice/updatejalur",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                dataType:'json',
                success: function(data){
                    if(data.hasil==1){
                        Swal.fire({
                            icon: 'success',
                            title: data.pesan,
                            showConfirmButton: false,
                            timer: 1000
                        })
                    }else{
                        Swal.fire({
                            icon: 'warning',
                            title: data.pesan,
                            showConfirmButton: false,
                            timer: 1000
                        })
                    }
                    document.getElementById("formjalur").reset();
                    location.reload();
                }
            });
        });
    });
    
  </script>
</body>

</html>