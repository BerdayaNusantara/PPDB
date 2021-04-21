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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datepicker/css/gijgo.min.css">
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
              <h1 class="m-0 text-dark">Data Orangtua</h1>
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
                  <h4 class="card-title ">Data Orang Tua</h4> 
                  <p class="card-category"></p>
                </div>
                <form action=""  enctype="multipart/form-data" id="formUser" method="POST" class="form-horizontal"  role="form">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                        <div>
                          <label>NIK Ayah</label>
                          <input type="hidden" name="id" id="id" class="form-control" required />
                          <input type="text" name="nik_ayah" id="nik_ayah" class="form-control" required />
                        </div>
                        <div>
                          <label>Nama Ayah</label>
                          <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" required />
                        </div>
                        <div>
                          <label>Tempat Lahir Ayah</label>
                          <input type="text" name="tmp_lhr_ayah" id="tmp_lhr_ayah" class="form-control"/>
                        </div>
                        <div>
                          <label>Tanggal Lahir Ayah</label>
                          <input type="text" name="tgl_lhr_ayah" id="tgl_lhr_ayah" placeholder="dd/mm/yyyy" class="form-control"/>
                        </div>
                        <div>
                        <label>Pendidikan Ayah</label>
                          <select class="form-control" name="pend_ayah" id="pend_ayah" required>
                              <option value="">Pilih Pendidikan</option>
                              <option value="SD">SD</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA">SMA</option>
                              <option value="D3">D3</option>
                              <option value="S1">S1</option>
                              <option value="S2">S2</option>
                              <option value="S3">S3</option>
                          </select>
                        </div>
                        <div>
                        <label>Pekerjaan Ayah</label>
                          <select class="form-control" name="pkjn_ayah" id="pkjn_ayah" required>
                              <option value="">Pilih Pekerjaan</option>
                              <option value="PNS">PNS</option>
                              <option value="BUMN">BUMN</option>
                              <option value="Guru">Guru</option>
                              <option value="Dosen">Dosen</option>
                              <option value="Tentara">Tentara</option>
                              <option value="Dokter">Dokter</option>
                              <option value="Wiraswasta">Wiraswasta</option>
                          <option value="Lainnya">Lainnya</option>
                          </select>
                        </div>
                        <div id="div_pekerjaan_ayah_lainnya" style="display: none;">
                          <label>Pekerjaan Lainnya</label>
                          <input type="text" name="pekerjaan_ayah_lainnya" id="pekerjaan_ayah_lainnya" class="form-control" />
                        </div>
                        <div>
                          <label>Nomor Whatsapp Ayah</label>
                          <input type="text" name="nomor_ayah" id="nomor_ayah" class="form-control" required />
                        </div>
                        <div>
                          <label>Penghasilan Ayah</label>

                          <select class="form-control" name="penghasilan_ayah" id="penghasilan_ayah">
                            <option value="">Pilih Penghasilan</option>
                            <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                            <option value="5000000">Rp, 5.000.000 sampai Rp, 10.000.000</option>
                            <option value="10000000">Rp, 10.000.000 sampai Rp, 20.000.000</option>
                            <option value="20000000">Lebih dari Rp, 20.000.000</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <div>
                          <label>NIK Ibu</label>
                          <input type="text" name="nik_ibu" id="nik_ibu" class="form-control" required />
                        </div>
                        <div>
                          <label>Nama Ibu</label>
                          <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" required />
                        </div>
                        <div>
                          <label>Tempat Lahir Ibu</label>
                          <input type="text" name="tmp_lhr_ibu" id="tmp_lhr_ibu" class="form-control"/>
                        </div>
                        <div>
                          <label>Tanggal Lahir Ibu</label>
                          <input type="text" name="tgl_lhr_ibu" placeholder="dd/mm/yyyy" id="tgl_lhr_ibu" class="form-control"/>
                        </div>
                        <div>
                        <label>Pendidikan Ibu</label>
                          <select class="form-control" name="pend_ibu" id="pend_ibu" required>
                              <option value="">Pilih Pendidikan</option>
                              <option value="SD">SD</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA">SMA</option>
                              <option value="D3">D3</option>
                              <option value="S1">S1</option>
                              <option value="S2">S2</option>
                              <option value="S3">S3</option>
                          </select>
                        </div>
                        <div>
                        <label>Pekerjaan Ibu</label>
                          <select class="form-control" name="pkjn_ibu" id="pkjn_ibu" required>
                              <option value="">Pilih Pekerjaan</option>
                              <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                              <option value="PNS">PNS</option>
                              <option value="BUMN">BUMN</option>
                              <option value="Guru">Guru</option>
                              <option value="Dosen">Dosen</option>
                              <option value="Tentara">Tentara</option>
                              <option value="Dokter">Dokter</option>
                              <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Lainnya">Lainnya</option>
                          </select>
                        </div>
                        <div id="div_pekerjaan_ibu_lainnya" style="display: none;">
                          <label>Pekerjaan Lainnya</label>
                          <input type="text" name="pekerjaan_ibu_lainnya" id="pekerjaan_ibu_lainnya" class="form-control" />
                        </div>
                        <div>
                          <label>Nomor Whatsapp Ibu</label>
                          <input type="text" name="nomor_ibu" id="nomor_ibu" class="form-control" required />
                        </div>
                        <div>
                          <label>Penghasilan Ibu</label>
                          <select class="form-control" name="penghasilan_ibu" id="penghasilan_ibu">
                            <option value="">Pilih Penghasilan</option>
                            <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                            <option value="5000000">Rp, 5.000.000 sampai Rp, 10.000.000</option>
                            <option value="10000000">Rp, 10.000.000 sampai Rp, 20.000.000</option>
                            <option value="20000000">Lebih dari Rp, 20.000.000</option>
                          </select>
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
  <script src="<?php echo base_url();?>asset/datepicker/js/gijgo.min.js"></script>
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
  <script type="text/javascript">
    $(document).ready( function () {
      $('#tgl_lhr_ayah').datepicker({
        uiLibrary: 'bootstrap4',
        format:'dd/mm/yyyy'
      });
      $('#tgl_lhr_ibu').datepicker({
        uiLibrary: 'bootstrap4',
        format:'dd/mm/yyyy'
      });
      $("#pkjn_ayah").change(function (){
        var value = $(this).val();
        if(value=="Lainnya")
        {
          document.getElementById("div_pekerjaan_ayah_lainnya").style.display="block";
        }else{
          document.getElementById("div_pekerjaan_ayah_lainnya").style.display="none";
        }
      });
      $("#pkjn_ibu").change(function (){
        var value = $(this).val();
        if(value=="Lainnya")
        {
          document.getElementById("div_pekerjaan_ibu_lainnya").style.display="block";
        }else{
          document.getElementById("div_pekerjaan_ibu_lainnya").style.display="none";
        }
      });
      refreshData();
    });
    $(function () {
      $('#formUser').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
          url: "<?php  echo base_url(); ?>orangtua/simpan_data",
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
            }   
        });
      });
    });
    function refreshData() {
      $.ajax({
        type: "POST",
        url: '<?php  echo base_url(); ?>orangtua/data_detail',
        dataType:'json',
        success: function(data) {
          $.each(data.hasildata,function(i,v){
            $('#id').val(v.id);
            $('#nik_ayah').val(v.nik_ayah);
            $('#nama_ayah').val(v.nama_ayah);
            $('#tmp_lhr_ayah').val(v.tmp_lhr_ayah);
            $('#tgl_lhr_ayah').val(v.tgl_lhr_ayah);
            $('#pend_ayah').val(v.pend_ayah);
            $('#pkjn_ayah').val(v.pekerjaan_ayah);
            $('#pekerjaan_ayah_lainnya').val(v.pekerjaan_ayah_lain);
            $('#nomor_ayah').val(v.nomor_ayah);
            $('#penghasilan_ayah').val(v.penghasilan_ayah);
            $('#nik_ibu').val(v.nik_ibu);
            $('#nama_ibu').val(v.nama_ibu);
            $('#tmp_lhr_ibu').val(v.tmp_lhr_ibu);
            $('#tgl_lhr_ibu').val(v.tgl_lhr_ibu);
            $('#pend_ibu').val(v.pend_ibu);
            $('#pkjn_ibu').val(v.pekerjaan_ibu);
            $('#pekerjaan_ibu_lainnya').val(v.pekerjaan_ibu_lain);
            $('#nomor_ibu').val(v.nomor_ibu);
            $('#penghasilan_ibu').val(v.penghasilan_ibu);
            if(v.pekerjaan_ayah=="Lainnya")
            {
              document.getElementById("div_pekerjaan_ayah_lainnya").style.display="block";
            }else{
              document.getElementById("div_pekerjaan_ayah_lainnya").style.display="none";
            }
            if(v.pekerjaan_ibu=="Lainnya")
            {
              document.getElementById("div_pekerjaan_ibu_lainnya").style.display="block";
            }else{
              document.getElementById("div_pekerjaan_ibu_lainnya").style.display="none";
            }
          });
        }
      });
    }
  </script>
</body>

</html>