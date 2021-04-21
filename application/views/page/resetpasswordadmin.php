<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reset password akun - <?php echo $instansi;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>upload/logo/<?php echo $logo_sekolah;?>" width="50%" style="display:block;margin:auto;"/></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Reset password akun admin</p>

      <form method="post"  id="formForget">
        <div class="input-group mb-3">
          <input type="hidden" name="idunik" id="idunik" value="<?php echo $id_uniq;?>">
          <input type="password" name="password"  class="form-control" placeholder="Masukkan password baru">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/theme/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/theme/dist/js/adminlte.min.js"></script>
  <script type="text/javascript">
      $(function () {
        $('#formForget').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            url: "<?php  echo base_url(); ?>home/prosesresetpassadmin",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            dataType:'json', 
            success: function(data){
              if(data.hasil){
                Swal.fire({
                  title:data.pesan,
                  showConfirmButton: true,
                  confirmButtonText:'Login Member Area',
                  icon:'success'
                }).
                then(function(){
                    window.location.href = "<?php echo base_url();?>home/login";
                });
              }else{
               Swal.fire(
                  'Gagal Login!',
                  data.pesan,
                  'warning'
                );
              }
              document.getElementById("formForget").reset();
              
            }   
          });
        });
      });
  </script>
</body>
</html>
