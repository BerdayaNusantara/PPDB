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

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/vendor/datatables/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/vendor/datatables/css/buttons.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/vendor/datatables/css/select.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
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
              <h1 class="m-0 text-dark">Pengaturan Sistem</h1>
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Pengaturan Sistem API</h4> 
                  <p class="card-category"></p>
                </div>
                <form id="formAPI" class="form-horizontal">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <div>
                        <label>API IPaymu</label>
                        <input type="hidden" name="id" id="id" value="<?php echo $id;?>" class="form-control"/>
                        <input type="text" name="api_ipaymu" id="api_ipaymu" value="<?php echo $apiipaymu;?>" class="form-control"/>
                      </div>
                      <div>
                        <label>Server Wablas</label>
                        <input type="text" name="api_server" id="api_server" value="<?php echo $apiserver;?>" class="form-control"/>
                      </div>
                      <div>
                        <label>API Wablas</label>
                        <input type="text" name="api_whatsapp" id="api_whatsapp" value="<?php echo $apiwa;?>" class="form-control"/>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Pengaturan Pesan Whatsapp</h4> 
                  <p class="card-category"></p>
                </div>
                <form id="formWhatsapp" class="form-horizontal">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <div>
                        <label>Whatsapp Lulus</label>
                        <input type="hidden" name="id" id="id" value="<?php echo $id;?>" class="form-control"/>
                        <input type="text" name="wa_lulus" id="wa_lulus" value="<?php echo $wa_lulus;?>" class="form-control"/>
                      </div>
                      <div>
                        <label>Whatsapp Tidak Lulus</label>
                        <input type="text" name="wa_tidak_lulus" id="wa_tidak_lulus" value="<?php echo $wa_tidak_lulus;?>" class="form-control"/>
                      </div>
                      <div>
                        <label>Whatsapp Cadangan</label>
                        <input type="text" name="wa_cadangan" id="wa_cadangan" value="<?php echo $wa_cadangan;?>" class="form-control"/>
                      </div>
                      <div>
                        <label>Whatsapp Konfirmasi Bayar</label>
                        <div class="row">
                          <div class="col-sm-6">
                            <input type="text" name="wa_konfbayar_awal" id="wa_konfbayar_awal" value="<?php echo $wa_konfbayar_awal;?>" class="form-control"/>
                          </div>
                          <div class="col-sm-3">
                            <input type="text" value="Nominal Bayar" class="form-control" readonly/>
                          </div>
                          <div class="col-sm-3">
                            <input type="text" name="wa_konfbayar_akhir" id="wa_konfbayar_akhir" value="<?php echo $wa_konfbayar_akhir;?>" class="form-control"/>
                          </div>
                        </div>
                      </div>
                      <div>
                        <label>Whatsapp Sukses Bayar</label>
                        <input type="text" name="wa_suksesbayar" id="wa_suksesbayar" value="<?php echo $wa_suksesbayar;?>" class="form-control"/>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Pengaturan Email</h4> 
                  <p class="card-category"></p>
                </div>
                <form id="formEmail" class="form-horizontal">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div>
                        <label>Email Subject</label>
                        <input type="text" name="email_subject" id="email_subject" value="<?php echo $email_subject;?>" class="form-control"/>
                      </div>
                      <div>
                        <label>Email Sender</label>
                        <input type="hidden" name="id" id="id" value="<?php echo $id;?>" class="form-control"/>
                        <input type="text" name="email" id="email" value="<?php echo $email;?>" class="form-control"/>
                      </div>
                      <div>
                        <label>Email Host</label>
                        <input type="text" name="email_host" id="email_host" value="<?php echo $email_host;?>" class="form-control"/>
                      </div>
                      <div>
                        <label>Email Port</label>
                        <input type="text" name="email_port" id="email_port" value="<?php echo $email_port;?>" class="form-control"/>
                      </div>
                      <div>
                        <label>Password Email</label>
                        <input type="text" name="email_pass" id="email_pass" value="<?php echo $email_pass;?>" class="form-control"/>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                </div>
                </form>
              </div>
            </div>
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

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url();?>/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
    });

      $(function () {
        $('#formAPI').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            url: "<?php  echo base_url(); ?>backoffice/setsistemapi_update",
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
            }   
          });
        });
      });

      $(function () {
        $('#formWhatsapp').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            url: "<?php  echo base_url(); ?>backoffice/setsistemwhatsapp_update",
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
            }   
          });
        });
      });
      $(function () {
        $('#formEmail').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            url: "<?php  echo base_url(); ?>backoffice/setsistememail_update",
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
            }   
          });
        });
      });
  </script>
</body>

</html>