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
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php echo $navbar;?>
    <?php echo $sidebar;?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil Akun</h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <h3 class="profile-username text-center"><?php echo $nama_akun;?></h3>
                <br>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?php echo $email_akun;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Level</b> <a class="float-right"><?php echo $level_akun;?></a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block" onclick="ubahProfil()"><i class="fa fa-edit"></i>  <b>Ubah</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    <div class="modal fade" id="modalUser">
        <div class="modal-dialog">
          <div class="modal-content">          
            <!-- Modal Header -->
            <form action=""  enctype="multipart/form-data" id="formUser" method="POST" class="form-horizontal"  role="form">
            <div class="modal-header">
              <h4 class="modal-title">Ubah Profil Akun</h4>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <div>
                  <label>Username</label>
                  <input type="hidden" name="id" id="id" value="<?php echo $this->session->userdata("id");?>" class="form-control" required />
                  <input type="text" name="username" id="username" class="form-control" required />
              </div>
              <div>
                  <label>Email</label>
                  <input type="email" name="email" id="email" class="form-control" required />
              </div>
              <div>
                  <label>Password</label>
                  <input type="password" name="password" id="password" class="form-control" />
                  <p>Kosongkan password jika tidak ingin merubah password<p>
              </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-success btn-sm">Simpan</button>
            </div>
              </form>
          </div>
        </div>
      </div>
<?php echo $footer;?>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/theme/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/theme/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/theme/dist/js/demo.js"></script>
<script type="text/javascript">
    function ubahProfil()
    {
        var id = $('#id').val();
        var modal = $("#modalUser");
        modal.find('.modal-title').text('Ubah Profil Akun');
        modal.modal();
        $.ajax({
            type: "POST",
            url: '<?php  echo base_url(); ?>backoffice/akun_detail',
            data:{
                id:id
            },
            dataType:'json',
            success: function(data) {
                $.each(data.hasildata,function(i,v){
                  $('#username').val(v.username);
                  $('#email').val(v.email);
                });
            }
        });
    }

    $(function () {
        $('#formUser').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?php  echo base_url(); ?>backoffice/akun_simpan",
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
                    document.getElementById("formUser").reset();
                    $('#modalUser').modal('hide');
                    location.reload();
                }   
            });
        });
    });
</script>
</body>
</html>
