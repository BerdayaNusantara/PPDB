<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Prestasi Siswa - <?php echo $instansi;?></title>
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
              <h1 class="m-0 text-dark">Data Prestasi</h1>
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
                  <h4 class="card-title ">Data Prestasi</h4>
                  <button class="btn btn-success btn-sm float-right" onclick="tambahData()">Tambah Data <i class="fa fa-plus"></i></button>
                  &nbsp;
                  <button class="btn btn-info btn-sm float-right" onclick="refreshData()">Refresh <i class="fa fa-redo"></i></button>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="usertable" class="table table-striped table-bordered second" style="width:100%">
                      <thead>
                        <tr>
                          <th style="text-align: center;">#</th>
                          <th>Nama Prestasi</th>
                          <th>File</th>
                          <th style="text-align: center;"><i class="fa fa-cog "></i></th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
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
  <div class="modal fade" id="modalPrestasi">
      <div class="modal-dialog">
        <div class="modal-content">          
          <!-- Modal Header -->
          <form action=""  enctype="multipart/form-data" id="formUser" method="POST" class="form-horizontal"  role="form">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Prestasi</h4>
            <button type="button" class="close" data-dismiss="modal">??</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <div>
              <label>Nama Prestasi</label>
              <input type="hidden" name="id" id="id" class="form-control" required />
              <input type="hidden" name="nisn" id="nisn" class="form-control" required />
              <input type="text" name="prestasi" id="prestasi" class="form-control" required />
            </div>
            <div>
              <label>File Piagam</label><br>
              <input type="file" name="foto" id="foto" />
            </div>
            <div>
                <br>
                <img id="imgUser" width="100">
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

    <script src="<?php echo base_url();?>/asset/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">
    $(document).ready( function () {
      $('#usertable').DataTable({
        retrieve: true,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        order: [],
        ajax: {
          url: "<?php echo site_url('prestasi/data_list')?>",
          type: "POST"
        },
        "columnDefs": [{
        "targets": [ 0 ], //first column / numbering column
        "orderable": true, //set not orderable
        },],
      });
    });
    $(function () {
      $('#formUser').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
          url: "<?php  echo base_url(); ?>prestasi/simpan_prestasi",
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
            refreshData();
            $('#modalPrestasi').modal('hide');
          }   
        });
      });
    });
    $('#modalPrestasi').on('hidden.bs.modal', function () {
      document.getElementById("formUser").reset();
    });
    function tambahData() {
      $('#id').val("");
      document.getElementById("imgUser").style.display = "none";
      var modal = $("#modalPrestasi");
      modal.find('.modal-title').text('Tambah Data Prestasi');
      $("#modalPrestasi").modal();
      $.ajax({
        type: "POST",
        url: "<?php  echo base_url(); ?>santri/data_profile",
        dataType:'json',
        success: function(data) {
          $.each(data.hasildata,function(i,v){
            $('#nisn').val(v.nisn);
          });
        }
      });
    };
    function refreshData() {
      $('#usertable').DataTable().ajax.reload();
    };
    function hapusPrestasi(id) {
      $("#id_data_hapus").val(id);
      $("#modalHapusData").modal();
    }
    function hapusData() {
      var id = $("#id_data_hapus").val();
      $.ajax({
        url: "<?php  echo base_url(); ?>prestasi/data_hapus",
        type: "POST",
        data:  {id,id},
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
          refreshData();
          $('#modalHapusData').modal('hide');
          $('#id_data_hapus').val("");
        }
      });
    }
    function updateData(id) {
      $('#id').val(id);
       $.ajax({
        type: "POST",
        url: "<?php  echo base_url(); ?>santri/data_profile",
        dataType:'json',
        success: function(data) {
          $.each(data.hasildata,function(i,v){
            $('#nisn').val(v.nisn);
            var nisn = v.nisn;
            var modal = $("#modalPrestasi");
            modal.find('.modal-title').text('Edit Data Prestasi');
            modal.modal();
            $.ajax({
                type: "POST",
                url: '<?php  echo base_url(); ?>prestasi/data_detail',
                data:{
                    id:id
                },
                dataType:'json',
                success: function(data) {
                    $.each(data.hasildata,function(i,v){
                        $('#id').val(v.id);
                        $('#prestasi').val(v.prestasi);
                        if(v.file!=""){
                            $("#imgUser").attr('src','<?php echo base_url();?>upload/santri/'+nisn+'/'+v.file);
                        }else{
                            $("#imgUser").attr('src','<?php echo base_url();?>/asset/image_def.png');
                        }
                    });
                }
            });
          });
        }
      });
      
    }
  </script>
</body>

</html>