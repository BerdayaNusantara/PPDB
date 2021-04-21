<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Calon Siswa - <?php echo $instansi;?></title>
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
              <h1 class="m-0 text-dark">Detail Calon Siswa</h1>
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
                  <h4 class="card-title ">Data Pribadi Siswa</h4>
                  <button class="btn btn-info btn-sm float-right" onclick="refreshDataProfile()">Refresh <i class="fa fa-redo"></i></button>
                  <p class="card-category"></p>
                </div>
                <form action=""  enctype="multipart/form-data" id="formSantri" method="POST" class="form-horizontal"  role="form">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div>
                        <label>Kode Pendaftaran</label>
                        <input type="hidden" name="id_uniq" id="id_uniq" value="<?php echo $id_uniq;?>" class="form-control" required />
                        <input type="text" name="kode" id="kode" class="form-control" required readonly />
                      </div>
                      <div>
                        <label>Jenjang</label>
                        <select class="form-control" name="jenjang" id="jenjang">
                          <option value="">Pilih Jenjang</option>
                          <?php foreach($data_jenjang as $dj){?>
                            <option value="<?php echo $dj->id; ?>"><?php echo $dj->nama; ?></option>
                          <?php } ?>
                        </select>
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
                        <input type="text" name="nisn" id="nisn" class="form-control" required />
                      </div>
                      <div>
                        <label>Nomor Kartu Keluarga (KK)</label>
                        <input type="text" name="no_kk" id="no_kk"  class="form-control" required />
                      </div>
                      <div>
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                          <option value="">Pilih Jenis Kelamin</option>
                          <option value="Laki-Laki">Laki-Laki</option>
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
                    </div>
                    <div class="col-sm-6">
                      <div>
                        <label>Alamat Tempat Tinggal</label>
                        <textarea class="form-control" name="alamat" id="alamat" required=""></textarea>
                      </div>
                      <div>
                        <label>Kode POS</label>
                        <input type="text" name="kode_pos" id="kode_pos" class="form-control" required />
                      </div>
                      <div>
                        <label>Asal Sekolah</label>
                        <input type="text" name="sekolah_asal" id="sekolah_asal" class="form-control" required />
                      </div>
                      <div>
                        <label>Hobi</label>
                        <input type="text" name="hobi" id="hobi" class="form-control" required />
                      </div>
                      <div>
                        <label>Nomor Whatsapp</label>
                        <input type="text" name="whatsapp" id="whatsapp" class="form-control" required />
                      </div>
                      <div>
                        <label>Email</label>
                        <input type="text" name="email" id="email" class="form-control" required />
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
                  <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Data Prestasi</h4>
                  <button class="btn btn-info btn-sm float-right" onclick="tambahData()">Tambah Data <i class="fa fa-plus"></i></button>
                  &nbsp;
                  <button class="btn btn-info btn-sm float-right" onclick="refreshDataPrestasi()">Refresh <i class="fa fa-redo"></i></button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="prestasitable" class="table table-striped table-bordered second" style="width:100%">
                      <thead>
                        <tr>
                          <th style="text-align: center;">#</th>
                          <th>Nama</th>
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
          <div class="modal fade" id="modalPrestasi">
            <div class="modal-dialog">
              <div class="modal-content">          
                <!-- Modal Header -->
                <form action=""  enctype="multipart/form-data" id="formPrestasi" method="POST" class="form-horizontal"  role="form">
                <div class="modal-header">
                  <h4 class="modal-title">Tambah Data Prestasi</h4>
                  <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                  <div>
                    <label>Nama Prestasi</label>
                    <input type="hidden" name="id_prestasi" id="id_prestasi" class="form-control" required />
                    <input type="hidden" name="iduniq" id="iduniq" value="<?php echo $id_uniq;?>" class="form-control" required />
                    <input type="text" name="prestasi" id="prestasi" class="form-control" required />
                  </div>
                  <div>
                    <label>File Piagam</label><br>
                    <input type="file" name="foto" id="foto" />
                  </div>
                  <div>
                      <br>
                      <img id="imgPrestasi" width="100">
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
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Data Orang Tua</h4>
                  <button class="btn btn-info btn-sm float-right" onclick="refreshDataOrangTua()">Refresh <i class="fa fa-redo"></i></button>
                  <p class="card-category"></p>
                </div>
                <form class="form-horizontal" enctype="multipart/form-data" id="formOrangTua" method="POST" class="form-horizontal"  role="form">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div>
                        <label>NIK Ayah</label>
                        <input type="hidden" name="id_orangtua" id="id_orangtua" class="form-control" required />
                        <input type="hidden" name="id_uniq_orangtua" id="id_uniq_orangtua" value="<?php echo $id_uniq;?>" class="form-control" required />
                        <input type="text" name="nik_ayah" id="nik_ayah" class="form-control" required />
                      </div>
                      <div>
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" required />
                      </div>
                      <div>
                        <label>Tempat Lahir</label>
                        <input type="text" name="tmp_lhr_ayah" id="tmp_lhr_ayah" class="form-control" required />
                      </div>
                      <div>
                        <label>Tanggal Lahir</label>
                        <input type="text" name="tgl_lhr_ayah" id="tgl_lhr_ayah" class="form-control" required />
                      </div>
                      <div>
                        <label>Pendidikan Ayah</label>
                        <select class="form-control" name="pend_ayah" id="pend_ayah">
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
                        <select class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah">
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
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" required />
                      </div>
                      <div>
                        <label>Tempat Lahir</label>
                        <input type="text" name="tmp_lhr_ibu" id="tmp_lhr_ibu" class="form-control" required />
                      </div>
                      <div>
                        <label>Tanggal Lahir</label>
                        <input type="text" name="tgl_lhr_ibu" id="tgl_lhr_ibu" class="form-control" required />
                      </div>
                      <div>
                        <label>Pendidikan Ibu</label>
                        <select class="form-control" name="pend_ibu" id="pend_ibu">
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
                        <select class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu">
                          <option value="">Pilih Pekerjaan</option>
                          <option value="PNS">PNS</option>
                          <option value="BUMN">BUMN</option>
                          <option value="Guru">Guru</option>
                          <option value="Dosen">Dosen</option>
                          <option value="Tentara">Tentara</option>
                          <option value="Dokter">Dokter</option>
                          <option value="Wiraswasta">Wiraswasta</option>
                          <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
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
                  <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Data Dokumen Siswa</h4>
                  <button class="btn btn-info btn-sm float-right" onclick="refreshDataDokumen()">Refresh <i class="fa fa-redo"></i></button>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <form id="upload_kartu_keluarga_form">
                        <div>
                          <label>Scan Kartu Keluarga</label><br>
                          <div id="form_kartu_keluarga">
                            <input type="hidden" name="id_file_kartu_keluarga" id="id_file_kartu_keluarga">
                            <input type="file" id="kartu_keluarga" name="kartu_keluarga" class="form-control" >
                            <br>
                            <input type="button" id="upload_kartu_keluarga" value="Upload File" class="btn btn-success btn-sm">
                            <progress id="progressBar_kartu_keluarga" value="0" max="100" style="width:100%; display: none;"></progress>
                            <p id="status_kartu_keluarga"></p>
                            <p id="loaded_n_total_kartu_keluarga"></p>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <a style="display: none;" target="_blank" id="download_file_kartu_keluarga" href="" class="btn btn-sm btn-primary"><span class="fa fa-book"></span> Lihat File</a>
                            </div>
                            <div class="col-sm-6">
                              <button style="display: none;" type="button" id="hapus_kartu_keluarga" class="btn btn-danger btn-sm"><span class='fa fa-trash'></span> Hapus File</button>
                            </div>
                          </div>
                          <img style="display: none;" id="lihat_file_kartu_keluarga" src="" width="100">
                        </div>
                      </form>
                      <hr>
                      <form id="upload_akta_kelahiran_form">
                        <div>
                          <label>Scan Akta Kelahiran</label><br>
                          <div id="form_akta_kelahiran">
                            <input type="hidden" name="id_file_akta" id="id_file_akta">
                            <input type="file" id="akta_kelahiran" name="akta_kelahiran" class="form-control" >
                            <br>
                            <input type="button" id="upload_akta_kelahiran" value="Upload File" class="btn btn-success btn-sm">
                            <progress id="progressBar_akta_kelahiran" value="0" max="100" style="width:100%; display: none;"></progress>
                            <p id="status_akta_kelahiran"></p>
                            <p id="loaded_n_total_akta_kelahiran"></p>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <a style="display: none;" target="_blank" id="download_file_akta_kelahiran" href="" class="btn btn-sm btn-block btn-primary"><span class="fa fa-book"></span> Lihat File</a>
                            </div>
                            <div class="col-sm-6">
                              <button style="display: none;" type="button" id="hapus_akta_kelahiran" class="btn btn-danger btn-sm"><span class='fa fa-trash'></span> Hapus File</button>
                            </div>
                          </div>
                          <img style="display: none;" id="lihat_file_akta_kelahiran" src="" width="100">
                        </div>
                      </form>
                    </div>
                    <div class="col-sm-6">
                      <form id="upload_sttb_form">
                        <div>
                          <label>Scan STTB</label><br>
                          <div id="form_sttb">
                            <input type="hidden" name="id_file_sttb" id="id_file_sttb">
                            <input type="file" id="sttb" name="sttb" class="form-control" >
                            <br>
                            <input type="button" id="upload_sttb" value="Upload File" class="btn btn-success btn-sm">
                            <progress id="progressBar_sttb" value="0" max="100" style="width:100%; display: none;"></progress>
                            <p id="status_sttb"></p>
                            <p id="loaded_n_total_sttb"></p>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                                <a style="display: none;" target="_blank" id="download_file_sttb" href="" class="btn btn-sm btn-block btn-primary"><span class="fa fa-book"></span> Lihat File</a>
                            </div>
                            <div class="col-sm-6">
                                <button style="display: none;" type="button" id="hapus_sttb" class="btn btn-sm btn-danger"><span class='fa fa-trash'></span> Hapus File</button>
                            </div>
                          </div>
                          <img style="display: none;" id="lihat_file_sttb" src="" width="100">
                        </div>
                      </form>
                        <hr>
                        <form id="upload_tidak_mampu_form">
                            <div>
                                <label>Surat Keterangan Tidak Mampu</label><br>
                                <div id="form_tidak_mampu">
                                    <input type="hidden" name="id_file_tidak_mampu" id="id_file_tidak_mampu">
                                    <input type="file" id="tidak_mampu" name="tidak_mampu" class="form-control" >
                                    <br>
                                    <input type="button" id="upload_tidak_mampu" value="Upload File" class="btn btn-success btn-sm">
                                    <progress id="progressBar_tidak_mampu" value="0" max="100" style="width:100%; display: none;"></progress>
                                    <p id="status_tidak_mampu"></p>
                                    <p id="loaded_n_total_tidak_mampu"></p>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a style="display: none;" target="_blank" id="download_file_tidak_mampu" href="" class="btn btn-sm btn-block btn-primary"><span class="fa fa-book"></span> Lihat File</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <button style="display: none;" type="button" id="hapus_tidak_mampu" class="btn btn-sm btn-danger"><span class='fa fa-trash'></span> Hapus File</button>
                                    </div>
                                </div>
                                <img style="display: none;" id="lihat_file_tidak_mampu" src="" width="100">
                            </div>
                        </form>
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

<script src="<?php echo base_url();?>/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    function ambilId(file){
      return document.getElementById(file);
    }
    $(document).ready( function () {
      refreshDataProfile();
      refreshDataOrangTua();
      
      $('#tanggal_lahir').datepicker({
        uiLibrary: 'bootstrap4',
        format:'dd/mm/yyyy'
      });
      $('#tgl_lhr_ayah').datepicker({
        uiLibrary: 'bootstrap4',
        format:'dd/mm/yyyy'
      });
      $('#tgl_lhr_ibu').datepicker({
        uiLibrary: 'bootstrap4',
        format:'dd/mm/yyyy'
      });
      var iduniq = $("#id_uniq").val();
      $('#prestasitable').DataTable({
        retrieve: true,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        order: [],
        ajax: {
          url: "<?php echo site_url('backoffice/data_prestasi')?>",
          type: "POST",
          data: {iduniq:iduniq},
        },
        "columnDefs": [{
        "targets": [ 0 ], //first column / numbering column
        "orderable": true, //set not orderable
        },],
      });
      $("#pekerjaan_ayah").change(function (){
        var value = $(this).val();
        if(value=="Lainnya")
        {
          document.getElementById("div_pekerjaan_ayah_lainnya").style.display="block";
        }else{
          document.getElementById("div_pekerjaan_ayah_lainnya").style.display="none";
        }
      });
      $("#pekerjaan_ibu").change(function (){
        var value = $(this).val();
        if(value=="Lainnya")
        {
          document.getElementById("div_pekerjaan_ibu_lainnya").style.display="block";
        }else{
          document.getElementById("div_pekerjaan_ibu_lainnya").style.display="none";
        }
      });
      $("#punya_saudara").change(function(){
        var value = $(this).val();
        if(value=="Ya")
        {
          document.getElementById("div_jenjang_saudara").style.display="block";
        }else{
          document.getElementById("div_jenjang_saudara").style.display="none";
        }
      });
      $("#upload_kartu_keluarga").click(function(){
        ambilId("progressBar_kartu_keluarga").style.display = "block";
        ambilId("status_kartu_keluarga").style.display="block";
        var file = ambilId("kartu_keluarga").files[0];
        var nisn = ambilId("nisn").value;
        if (file!="") {
          var formdata = new FormData();
          formdata.append("kartu_keluarga", file);
          formdata.append("nisn", nisn);
          formdata.append("id_uniq", "<?php echo $id_uniq;?>");
          var ajax = new XMLHttpRequest();
          ajax.upload.addEventListener("progress", progressHandlerKartuKeluarga, false);
          ajax.addEventListener("load", completeHandlerKartuKeluarga, false);
          ajax.addEventListener("error", errorHandlerKartuKeluarga, false);
          ajax.addEventListener("abort", abortHandlerKartuKeluarga, false);
          ajax.open("POST", "<?php echo base_url();?>santri/dokumen_kartu_keluarga");
          ajax.send(formdata);
        }
      });
      $("#upload_akta_kelahiran").click(function(){
        ambilId("progressBar_akta_kelahiran").style.display = "block";
        ambilId("status_akta_kelahiran").style.display = "block";
        var file = ambilId("akta_kelahiran").files[0];
        var nisn = ambilId("nisn").value;
        if (file!="") {
          var formdata = new FormData();
          formdata.append("akta_kelahiran", file);
          formdata.append("nisn", nisn);
          formdata.append("id_uniq", "<?php echo $id_uniq;?>");
          var ajax = new XMLHttpRequest();
          ajax.upload.addEventListener("progress", progressHandlerAktaKelahiran, false);
          ajax.addEventListener("load", completeHandlerAktaKelahiran, false);
          ajax.addEventListener("error", errorHandlerAktaKelahiran, false);
          ajax.addEventListener("abort", abortHandlerAktaKelahiran, false);
          ajax.open("POST", "<?php echo base_url();?>santri/dokumen_akta_kelahiran");
          ajax.send(formdata);
        }
      });
      $("#upload_sttb").click(function(){
        ambilId("progressBar_sttb").style.display = "block";
        ambilId("status_sttb").style.display = "block";
        var file = ambilId("sttb").files[0];
        var nisn = ambilId("nisn").value;
        if (file!="") {
          var formdata = new FormData();
          formdata.append("sttb", file);
          formdata.append("nisn", nisn);
          formdata.append("id_uniq", "<?php echo $id_uniq;?>");
          var ajax = new XMLHttpRequest();
          ajax.upload.addEventListener("progress", progressHandlerSTTB, false);
          ajax.addEventListener("load", completeHandlerSTTB, false);
          ajax.addEventListener("error", errorHandlerSTTB, false);
          ajax.addEventListener("abort", abortHandlerSTTB, false);
          ajax.open("POST", "<?php echo base_url();?>santri/dokumen_sttb");
          ajax.send(formdata);
        }
      });

      $("#upload_tidak_mampu").click(function(){
        ambilId("progressBar_tidak_mampu").style.display = "block";
        ambilId("status_tidak_mampu").style.display = "block";
        var file = ambilId("tidak_mampu").files[0];
        var nisn = ambilId("nisn").value;
        if (file!="") {
          var formdata = new FormData();
          formdata.append("tidak_mampu", file);
          formdata.append("nisn", nisn);
          formdata.append("id_uniq", "<?php echo $id_uniq;?>");
          var ajax = new XMLHttpRequest();
          ajax.upload.addEventListener("progress", progressHandlerTidakMampu, false);
          ajax.addEventListener("load", completeHandlerTidakMampu, false);
          ajax.addEventListener("error", errorHandlerTidakMampu, false);
          ajax.addEventListener("abort", abortHandlerTidakMampu, false);
          ajax.open("POST", "<?php echo base_url();?>santri/dokumen_tidak_mampu");
          ajax.send(formdata);
        }
      });
    });
    function refreshDataDokumen() {
      show_kartu_keluarga();
      show_akta();
      show_sttb();
      show_tidak_mampu();
    }
    function progressHandlerTidakMampu(event){
      var percent = (event.loaded / event.total) * 100;
      ambilId("progressBar_tidak_mampu").value = Math.round(percent);
      ambilId("status_tidak_mampu").innerHTML = Math.round(percent)+"% proses unggah dokumen... mohon tunggu";
    }
    function completeHandlerTidakMampu(event){
      ambilId("status_tidak_mampu").innerHTML = event.target.responseText;
      ambilId("progressBar_tidak_mampu").value = 0;
      show_tidak_mampu();
    }
    function errorHandlerTidakMampu(event){
      ambilId("status_tidak_mampu").innerHTML = "Unggah Gagal";
      show_tidak_mampu();
    }
    function abortHandlerTidakMampu(event){
      ambilId("status_tidak_mampu").innerHTML = "Unggah Terhenti";
      show_tidak_mampu();
    }

    function show_tidak_mampu() {
      var id = "<?php echo $id_uniq;?>";
      var nisn = ambilId("nisn").value;
      $.ajax({
        type: "POST",
        url: '<?php  echo base_url(); ?>santri/detail_tidak_mampu',
        data:{
          id:id
        },
        dataType:'json',
        success: function(data) {
          $.each(data.hasildata,function(i,v){
            ambilId("id_file_tidak_mampu").value = v.id;
            var tidak_mampu = v.file;
            var eks_file = tidak_mampu.slice(-3);
            if(tidak_mampu!="")
            {
              if(eks_file=="pdf"){
                ambilId("download_file_tidak_mampu").style.display = "block";
                ambilId("lihat_file_tidak_mampu").style.display = "none";    
                ambilId("download_file_tidak_mampu").setAttribute('href', "<?php echo base_url();?>upload/santri/"+nisn+"/"+tidak_mampu);
                ambilId("hapus_tidak_mampu").style.display = "block";
                ambilId("form_tidak_mampu").style.display = "none";
              }else{
                ambilId("download_file_tidak_mampu").style.display = "none";
                ambilId("lihat_file_tidak_mampu").style.display = "block";
                ambilId("lihat_file_tidak_mampu").src = "<?php echo base_url();?>upload/santri/"+nisn+"/"+tidak_mampu;   
                ambilId("hapus_tidak_mampu").style.display = "block";
                ambilId("form_tidak_mampu").style.display = "none";
              }
            }else{
              ambilId("hapus_tidak_mampu").style.display = "none";
              ambilId("form_tidak_mampu").style.display = "block";
            }
          });
        }
      });
    }
    $("#hapus_tidak_mampu").click(function(){
      var id_file = ambilId("id_file_tidak_mampu").value;
      var nisn = ambilId("nisn").value;
      $.ajax({
        url: "<?php  echo base_url(); ?>santri/calon_hapus_file_ajax",
        type: "POST",
        data:  {
          id_file:id_file,
          nisn:nisn
        },
        dataType:'json',
        success: function(data)
        {
          if(data.hasil==1){
              Swal.fire({
                icon: 'success',
                title: data.pesan,
                showConfirmButton: false,
                timer: 3000
              });
              ambilId("hapus_tidak_mampu").style.display = "none";
              ambilId("form_tidak_mampu").style.display = "block";
              ambilId("upload_tidak_mampu_form").reset();
              ambilId("progressBar_tidak_mampu").style.display="none";
              ambilId("download_file_tidak_mampu").style.display="none";
              ambilId("status_tidak_mampu").style.display="none";
              ambilId("loaded_n_total_tidak_mampu").style.display="none";
              ambilId("lihat_file_tidak_mampu").style.display="none";
            }else{
              Swal.fire({
                icon: 'warning',
                title: data.pesan,
                showConfirmButton: false,
                timer: 3000
              })
            }
            
        }
      });
    });
    function progressHandlerKartuKeluarga(event){
      var percent = (event.loaded / event.total) * 100;
      ambilId("progressBar_kartu_keluarga").value = Math.round(percent);
      ambilId("status_kartu_keluarga").innerHTML = Math.round(percent)+"% proses unggah dokumen... mohon tunggu";
    }
    function completeHandlerKartuKeluarga(event){
      ambilId("status_kartu_keluarga").innerHTML = event.target.responseText;
      ambilId("progressBar_kartu_keluarga").value = 0;
      show_kartu_keluarga();
    }
    function errorHandlerKartuKeluarga(event){
      ambilId("status_kartu_keluarga").innerHTML = "Unggah Gagal";
      show_kartu_keluarga();
    }
    function abortHandlerKartuKeluarga(event){
      ambilId("status_kartu_keluarga").innerHTML = "Unggah Terhenti";
      show_kartu_keluarga();
    }
    function show_kartu_keluarga() {
      var id = "<?php echo $id_uniq;?>";
      var nisn =  ambilId("nisn").value;
      $.ajax({
        type: "POST",
        url: '<?php  echo base_url(); ?>santri/detail_kartu_keluarga',
        data:{
          id:id
        },
        dataType:'json',
        success: function(data) {
          $.each(data.hasildata,function(i,v){
            ambilId("id_file_kartu_keluarga").value = v.id;
            var kartu_keluarga = v.file;
            var eks_file = kartu_keluarga.slice(-3);
            if(kartu_keluarga!="")
            {
              if(eks_file=="pdf"){
                ambilId("download_file_kartu_keluarga").style.display = "block";
                ambilId("lihat_file_kartu_keluarga").style.display = "none";    
                ambilId("download_file_kartu_keluarga").setAttribute('href', "<?php echo base_url();?>upload/santri/"+nisn+"/"+kartu_keluarga);
                ambilId("hapus_kartu_keluarga").style.display = "block";
                ambilId("form_kartu_keluarga").style.display = "none";
              }else{
                ambilId("download_file_kartu_keluarga").style.display = "none";
                ambilId("lihat_file_kartu_keluarga").style.display = "block";
                ambilId("lihat_file_kartu_keluarga").src = "<?php echo base_url();?>upload/santri/"+nisn+"/"+kartu_keluarga;   
                ambilId("hapus_kartu_keluarga").style.display = "block";
                ambilId("form_kartu_keluarga").style.display = "none";
              }
            }else{
              ambilId("hapus_kartu_keluarga").style.display = "none";
              ambilId("form_kartu_keluarga").style.display = "block";
            }
          });
        }
      });
    }
    $("#hapus_kartu_keluarga").click(function(){
      var id_file = ambilId("id_file_kartu_keluarga").value;
      var nisn = ambilId("nisn").value;
      $.ajax({
        url: "<?php  echo base_url(); ?>santri/calon_hapus_file_ajax",
        type: "POST",
        data:  {
          id_file:id_file,
          nisn:nisn
        },
        dataType:'json',
        success: function(data)
        {
          if(data.hasil==1){
              Swal.fire({
                icon: 'success',
                title: data.pesan,
                showConfirmButton: false,
                timer: 3000
              });
              ambilId("hapus_kartu_keluarga").style.display = "none";
              ambilId("form_kartu_keluarga").style.display = "block";
              ambilId("upload_kartu_keluarga_form").reset();
              ambilId("progressBar_kartu_keluarga").style.display="none";
              ambilId("download_file_kartu_keluarga").style.display="none";
              ambilId("status_kartu_keluarga").style.display="none";
              ambilId("loaded_n_total_kartu_keluarga").style.display="none";
              ambilId("lihat_file_kartu_keluarga").style.display="none";
            }else{
              Swal.fire({
                icon: 'warning',
                title: data.pesan,
                showConfirmButton: false,
                timer: 3000
              })
            }
            
        }
      });
    });
    
    function progressHandlerAktaKelahiran(event){
      var percent = (event.loaded / event.total) * 100;
      ambilId("progressBar_akta_kelahiran").value = Math.round(percent);
      ambilId("status_akta_kelahiran").innerHTML = Math.round(percent)+"% proses unggah dokumen... mohon tunggu";
    }
    function completeHandlerAktaKelahiran(event){
      ambilId("status_akta_kelahiran").innerHTML = event.target.responseText;
      ambilId("progressBar_akta_kelahiran").value = 0;
      show_akta();
    }
    function errorHandlerAktaKelahiran(event){
      ambilId("status_akta_kelahiran").innerHTML = "Unggah Gagal";
      show_akta();
    }
    function abortHandlerAktaKelahiran(event){
      ambilId("status_akta_kelahiran").innerHTML = "Unggah Terhenti";
      show_akta();
    }
    function show_akta() {
      var id = "<?php echo $id_uniq;?>";
      var nisn =  ambilId("nisn").value;
      $.ajax({
        type: "POST",
        url: '<?php  echo base_url(); ?>santri/detail_akta_kelahiran',
        data:{
          id:id
        },
        dataType:'json',
        success: function(data) {
          $.each(data.hasildata,function(i,v){
            ambilId("id_file_akta").value = v.id;
            var akta = v.file;
            var eks_file = akta.slice(-3);
            if(akta!="")
            {
              if(eks_file=="pdf"){
                ambilId("download_file_akta_kelahiran").style.display = "block";
                ambilId("lihat_file_akta_kelahiran").style.display = "none";    
                ambilId("download_file_akta_kelahiran").setAttribute('href', "<?php echo base_url();?>upload/santri/"+nisn+"/"+akta);
                ambilId("hapus_akta_kelahiran").style.display = "block";
                ambilId("form_akta_kelahiran").style.display = "none";
              }else{
                ambilId("download_file_akta_kelahiran").style.display = "none";
                ambilId("lihat_file_akta_kelahiran").style.display = "block";
                ambilId("lihat_file_akta_kelahiran").src = "<?php echo base_url();?>upload/santri/"+nisn+"/"+akta;   
                ambilId("hapus_akta_kelahiran").style.display = "block";
                ambilId("form_akta_kelahiran").style.display = "none";
              }
            }else{
              ambilId("hapus_akta_kelahiran").style.display = "none";
              ambilId("form_akta_kelahiran").style.display = "block";
            }
          });
        }
      });
    }
    $("#hapus_akta_kelahiran").click(function(){
      var id_file = ambilId("id_file_akta").value;
      var nisn = ambilId("nisn").value;
      $.ajax({
        url: "<?php  echo base_url(); ?>santri/calon_hapus_file_ajax",
        type: "POST",
        data:  {
          id_file:id_file,
          nisn:nisn
        },
        dataType:'json',
        success: function(data)
        {
          if(data.hasil==1){
              Swal.fire({
                icon: 'success',
                title: data.pesan,
                showConfirmButton: false,
                timer: 3000
              });
              ambilId("hapus_akta_kelahiran").style.display = "none";
              ambilId("form_akta_kelahiran").style.display = "block";
              ambilId("upload_akta_kelahiran_form").reset();
              ambilId("progressBar_akta_kelahiran").style.display="none";
              ambilId("download_file_akta_kelahiran").style.display="none";
              ambilId("status_akta_kelahiran").style.display="none";
              ambilId("loaded_n_total_akta_kelahiran").style.display="none";
              ambilId("lihat_file_akta_kelahiran").style.display="none";
            }else{
              Swal.fire({
                icon: 'warning',
                title: data.pesan,
                showConfirmButton: false,
                timer: 3000
              })
            }
            
        }
      });
    });

    function progressHandlerSTTB(event){
      var percent = (event.loaded / event.total) * 100;
      ambilId("progressBar_sttb").value = Math.round(percent);
      ambilId("status_sttb").innerHTML = Math.round(percent)+"% proses unggah dokumen... mohon tunggu";
    }
    function completeHandlerSTTB(event){
      ambilId("status_sttb").innerHTML = event.target.responseText;
      ambilId("progressBar_sttb").value = 0;
      show_sttb();
    }
    function errorHandlerSTTB(event){
      ambilId("status_sttb").innerHTML = "Unggah Gagal";
      show_sttb();
    }
    function abortHandlerSTTB(event){
      ambilId("status_sttb").innerHTML = "Unggah Terhenti";
      show_sttb();
    }
    function show_sttb() {
      var id = "<?php echo $id_uniq;?>";
      var nisn = ambilId("nisn").value;
      $.ajax({
        type: "POST",
        url: '<?php  echo base_url(); ?>santri/detail_sttb',
        data:{
          id:id
        },
        dataType:'json',
        success: function(data) {
          $.each(data.hasildata,function(i,v){
            ambilId("id_file_sttb").value = v.id;
            var sttb = v.file;
            var eks_file = sttb.slice(-3);
            if(sttb!="")
            {
              if(eks_file=="pdf"){
                ambilId("download_file_sttb").style.display = "block";
                ambilId("lihat_file_sttb").style.display = "none";    
                ambilId("download_file_sttb").setAttribute('href', "<?php echo base_url();?>upload/santri/"+nisn+"/"+sttb);
                ambilId("hapus_sttb").style.display = "block";
                ambilId("form_sttb").style.display = "none";
              }else{
                ambilId("download_file_sttb").style.display = "none";
                ambilId("lihat_file_sttb").style.display = "block";
                ambilId("lihat_file_sttb").src = "<?php echo base_url();?>upload/santri/"+nisn+"/"+sttb;   
                ambilId("hapus_sttb").style.display = "block";
                ambilId("form_sttb").style.display = "none";
              }
            }else{
              ambilId("hapus_sttb").style.display = "none";
              ambilId("form_sttb").style.display = "block";
            }
          });
        }
      });
    }
    $("#hapus_sttb").click(function(){
      var id_file = ambilId("id_file_sttb").value;
      var nisn = ambilId("nisn").value;
      $.ajax({
        url: "<?php  echo base_url(); ?>santri/calon_hapus_file_ajax",
        type: "POST",
        data:  {
          id_file:id_file,
          nisn:nisn
        },
        dataType:'json',
        success: function(data)
        {
          if(data.hasil==1){
              Swal.fire({
                icon: 'success',
                title: data.pesan,
                showConfirmButton: false,
                timer: 3000
              });
              ambilId("hapus_sttb").style.display = "none";
              ambilId("form_sttb").style.display = "block";
              ambilId("upload_sttb_form").reset();
              ambilId("progressBar_sttb").style.display="none";
              ambilId("download_file_sttb").style.display="none";
              ambilId("status_sttb").style.display="none";
              ambilId("loaded_n_total_sttb").style.display="none";
              ambilId("lihat_file_sttb").style.display="none";
            }else{
              Swal.fire({
                icon: 'warning',
                title: data.pesan,
                showConfirmButton: false,
                timer: 3000
              })
            }
            
        }
      });
    });





    function refreshDataProfile() {
      var id_uniq = $("#id_uniq").val();
      $.ajax({
        type: "POST",
        url: "<?php  echo base_url(); ?>backoffice/profile_santri",
        data:{
          id_uniq:id_uniq
        },
        dataType:'json',
        success: function(data) {
          $.each(data.hasildata,function(i,v){
            $('#kode').val(v.kode);
            $('#nama').val(v.nama);
            $('#nisn').val(v.nisn);
            $('#nik').val(v.nik);
            $('#jenis_kelamin').val(v.jenis_kelamin);
            $('#tempat_lahir').val(v.tempat_lahir);
            $('#tanggal_lahir').val(v.tanggal_lahir);
            $('#alamat').val(v.alamat);
            $('#sekolah_asal').val(v.sekolah_asal);
            $('#nik').val(v.nik);
            $('#hobi').val(v.hobi);
            $('#whatsapp').val(v.whatsapp);
            $('#email').val(v.email);
            $('#no_kk').val(v.no_kk);
            $('#kode_pos').val(v.kode_pos);
            $('#anak_ke').val(v.anak_ke);
            $('#jml_saudara').val(v.jml_saudara);
            $('#jenjang').val(v.jenjang);
            $('#status_anak').val(v.status_anak);
            if(v.foto!=""){
              $("#imgUser").attr('src','<?php echo base_url();?>upload/santri/'+v.foto);
            }else{
              $("#imgUser").attr('src','<?php echo base_url();?>asset/image_def.png');
            }
            show_kartu_keluarga();
            show_akta();
            show_sttb();
          });
        }
      });
    };
    function refreshDataOrangTua() {
       var iduniq = $("#id_uniq").val();
      $.ajax({
        type: "POST",
        url: '<?php  echo base_url(); ?>backoffice/data_orangtua',
        data:{
          iduniq:iduniq
        },
        dataType:'json',
        success: function(data) {
          $.each(data.hasildata,function(i,v){
            $('#id_orangtua').val(v.id);
            $('#nik_ayah').val(v.nik_ayah);
            $('#nama_ayah').val(v.nama_ayah);
            $('#tmp_lhr_ayah').val(v.tmp_lhr_ayah);
            $('#tgl_lhr_ayah').val(v.tgl_lhr_ayah);
            $('#pend_ayah').val(v.pend_ayah);
            $('#pekerjaan_ayah').val(v.pekerjaan_ayah);
            $('#pekerjaan_ayah_lainnya').val(v.pekerjaan_ayah_lain);
            $('#nomor_ayah').val(v.nomor_ayah);
            $('#penghasilan_ayah').val(v.penghasilan_ayah);
            $('#nik_ibu').val(v.nik_ibu);
            $('#nama_ibu').val(v.nama_ibu);
            $('#tmp_lhr_ibu').val(v.tmp_lhr_ibu);
            $('#tgl_lhr_ibu').val(v.tgl_lhr_ibu);
            $('#pend_ibu').val(v.pend_ibu);
            $('#pekerjaan_ibu').val(v.pekerjaan_ibu);
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
    };

    $(function () {
      $('#formOrangTua').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
          url: "<?php  echo base_url(); ?>backoffice/update_orangtua",
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
                timer: 3000
              })
            }else{
              Swal.fire({
                icon: 'warning',
                title: data.pesan,
                showConfirmButton: false,
                timer: 3000
              })
            }
            document.getElementById("formOrangTua").reset();
            refreshDataOrangTua();
          }
        });
      });
    });
    $(function () {
      $('#formSantri').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
          url: "<?php  echo base_url(); ?>backoffice/update_santri",
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
                timer: 3000
              })
            }else{
              Swal.fire({
                icon: 'warning',
                title: data.pesan,
                showConfirmButton: false,
                timer: 3000
              })
            }
            document.getElementById("formSantri").reset();
            refreshDataProfile();
          }
        });
      });
    });
    function tambahData() {
      $('#id_prestasi').val("");
      document.getElementById("imgPrestasi").style.display = "none";
      var modal = $("#modalPrestasi");
      modal.find('.modal-title').text('Tambah Data Prestasi');
      $("#modalPrestasi").modal();
    };
    function refreshDataPrestasi() {
      $('#prestasitable').DataTable().ajax.reload();
    };
    $(function () {
      $('#formPrestasi').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
          url: "<?php  echo base_url(); ?>backoffice/simpan_prestasi",
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
            document.getElementById("formPrestasi").reset();
            refreshDataPrestasi();
            $('#modalPrestasi').modal('hide');
          }   
        });
      });
    });
    function updateDataPrestasi(id) {
      $('#id_prestasi').val(id);
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
              $("#imgPrestasi").attr('src','<?php echo base_url();?>upload/santri/'+v.nisn+'/'+v.file);
            }else{
              $("#imgPrestasi").attr('src','<?php echo base_url();?>/asset/image_def.png');
            }
          });
        }
      });
    }
    function hapusPrestasi(id) {
      $("#id_data_hapus").val(id);
      $("#modalHapusData").modal();
    }
    function hapusData() {
      var id = $("#id_data_hapus").val();
      $.ajax({
        url: "<?php  echo base_url(); ?>backoffice/data_hapus_prestasi",
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
          refreshDataPrestasi();
          $('#modalHapusData').modal('hide');
          $('#id_data_hapus').val("");
        }
      });
    }
  </script>
</body>

</html>