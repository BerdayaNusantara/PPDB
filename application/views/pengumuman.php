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
              <h1 class="m-0 text-dark">Pengumuman Kelulusan</h1>
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
                  <h4 class="card-title ">Data Kelulusan Siswa</h4>
                  <button class="btn btn-sm btn-primary float-right" id="btnkelas" onclick="showkelas()" style="display:none;"><i class="fa fa-school"></i> Masukkan Kelas</button>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="santritable" class="table table-striped table-bordered second" style="width:100%">
                      <thead>
                        <tr>
                          <th></th>
                          <th style="text-align: center;">#</th>
                          <th>Kode</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Email</th>
                          <th>Jenjang</th>
                          <th>Jalur</th>
                          <th>Status</th>
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

      <div class="modal fade" id="modalUser">
        <div class="modal-dialog">
          <div class="modal-content">          
            <!-- Modal Header -->
            <form action=""  enctype="multipart/form-data" id="formUser" method="POST" class="form-horizontal"  role="form">
            <div class="modal-header">
              <h4 class="modal-title">Daftar Kelas</h4>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <input type="hidden" name="siswa" id="siswa" />
              <div>
                <label>Kelas</label>
                <select class="form-control" name="kelas" id="kelas" required>
                    <option value="">Pilih Kelas</option>
                    <?php foreach($kelas as $k){?>
                    <option value="<?php echo $k->id;?>"><?php echo $k->nama;?>-<?php echo $k->jenjang_nama;?></option>
                    <?php } ?>
                </select>
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
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>

<script src="<?php echo base_url();?>/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">

var datasiswa = [];
    $(document).ready( function () {
        var table = $('#santritable').DataTable({
                      responsive: true,
                      retrieve: true,
                      scrollX: true,
                      processing: true, //Feature control the processing indicator.
                      serverSide: true, //Feature control DataTables' server-side processing mode.
                      order: [],
                      ajax: {
                        url: "<?php echo site_url('santri/data_list_pengumuman')?>",
                        type: "POST"
                      },
                      select: {
                        style:    'multi',
                        selector: 'td:first-child'
                      },
                      "columnDefs": [{
                        "className": "select-checkbox",
                        "targets": [ 0 ], //first column / numbering column
                        "orderable": true, //set not orderable
                      },],
                    });
        
        $('#santritable').on( 'select.dt', function ( e, dt, type, indexes ) {
          var data = dt.rows(indexes).data();
          var datarow = data[0][2];
          datasiswa.push(datarow);
          if(datasiswa.length>0)
          {
            document.getElementById("btnkelas").style="display:unset;";
          }else{
            document.getElementById("btnkelas").style="display:none;";
          }
          document.getElementById("siswa").value=datasiswa;
        } );
        $('#santritable').on( 'deselect.dt', function ( e, dt, type, indexes ) {
          var data = dt.rows(indexes).data();
          var datarow = data[0][2];
          const indexarr = datasiswa.indexOf(datarow);
          if (indexarr > -1) {
            datasiswa.splice(indexarr, 1);
          }

          if(datasiswa.length>0)
          {
            document.getElementById("btnkelas").style="display:unset;";
          }else{
            document.getElementById("btnkelas").style="display:none;";
          }
          document.getElementById("siswa").value=datasiswa;
        } );
    });
    $('#modalUser').on('hidden.bs.modal', function () {
            document.getElementById("formUser").reset();
        });
    function showkelas(){
      var modal = $("#modalUser");
      modal.find('.modal-title').text('Pilih Kelas');
      $("#modalUser").modal();
    };
    $(function () {
        $('#formUser').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?php  echo base_url(); ?>backoffice/pidahkelas",
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
                    $('#modalUser').modal('hide');
                }
            });
        });
    });
    function refreshData() {
      $('#santritable').DataTable().ajax.reload();
    };
  </script>
</body>

</html>