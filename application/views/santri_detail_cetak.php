<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo $page;?> - <?php echo $instansi;?> 
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="<?php echo base_url();?>asset/theme/fontawesome/css/all.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url();?>asset/theme/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url();?>asset/theme/assets/demo/demo.css" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/vendor/datatables/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/vendor/datatables/css/buttons.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/vendor/datatables/css/select.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/vendor/datatables/css/fixedHeader.bootstrap4.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/datepicker/css/gijgo.min.css">
</head>

<body onload="window.print()">
  <!-- <div class="wrapper "> -->
    <?php //echo $sidebar;?>
    <!-- <div class="main-panel"> -->
      <!-- Navbar -->
      <!-- <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Detail Data Calon Santri</a>
          </div>
          <?php echo $navbar;?>
        </div>
      </nav> -->
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Data Pribadi Santri</h4>
                  <!-- <button class="btn btn-info btn-sm float-right" onclick="refreshDataProfile()">Refresh <i class="fa fa-redo"></i></button> -->
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
                      <div>
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" required=""></textarea>
                      </div>
                      <div>
                        <label>Asal Sekolah</label>
                        <input type="text" name="sekolah_asal" id="sekolah_asal" class="form-control" required />
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
                        <select class="form-control" name="ukuran_seragam" id="ukuran_seragam">
                          <option value="">Pilih Ukuran Seragam</option>
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
                        <input type="text" name="hobi" id="hobi" class="form-control" required />
                      </div>
                      <div>
                        <label>Riwayat Penyakit</label>
                        <input type="text" name="riwayat_penyakit" id="riwayat_penyakit" class="form-control" required />
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
                  <!-- <button class="btn btn-info btn-sm float-right" onclick="tambahData()">Tambah Data <i class="fa fa-plus"></i></button>
                  &nbsp;
                  <button class="btn btn-info btn-sm float-right" onclick="refreshDataPrestasi()">Refresh <i class="fa fa-redo"></i></button> -->
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
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Data Orang Tua</h4>
                  <!-- <button class="btn btn-info btn-sm float-right" onclick="refreshDataOrangTua()">Refresh <i class="fa fa-redo"></i></button> -->
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
                          <option value="5000000">Rp, 5.000.000 sampai Rp, 10.000.000</option>
                          <option value="10000000">Rp, 10.000.000 sampai Rp, 20.000.000</option>
                          <option value="20000000">Lebih dari Rp, 20.000.000</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-success btn-sm">Simpan</button> -->
                </div>
                </form>
              </div>
            </div>
          </div>

           <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Data Dokumen Santri</h4>
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
                      <form id="upload_kartu_identitas_form">
                        <div>
                          <label>Scan Kartu Identitas</label><br>
                          <div id="form_kartu_identitas">
                            <input type="hidden" name="id_file_kartu_identitas" id="id_file_kartu_identitas">
                            <input type="file" id="kartu_identitas" name="kartu_identitas" class="form-control" >
                            <br>
                            <input type="button" id="upload_kartu_identitas" value="Upload File" class="btn btn-success btn-sm">
                            <progress id="progressBar_kartu_identitas" value="0" max="100" style="width:100%; display: none;"></progress>
                            <p id="status_kartu_identitas"></p>
                            <p id="loaded_n_total_kartu_identitas"></p>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <a style="display: none;" target="_blank" id="download_file_kartu_identitas" href="" class="btn btn-sm btn-primary"><span class="fa fa-book"></span> Lihat File</a>
                            </div>
                            <div class="col-sm-6">
                              <button style="display: none;" type="button" id="hapus_kartu_identitas" class="btn btn-sm btn-danger"><span class='fa fa-trash'></span> Hapus File</button>
                            </div>
                          </div>
                          <img style="display: none;" id="lihat_file_kartu_identitas" src="" width="100">
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
                      <form id="upload_rapor_form">
                        <div>
                          <label>Scan Rapor 3 Semester Terakhir</label><br>
                          <div id="form_rapor">
                            <input type="hidden" name="id_file_rapor" id="id_file_rapor">
                            <input type="file" id="rapor" name="rapor" class="form-control" >
                            <br>
                            <input type="button" id="upload_rapor" value="Upload File" class="btn btn-success btn-sm">
                            <progress id="progressBar_rapor" value="0" max="100" style="width:100%; display: none;"></progress>
                            <p id="status_rapor"></p>
                            <p id="loaded_n_total_rapor"></p>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <a style="display: none;" target="_blank" id="download_rapor" href="" class="btn btn-sm btn-primary"><span class="fa fa-book"></span> Lihat File</a>
                            </div>
                            <div class="col-sm-6">
                              <button style="display: none;" type="button" id="hapus_rapor" class="btn btn-sm btn-danger"><span class='fa fa-trash'></span> Hapus File</button>
                            </div>
                          </div>
                          <img style="display: none;" id="lihat_file_rapor" src="" width="100">
                        </div>
                      </form>
                      <hr>
                      <form id="upload_skhun_form">
                        <div>
                          <label>Scan SKHUN</label><br>
                          <div id="form_skhun">
                            <input type="hidden" name="id_file_skhun" id="id_file_skhun">
                            <input type="file" id="skhun" name="skhun" class="form-control" >
                            <br>
                            <input type="button" id="upload_skhun" value="Upload File" class="btn btn-success btn-sm">
                            <progress id="progressBar_skhun" value="0" max="100" style="width:100%; display: none;"></progress>
                            <p id="status_skhun"></p>
                            <p id="loaded_n_total_skhun"></p>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <a style="display: none;" target="_blank" id="download_skhun" href="" class="btn btn-sm btn-block btn-primary"><span class="fa fa-book"></span> Lihat File</a>
                            </div>
                            <div class="col-sm-6">
                              <button style="display: none;" type="button" id="hapus_skhun" class="btn btn-sm btn-danger"><span class='fa fa-trash'></span> Hapus File</button>
                            </div>
                          </div>
                          <img style="display: none;" id="lihat_file_skhun" src="" width="100">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
        </div>
      </div>
      <?php //echo $footer;?>
    <!-- </div>
  </div> -->
  <!--   Core JS Files   -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/core/jquery.min.js"></script>

  <script src="<?php echo base_url();?>asset/datepicker/js/gijgo.min.js"></script>
  <script src="<?php echo base_url();?>asset/theme/assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url();?>asset/theme/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin <?php echo base_url();?>asset/theme/or Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/arrive.min.js"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url();?>asset/theme/assets/demo/demo.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>/asset/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
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
      $("#upload_kartu_identitas").click(function(){
        ambilId("progressBar_kartu_identitas").style.display = "block";
        ambilId("status_kartu_identitas").style.display = "block";
        var file = ambilId("kartu_identitas").files[0];
        var nisn = ambilId("nisn").value;
        if (file!="") {
          var formdata = new FormData();
          formdata.append("kartu_identitas", file);
          formdata.append("nisn", nisn);
          formdata.append("id_uniq", "<?php echo $id_uniq;?>");
          var ajax = new XMLHttpRequest();
          ajax.upload.addEventListener("progress", progressHandlerKartuIdentitas, false);
          ajax.addEventListener("load", completeHandlerKartuIdentitas, false);
          ajax.addEventListener("error", errorHandlerKartuIdentitas, false);
          ajax.addEventListener("abort", abortHandlerKartuIdentitas, false);
          ajax.open("POST", "<?php echo base_url();?>santri/dokumen_kartu_identitas");
          ajax.send(formdata);
        }
      });
      $("#upload_rapor").click(function(){
        ambilId("progressBar_rapor").style.display = "block";
        ambilId("status_rapor").style.display = "block";
        var file = ambilId("rapor").files[0];
        var nisn = ambilId("nisn").value;
        if (file!="") {
          var formdata = new FormData();
          formdata.append("rapor", file);
          formdata.append("nisn", nisn);
          formdata.append("id_uniq", "<?php echo $id_uniq;?>");
          var ajax = new XMLHttpRequest();
          ajax.upload.addEventListener("progress", progressHandlerRapor, false);
          ajax.addEventListener("load", completeHandlerRapor, false);
          ajax.addEventListener("error", errorHandlerRapor, false);
          ajax.addEventListener("abort", abortHandlerRapor, false);
          ajax.open("POST", "<?php echo base_url();?>santri/dokumen_rapor");
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
      $("#upload_skhun").click(function(){
        ambilId("progressBar_skhun").style.display = "block";
        ambilId("status_skhun").style.display = "block";
        var file = ambilId("skhun").files[0];
        var nisn = ambilId("nisn").value;
        if (file!="") {
          var formdata = new FormData();
          formdata.append("skhun", file);
          formdata.append("nisn", nisn);
          formdata.append("id_uniq", "<?php echo $id_uniq;?>");
          var ajax = new XMLHttpRequest();
          ajax.upload.addEventListener("progress", progressHandlerSKHUN, false);
          ajax.addEventListener("load", completeHandlerSKHUN, false);
          ajax.addEventListener("error", errorHandlerSKHUN, false);
          ajax.addEventListener("abort", abortHandlerSKHUN, false);
          ajax.open("POST", "<?php echo base_url();?>santri/dokumen_skhun");
          ajax.send(formdata);
        }
      });
    });
    function refreshDataDokumen() {
      show_kartu_keluarga();
      show_kartu_identitas();
      show_rapor();
      show_akta();
      show_skhun();
    }
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
      $.ajax({
        url: "<?php  echo base_url(); ?>santri/calon_hapus_file_ajax",
        type: "POST",
        data:  {
          id_file:id_file
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

    function progressHandlerKartuIdentitas(event){
      var percent = (event.loaded / event.total) * 100;
      ambilId("progressBar_kartu_identitas").value = Math.round(percent);
      ambilId("status_kartu_identitas").innerHTML = Math.round(percent)+"% proses unggah dokumen... mohon tunggu";
    }
    function completeHandlerKartuIdentitas(event){
      ambilId("status_kartu_identitas").innerHTML = event.target.responseText;
      ambilId("progressBar_kartu_identitas").value = 0;
      show_kartu_identitas();
    }
    function errorHandlerKartuIdentitas(event){
      ambilId("status_kartu_identitas").innerHTML = "Unggah Gagal";
      show_kartu_identitas();
    }
    function abortHandlerKartuIdentitas(event){
      ambilId("status_kartu_identitas").innerHTML = "Unggah Terhenti";
      show_kartu_identitas();
    }
    function show_kartu_identitas() {
      var id = "<?php echo $id_uniq;?>";
      var nisn =  ambilId("nisn").value;
      $.ajax({
        type: "POST",
        url: '<?php  echo base_url(); ?>santri/detail_kartu_identitas',
        data:{
          id:id
        },
        dataType:'json',
        success: function(data) {
          $.each(data.hasildata,function(i,v){
            ambilId("id_file_kartu_identitas").value = v.id;
            var kartu_identitas = v.file;
            var eks_file = kartu_identitas.slice(-3);
            if(kartu_identitas!="")
            {
              if(eks_file=="pdf"){
                ambilId("download_file_kartu_identitas").style.display = "block";
                ambilId("lihat_file_kartu_identitas").style.display = "none";    
                ambilId("download_file_kartu_identitas").setAttribute('href', "<?php echo base_url();?>upload/santri/"+nisn+"/"+kartu_identitas);
                ambilId("hapus_kartu_identitas").style.display = "block";
                ambilId("form_kartu_identitas").style.display = "none";
              }else{
                ambilId("download_file_kartu_identitas").style.display = "none";
                ambilId("lihat_file_kartu_identitas").style.display = "block";
                ambilId("lihat_file_kartu_identitas").src = "<?php echo base_url();?>upload/santri/"+nisn+"/"+kartu_identitas;   
                ambilId("hapus_kartu_identitas").style.display = "block";
                ambilId("form_kartu_identitas").style.display = "none";
              }
            }else{
              ambilId("hapus_kartu_identitas").style.display = "none";
              ambilId("form_kartu_identitas").style.display = "block";
            }
          });
        }
      });
    }
    $("#hapus_kartu_identitas").click(function(){
      var id_file = ambilId("id_file_kartu_identitas").value;
      $.ajax({
        url: "<?php  echo base_url(); ?>santri/calon_hapus_file_ajax",
        type: "POST",
        data:  {
          id_file:id_file
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
              ambilId("hapus_kartu_identitas").style.display = "none";
              ambilId("form_kartu_identitas").style.display = "block";
              ambilId("upload_kartu_identitas_form").reset();
              ambilId("progressBar_kartu_identitas").style.display="none";
              ambilId("download_file_kartu_identitas").style.display="none";
              ambilId("status_kartu_identitas").style.display="none";
              ambilId("loaded_n_total_kartu_identitas").style.display="none";
              ambilId("lihat_file_kartu_identitas").style.display="none";
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

    function progressHandlerRapor(event){
      var percent = (event.loaded / event.total) * 100;
      ambilId("progressBar_rapor").value = Math.round(percent);
      ambilId("status_rapor").innerHTML = Math.round(percent)+"% proses unggah dokumen... mohon tunggu";
    }
    function completeHandlerRapor(event){
      ambilId("status_rapor").innerHTML = event.target.responseText;
      ambilId("progressBar_rapor").value = 0;
      show_rapor();
    }
    function errorHandlerRapor(event){
      ambilId("status_rapor").innerHTML = "Unggah Gagal";
      show_rapor();
    }
    function abortHandlerRapor(event){
      ambilId("status_rapor").innerHTML = "Unggah Terhenti";
      show_rapor();
    }
    function show_rapor() {
      var id = "<?php echo $id_uniq;?>";
      var nisn =  ambilId("nisn").value;
      $.ajax({
        type: "POST",
        url: '<?php  echo base_url(); ?>santri/detail_rapor',
        data:{
          id:id
        },
        dataType:'json',
        success: function(data) {
          $.each(data.hasildata,function(i,v){
            ambilId("id_file_rapor").value = v.id;
            var rapor = v.file;
            var eks_file = rapor.slice(-3);
            if(rapor!="")
            {
              if(eks_file=="pdf"){
                ambilId("download_rapor").style.display = "block";
                ambilId("lihat_file_rapor").style.display = "none";    
                ambilId("download_rapor").setAttribute('href', "<?php echo base_url();?>upload/santri/"+nisn+"/"+rapor);
                ambilId("hapus_rapor").style.display = "block";
                ambilId("form_rapor").style.display = "none";
              }else{
                ambilId("download_rapor").style.display = "none";
                ambilId("lihat_file_rapor").style.display = "block";
                ambilId("lihat_file_rapor").src = "<?php echo base_url();?>upload/santri/"+nisn+"/"+rapor;   
                ambilId("hapus_rapor").style.display = "block";
                ambilId("form_rapor").style.display = "none";
              }
            }else{
              ambilId("hapus_rapor").style.display = "none";
              ambilId("form_rapor").style.display = "block";
            }
          });
        }
      });
    }
    $("#hapus_rapor").click(function(){
      var id_file = ambilId("id_file_rapor").value;
      $.ajax({
        url: "<?php  echo base_url(); ?>santri/calon_hapus_file_ajax",
        type: "POST",
        data:  {
          id_file:id_file
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
              ambilId("hapus_rapor").style.display = "none";
              ambilId("form_rapor").style.display = "block";
              ambilId("upload_rapor_form").reset();
              ambilId("progressBar_rapor").style.display="none";
              ambilId("download_rapor").style.display="none";
              ambilId("status_rapor").style.display="none";
              ambilId("loaded_n_total_rapor").style.display="none";
              ambilId("lihat_file_rapor").style.display="none";
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
            var rapor = v.file;
            var eks_file = rapor.slice(-3);
            if(rapor!="")
            {
              if(eks_file=="pdf"){
                ambilId("download_file_akta_kelahiran").style.display = "block";
                ambilId("lihat_file_akta_kelahiran").style.display = "none";    
                ambilId("download_file_akta_kelahiran").setAttribute('href', "<?php echo base_url();?>upload/santri/"+nisn+"/"+rapor);
                ambilId("hapus_akta_kelahiran").style.display = "block";
                ambilId("form_akta_kelahiran").style.display = "none";
              }else{
                ambilId("download_file_akta_kelahiran").style.display = "none";
                ambilId("lihat_file_akta_kelahiran").style.display = "block";
                ambilId("lihat_file_akta_kelahiran").src = "<?php echo base_url();?>upload/santri/"+nisn+"/"+rapor;   
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
      $.ajax({
        url: "<?php  echo base_url(); ?>santri/calon_hapus_file_ajax",
        type: "POST",
        data:  {
          id_file:id_file
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

    function progressHandlerSKHUN(event){
      var percent = (event.loaded / event.total) * 100;
      ambilId("progressBar_skhun").value = Math.round(percent);
      ambilId("status_skhun").innerHTML = Math.round(percent)+"% proses unggah dokumen... mohon tunggu";
    }
    function completeHandlerSKHUN(event){
      ambilId("status_skhun").innerHTML = event.target.responseText;
      ambilId("progressBar_skhun").value = 0;
      show_skhun();
    }
    function errorHandlerSKHUN(event){
      ambilId("status_skhun").innerHTML = "Unggah Gagal";
      show_skhun();
    }
    function abortHandlerSKHUN(event){
      ambilId("status_skhun").innerHTML = "Unggah Terhenti";
      show_skhun();
    }
    function show_skhun() {
      var id = "<?php echo $id_uniq;?>";
      var nisn =  ambilId("nisn").value;
      $.ajax({
        type: "POST",
        url: '<?php  echo base_url(); ?>santri/detail_skhun',
        data:{
          id:id
        },
        dataType:'json',
        success: function(data) {
          $.each(data.hasildata,function(i,v){
            ambilId("id_file_skhun").value = v.id;
            var rapor = v.file;
            var eks_file = rapor.slice(-3);
            if(rapor!="")
            {
              if(eks_file=="pdf"){
                ambilId("download_skhun").style.display = "block";
                ambilId("lihat_file_skhun").style.display = "none";    
                ambilId("download_skhun").setAttribute('href', "<?php echo base_url();?>upload/santri/"+nisn+"/"+rapor);
                ambilId("hapus_skhun").style.display = "block";
                ambilId("form_skhun").style.display = "none";
              }else{
                ambilId("download_skhun").style.display = "none";
                ambilId("lihat_file_skhun").style.display = "block";
                ambilId("lihat_file_skhun").src = "<?php echo base_url();?>upload/santri/"+nisn+"/"+rapor;   
                ambilId("hapus_skhun").style.display = "block";
                ambilId("form_skhun").style.display = "none";
              }
            }else{
              ambilId("hapus_skhun").style.display = "none";
              ambilId("form_skhun").style.display = "block";
            }
          });
        }
      });
    }
    $("#hapus_skhun").click(function(){
      var id_file = ambilId("id_file_skhun").value;
      $.ajax({
        url: "<?php  echo base_url(); ?>santri/calon_hapus_file_ajax",
        type: "POST",
        data:  {
          id_file:id_file
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
              ambilId("hapus_skhun").style.display = "none";
              ambilId("form_skhun").style.display = "block";
              ambilId("upload_skhun_form").reset();
              ambilId("progressBar_skhun").style.display="none";
              ambilId("download_skhun").style.display="none";
              ambilId("status_skhun").style.display="none";
              ambilId("loaded_n_total_skhun").style.display="none";
              ambilId("lihat_file_skhun").style.display="none";
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
            $('#punya_saudara').val(v.punya_saudara);
            $('#jenjang_saudara').val(v.jenjang_saudara);
            $('#nik').val(v.nik);
            $('#ukuran_seragam').val(v.ukuran_seragam);
            $('#hobi').val(v.hobi);
            $('#riwayat_penyakit').val(v.riwayat_penyakit);
            $('#whatsapp').val(v.whatsapp);
            $('#email').val(v.email);
            $('#no_kk').val(v.no_kk);
            $('#kode_pos').val(v.kode_pos);
            $('#tinggi_badan').val(v.tinggi_badan);
            $('#berat_badan').val(v.berat_badan);
            $('#lingkar_kepala').val(v.lingkar_kepala);
            $('#anak_ke').val(v.anak_ke);
            $('#jml_saudara').val(v.jml_saudara);
            $('#status_anak').val(v.status_anak);
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
            }else{
              document.getElementById("div_jenjang_saudara").style.display="none";
            }
            if(v.foto!=""){
              $("#imgUser").attr('src','<?php echo base_url();?>upload/santri/'+v.foto);
            }else{
              $("#imgUser").attr('src','<?php echo base_url();?>asset/image_def.png');
            }
            show_kartu_keluarga();
            show_kartu_identitas();
            show_rapor();
            show_akta();
            show_skhun();
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