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
              <h1 class="m-0 text-dark">Pengumuman</h1>
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
                <div class="card-body">
                  
                  <div class="row">
                    <div class="col-sm-12">
                        <?php if($status=="Lulus"){?>
                        <div class="alert alert-success alert-with-icon" data-notify="container">
                            <i class="fa fa-info"></i>
                            <span data-notify="message">  Selamat Anda dinyatakan Lulus</span>
                        </div>
                        <?php }else if($status=="Tidak Lulus"){?>
                        <div class="alert alert-danger alert-with-icon" data-notify="container">
                            <i class="fa fa-info"></i>
                            <span data-notify="message">  Mohon Maaf Anda dinyatakan Tidak Lulus</span>
                        </div>
                        <?php }else if($status=="Cadangan"){?>
                        <div class="alert alert-warning alert-with-icon" data-notify="container">
                            <i class="fa fa-info"></i>
                            <span data-notify="message">  Mohon Maaf Anda dinyatakan sebagai Cadangan</span>
                        </div>
                        <?php } ?>
                    </div>
                  </div>
                </div>
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


    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script src="<?php echo base_url();?>/asset/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">
    $(document).ready( function () {
            // $('#usertable').DataTable({
            //   responsive: true,
            //   retrieve: true,
            //   scrollX: true,
            //   processing: true, //Feature control the processing indicator.
            //   serverSide: true, //Feature control DataTables' server-side processing mode.
            //   order: [],
            //   ajax: {
            //     url: "<?php echo site_url('user/data_list')?>",
            //     type: "POST"
            //   },
            //   "columnDefs": [{
            //   "targets": [ 0 ], //first column / numbering column
            //   "orderable": true, //set not orderable
            //   },],
            // });
        });
    $('#modalUser').on('hidden.bs.modal', function () {
            document.getElementById("formUser").reset();
        });
        function tambaData() {
            $('#id').val("");
            document.getElementById("imgUser").style.display = "none";

            var modal = $("#modalUser");
            modal.find('.modal-title').text('Tambah Data User');
            $("#modalUser").modal();
        };
        function refreshData() {
            $('#usertable').DataTable().ajax.reload();
        };
        function hapusUser(id) {
            $("#id_data_hapus").val(id);
            $("#modalHapusData").modal();
        }
        function hapusData() {
            var id = $("#id_data_hapus").val();
            $.ajax({
                url: "<?php  echo base_url(); ?>user/data_hapus",
                type: "POST",
                data:  {id,id},
                dataType:'json', 
                success: function(data)
                {
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
                    refreshData();
                    $('#modalHapusData').modal('hide');
                    $('#id_data_hapus').val("");
                }         
            });
        }
        function updateUser(id) {
            $('#id').val(id);
            var modal = $("#modalUser");
            modal.find('.modal-title').text('Edit Data User');
            modal.modal();
            document.getElementById("note_pass").style.display = "block";
            $.ajax({
              type: "POST",
              url: '<?php  echo base_url(); ?>user/data_detail',
              data:{
                id:id
              },
              dataType:'json',
              success: function(data) {
                $.each(data.hasildata,function(i,v){
                  $('#id').val(v.id);
                  $('#username').val(v.username);
                  $('#email').val(v.email);
                  $('#level').val(v.level);
                  if(v.foto!=""){
                    $("#imgUser").attr('src','<?php echo base_url();?>upload/profil/'+v.foto);
                  }else{
                    $("#imgUser").attr('src','<?php echo base_url();?>/asset/image_def.png');
                  }
                });
              }
            });
        }
  </script>
</body>

</html>