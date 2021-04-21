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

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
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
              <h1 class="m-0 text-dark">Kelas siswa</h1>
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
                  <h4 class="card-title ">Data siswa per kelas</h4>
                  <p class="card-category"></p>
                  <br>
                  <div class="col-sm-4">
                  <select class="form-control" id="kelas" onchange="filterkelas()" name="kelas">
                    <option value="">Pilih Kelas</option>
                    <?php foreach($kelas as $dj){?>
                    <option value="<?php echo $dj->id;?>"><?php echo $dj->nama;?>-<?php echo $dj->jenjang_nama;?></option>
                    <?php } ?>
                  </select>
                  </div>

                                   <!--  <button class="btn btn-info btn-sm float-right" onclick="tambaData()">Tambah Data <i class="fa fa-plus"></i></button>
                                    &nbsp;
                                    --> <!-- <button class="btn btn-info btn-sm float-right" onclick="refreshData()">Refresh <i class="fa fa-redo"></i></button> -->
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="santritable" class="table table-striped table-bordered second" style="width:100%">
                      <thead>
                        <tr>
                          <th style="text-align: center;">#</th>
                          <th>Kode</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Email</th>
                          <th>Jenjang</th>
                          <th>Kelas</th>
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
            <h4 class="modal-title">Tambah Data Calon User</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <div>
              <label>Username</label>
              <input type="hidden" name="id" id="id" class="form-control" required />
              <input type="text" name="username" id="username" class="form-control" required />
            </div>
            <div>
              <label>Email</label>
              <input type="text" name="email" id="email" class="form-control" required />
            </div>
            <div>
              <label>Password</label>
              <input type="password" name="password" id="password" class="form-control"/>
              <p id="note_pass" style="display: none;">Kosongkan tidak ingin merubah password</p>
            </div>
            <div>
              <label>Level</label>
              <select class="form-control" name="level" id="level" required>
                  <option value="">Pilih Level</option>
                  <option value="Staff">Staff</option>
                  <option value="Administrator">Administrator</option>
              </select>
            </div>
            <div>
              <label>Foto</label><br>
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


  <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>




  <script type="text/javascript">
    function filterkelas()
    {
        var kelas = $("#kelas").val();
        if ($.fn.DataTable.isDataTable( '#santritable' ) ) {
            $('#santritable').DataTable().destroy();
            dtsantritable = $('#santritable').DataTable({
                dom: 'Bfrtip',
                buttons: [ 'print', 'excel', 'pdf' ],
                responsive: true,
                retrieve: true,
                paging: false,
                scrollX: true,
                processing: true, //Feature control the processing indicator.
                serverSide: true, //Feature control DataTables' server-side processing mode.
                order: [],
                ajax: {
                    url: "<?php echo site_url('santri/data_list_report_kelas_filter')?>",
                    type: "POST",
                    data:{
                        kelas:kelas
                    }
                },
                "columnDefs": [{
                "targets": [ 0 ], //first column / numbering column
                "orderable": true, //set not orderable
                },],
            });
        }else{
            dtsantritable = $('#santritable').DataTable({
                dom: 'Bfrtip',
                buttons: [ 'print', 'excel', 'pdf' ],
                responsive: true,
                retrieve: true,
                paging: false,
                scrollX: true,
                processing: true, //Feature control the processing indicator.
                serverSide: true, //Feature control DataTables' server-side processing mode.
                order: [],
                ajax: {
                    url: "<?php echo site_url('santri/data_list_report_kelas_filter')?>",
                    type: "POST",
                    data:{
                        kelas:kelas
                    }
                },
                "columnDefs": [{
                "targets": [ 0 ], //first column / numbering column
                "orderable": true, //set not orderable
                },],
            });
        }
        
    }
    function showdata()
    {
        if ($.fn.DataTable.isDataTable( '#santritable' ) ) {
            $('#santritable').DataTable().destroy();
            dtsantritable = $('#santritable').DataTable({
              dom: 'Bfrtip',
              buttons: [ 'print', 'excel', 'pdf' ],
              responsive: true,
              retrieve: true,
              paging: false,
              scrollX: true,
              processing: true, //Feature control the processing indicator.
              serverSide: true, //Feature control DataTables' server-side processing mode.
              order: [],
              ajax: {
                url: "<?php echo site_url('santri/data_list_report_kelas')?>",
                type: "POST"
              },
              "columnDefs": [{
              "targets": [ 0 ], //first column / numbering column
              "orderable": true, //set not orderable
              },],
            });
        }else{
            dtsantritable = $('#santritable').DataTable({
              dom: 'Bfrtip',
              buttons: [ 'print', 'excel', 'pdf' ],
              responsive: true,
              retrieve: true,
              paging: false,
              scrollX: true,
              processing: true, //Feature control the processing indicator.
              serverSide: true, //Feature control DataTables' server-side processing mode.
              order: [],
              ajax: {
                url: "<?php echo site_url('santri/data_list_report_kelas')?>",
                type: "POST"
              },
              "columnDefs": [{
              "targets": [ 0 ], //first column / numbering column
              "orderable": true, //set not orderable
              },],
            });

        }
    }
    $(document).ready( function () {
        showdata();        
    });
    $('#modalUser').on('hidden.bs.modal', function () {
            document.getElementById("formUser").reset();
        });
        function tambaData() {
            $('#id').val("");
            document.getElementById("note_pass").style.display = "none";
            document.getElementById("imgUser").style.display = "none";

            var modal = $("#modalUser");
            modal.find('.modal-title').text('Tambah Data User');
            $("#modalUser").modal();
        };
        function refreshData() {
            $('#usertable').DataTable().ajax.reload();
        };
        $(function () {
            $('#formUser').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php  echo base_url(); ?>user/data_simpan",
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