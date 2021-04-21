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
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Data Siswa</h4> 
                  <p class="card-category"></p>
                </div>
                <?php foreach ($data_santri as $ds) {?>
                <form id="formUser" class="form-horizontal">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                        <div>
                          <label>Kode Pendaftaran</label>
                          <input type="hidden" name="id_uniq" id="id_uniq" value="<?php echo $id_uniq;?>" class="form-control" required readonly/>
                          <input type="hidden" name="whatsapp" id="whatsapp" class="form-control" required readonly/>
                          <input type="hidden" name="id" id="id" class="form-control" required readonly/>
                          <input type="text" name="kode" id="kode" class="form-control" required readonly/>
                        </div>
                        <div>
                          <label>Nama</label>
                          <input type="text" name="nama" id="nama" class="form-control" required readonly/>
                        </div>
                        <div>
                          <label>NISN</label>
                          <input type="text" name="nisn" id="nisn"  class="form-control" readonly readonly/>
                        </div>
                        <div>
                        <label>Jenis Kelamin</label>
                          <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required disabled>
                              <option value="">Pilih Jenis Kelamin</option>
                              <option value="Laki-Laki">Laki-laki</option>
                              <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>
                        <div>
                          <label>Tempat Lahir</label>
                          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required readonly/>
                        </div>
                        <div>
                          <label>Tanggal Lahir</label>
                          <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required readonly/> 
                        </div>
                        <div>
                        <label>Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" disabled></textarea>
                      </div>
                      <div>
                        <label>Asal Sekolah</label>
                        <input type="text" name="sekolah_asal" id="sekolah_asal" class="form-control"  readonly/>
                      </div>
                      <div>
                        <label>Hobi</label>
                        <input type="text" name="hobi" id="hobi" class="form-control"  readonly/>
                      </div>
                      <div>
                        <label>Foto</label><br>
                        <img id="imgUser" width="100">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div>
                        <label>Status Lulus</label>
                        <input type="hidden" name="id_pengumuman" id="id_pengumuman" value="<?php foreach($data_pengumunan as $d){ echo $d->id; }?>" class="form-control"/>
                        <select class="form-control" name="status_lulus" id="status_lulus">
                          <option value="">Pilih status</option>
                          <option value="Lulus" <?php foreach($data_pengumunan as $d){ if($d->status=="Lulus"){ echo "selected"; }}?>>Lulus</option>
                          <option value="Tidak Lulus" <?php foreach($data_pengumunan as $d){ if($d->status=="Tidak Lulus"){ echo "selected"; }}?>>Tidak Lulus</option>
                          <option value="Cadangan" <?php foreach($data_pengumunan as $d){ if($d->status=="Cadangan"){ echo "selected"; }}?>>Cadangan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                  <a href="<?php echo base_url();?>backoffice/pengumuman" class="btn btn-sm btn-default">Kembali</a>
                </div>
                </form>
                <?php } ?>
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
      $('#tanggal_lahir').datetimepicker({
         // dateFormat: 'dd-mm-yy',
         format:'dd/mm/yyyy',
      });
      refreshData();
    });

      $(function () {
        $('#formUser').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            url: "<?php  echo base_url(); ?>backoffice/pengumuman_simpan",
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
                }).
                then(function(){
                    window.location.href = "<?php echo base_url();?>backoffice/pengumuman";
                });
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
            }   
          });
        });
      });
    function refreshData() {
      var id_uniq=document.getElementById("id_uniq").value;
      $.ajax({
        type: "POST",
        url: '<?php  echo base_url(); ?>backoffice/data_profile',
        data:{id_uniq,id_uniq},
        dataType:'json',
        success: function(data) {
          $.each(data.hasildata,function(i,v){
            $('#id').val(v.id);
            $('#kode').val(v.kode);
            $('#nama').val(v.nama);
            $('#whatsapp').val(v.whatsapp);
            $('#nisn').val(v.nisn);
            $('#jenis_kelamin').val(v.jenis_kelamin);
            $('#tempat_lahir').val(v.tempat_lahir);
            $('#tanggal_lahir').val(v.tanggal_lahir);
            $('#alamat').val(v.alamat);
            $('#sekolah_asal').val(v.sekolah_asal);
            $('#ukuran_seragam').val(v.ukuran_seragam);
            $('#hobi').val(v.hobi);
            $('#riwayat_penyakit').val(v.riwayat_penyakit);
            if(v.foto!=""){
              $("#imgUser").attr('src','<?php echo base_url();?>upload/santri/'+v.foto);
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