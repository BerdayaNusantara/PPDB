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
              <h1 class="m-0 text-dark">Profile</h1>
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
                  <h4 class="card-title ">Data Pribadi Santri</h4> 
                  <p class="card-category"></p>
                </div>
                <?php foreach ($data_santri as $ds) {?>
                <form id="formUser" class="form-horizontal">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                        <div>
                          <label>Kode Pendaftaran</label>
                          <input type="hidden" name="id" id="id" class="form-control" required readonly/>
                          <input type="text" name="kode" id="kode" class="form-control" required readonly/>
                        </div>
                        <div>
                          <label>Nama Lengkap</label>
                          <input type="text" name="nama" id="nama" class="form-control" required />
                        </div>
                        <div>
                          <label>NIK</label>
                          <input type="text" name="nik" id="nik" class="form-control" required />
                        </div>
                        <div>
                          <label>NISN</label>
                          <input type="text" name="nisn" id="nisn"  class="form-control" required />
                        </div>
                        <div>
                          <label>Nomor Kartu Keluarga (KK)</label>
                          <input type="text" name="no_kk" id="no_kk"  class="form-control" required />
                        </div>
                        <div>
                        <label>Jenis Kelamin</label>
                          <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                              <option value="">Pilih Jenis Kelamin</option>
                              <option value="Laki-Laki">Laki-laki</option>
                              <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>
                        <div>
                          <label>Tempat Lahir</label>
                          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required />
                        </div>
                        <div>
                          <label>Tanggal Lahir</label>
                          <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required /> 
                        </div>
                        <div>
                          <label>Alamat Tempat Tinggal</label>
                          <textarea class="form-control" id="alamat" name="alamat"></textarea>
                        </div>
                        <div>
                          <label>Kode POS</label>
                          <input type="text" name="kode_pos" id="kode_pos" class="form-control" required /> 
                        </div>
                        <div>
                          <label>Asal Sekolah</label>
                          <input type="text" name="sekolah_asal" id="sekolah_asal" class="form-control"  />
                        </div>
                        <div>
                          <label>Anak ke-</label>
                          <input type="text" name="anak_ke" id="anak_ke" class="form-control"  />
                        </div>
                        <div>
                          <label>Jumlah Saudara Kandung</label>
                          <input type="text" name="jml_saudara" id="jml_saudara" class="form-control"  />
                        </div>
                      <div>
                        <label>Status Anak </label>
                        <select class="form-control" name="status_anak" id="status_anak">
                          <option value="">Pilih Status</option>
                          <option value="Kandung">Kandung</option>
                          <option value="Tiri">Tiri</option>
                          <option value="Angkat">Angkat</option>
                        </select>
                      </div>
                      <div>
                        <label>Memiliki Saudara Kandung yang bersekolah di Al-Fityan Boarding School Bogor?</label>
                        <select class="form-control" name="punya_saudara" id="punya_saudara">
                          <option value="">Pilih Keterangan</option>
                          <option value="Ya">Ya</option>
                          <option value="Tidak">Tidak</option>
                        </select>
                      </div>
                      <div id="div_jenjang_saudara" style="display: none;">
                        <label>Jenjang Saudara</label>
                        <select class="form-control" name="jenjang_saudara" id="jenjang_saudara">
                          <option value="">Pilih Jenjang</option>
                          <option value="TKIT">TKIT</option>
                          <option value="SDIT">SDIT</option>
                          <option value="SMPIT">SMPIT</option>
                          <option value="SMAIT">SMAIT</option>
                        </select>
                      </div>
                      <div id="div_nama_saudara" style="display: none;">
                          <label>Nama Saudara</label>
                          <input type="text" name="nama_saudara" id="nama_saudara"  class="form-control" />
                    </div>
                      
                    </div>
                    <div class="col-sm-6">
                      <div>
                        <label>Ukuran Seragam</label>
                        <div class="row" id="ukuran_sd" style="display:none;">
                          <div class="col-sm-12">
                            <img src="<?php echo base_url();?>asset/seragamsd.png" width="300"/>
                          </div>
                        </div>
                        <div class="row" id="ukuran_smp" style="display:none;">
                          <div class="col-sm-12">
                            <img src="<?php echo base_url();?>asset/seragamsma.png" width="300"/>
                          </div>
                        </div>
                        <div class="row" id="ukuran_tk" style="display:none;">
                          <div class="col-sm-12">
                            <img src="<?php echo base_url();?>asset/seragamtk.png" width="300"/>
                          </div>
                        </div>
                        <select class="form-control" name="ukuran_seragam" id="ukuran_seragam" required>
                          <option value="">Pilih ukuran seragam</option>
                          <option value="S">S</option>
                          <option value="M">M</option>
                          <option value="L">L</option>
                          <option value="XL">XL</option>
                          <option value="XXL">XXL</option>
                        </select>
                      </div>
                      <div>
                        <label>Tinggi Badan</label>
                        <input type="text" name="tinggi_badan" id="tinggi_badan" class="form-control"  />
                      </div>
                      <div>
                        <label>Berat Badan</label>
                        <input type="text" name="berat_badan" id="berat_badan" class="form-control"  />
                      </div>
                      <div>
                        <label>Lingkar Kepala</label>
                        <input type="text" name="lingkar_kepala" id="lingkar_kepala" class="form-control"  />
                      </div>
                      <div>
                        <label>Hobi</label>
                        <input type="text" name="hobi" id="hobi" class="form-control"  />
                      </div>
                      <div>
                        <label>Riwayat Penyakit</label>
                        <input type="text" name="riwayat_penyakit" id="riwayat_penyakit" class="form-control"  />
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
                  </div>
                  
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-lg btn-success">Simpan</button>
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

    <script src="http://esiap.berdayanusantara.id/asset/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
      $('#tanggal_lahir').datepicker({
        uiLibrary: 'bootstrap4',
        format:'dd/mm/yyyy'
      });
      $("#punya_saudara").change(function(){
        var value = $(this).val();
        if(value=="Ya")
        {
          document.getElementById("div_jenjang_saudara").style.display="block";
          document.getElementById("div_nama_saudara").style.display="block";
        }else{
          document.getElementById("div_jenjang_saudara").style.display="none";
          document.getElementById("div_nama_saudara").style.display="none";
        }
      });
      refreshData();
    });

      $(function () {
        $('#formUser').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            url: "<?php  echo base_url(); ?>santri/simpan_profile",
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
        url: '<?php  echo base_url(); ?>santri/data_profile',
        dataType:'json',
        success: function(data) {
          $.each(data.hasildata,function(i,v){
            $('#id').val(v.id);
            $('#kode').val(v.kode);
            $('#nama').val(v.nama);
            $('#nisn').val(v.nisn);
            $('#nik').val(v.nik);
            $('#sekolah_asal').val(v.sekolah_asal);
            $('#punya_saudara').val(v.punya_saudara);
            $('#jenjang_saudara').val(v.jenjang_saudara);
            $('#jenis_kelamin').val(v.jenis_kelamin);
            $('#tempat_lahir').val(v.tempat_lahir);
            $('#tanggal_lahir').val(v.tanggal_lahir);
            $('#alamat').val(v.alamat);
            $('#sekolah_asal').val(v.sekolah_asal);
            $('#ukuran_seragam').val(v.ukuran_seragam);
            $('#hobi').val(v.hobi);
            $('#riwayat_penyakit').val(v.riwayat_penyakit);
            $('#no_kk').val(v.no_kk);
            $('#kode_pos').val(v.kode_pos);
            $('#tinggi_badan').val(v.tinggi_badan);
            $('#berat_badan').val(v.berat_badan);
            $('#lingkar_kepala').val(v.lingkar_kepala);
            $('#anak_ke').val(v.anak_ke);
            $('#jml_saudara').val(v.jml_saudara);
            $('#status_anak').val(v.status_anak);
            $('#nama_saudara').val(v.nama_saudara);
            if((v.jenjang=="TKIT A")||(v.jenjang=="TKIT B")){
                document.getElementById("ukuran_tk").style.display="block";
                document.getElementById("ukuran_sd").style.display="none";
                document.getElementById("ukuran_smp").style.display="none";
            }else if (v.jenjang=="SDIT")
            {
                document.getElementById("ukuran_tk").style.display="none";
                document.getElementById("ukuran_sd").style.display="block";
                document.getElementById("ukuran_smp").style.display="none";
            }else if((v.jenjang=="SMPIT Quran")||(v.jenjang=="SMPIT Akademik")||(v.jenjang=="SMAIT"))
            {
                document.getElementById("ukuran_tk").style.display="none";
                document.getElementById("ukuran_sd").style.display="none";
                document.getElementById("ukuran_smp").style.display="block";
            }
            if(v.punya_saudara=="Ya")
            {
              document.getElementById("div_jenjang_saudara").style.display="block";
              document.getElementById("div_nama_saudara").style.display="block";
            }else{
              document.getElementById("div_jenjang_saudara").style.display="none";
              document.getElementById("div_nama_saudara").style.display="none";
            }
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