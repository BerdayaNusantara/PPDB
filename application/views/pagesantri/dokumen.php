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
              <h1 class="m-0 text-dark">Dokumen Siswa</h1>
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
                  <h4 class="card-title ">Data Dokumen Siswa</h4>
                  <button class="btn btn-info btn-sm float-right" onclick="refreshDataDokumen()">Refresh <i class="fa fa-redo"></i></button>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                        <input type="hidden" name="nisn" id="nisn" class="form-control" required />
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
  <!-- <script src="<?php echo base_url();?>asset/theme/datetimepicker/js/bootstrap-datetimepicker.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    function ambilId(file){
      return document.getElementById(file);
    }
    function refreshDataProfile() {
      $.ajax({
        type: "POST",
        url: "<?php  echo base_url(); ?>santri/data_profile",
        dataType:'json',
        success: function(data) {
          $.each(data.hasildata,function(i,v){
            $('#nisn').val(v.nisn);
            show_kartu_keluarga();
            show_akta();
            show_sttb();
            show_tidak_mampu();
          });
        }
      });
    };
    $(document).ready( function () {
      refreshDataProfile();
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
      var nisn = ambilId("nisn").value;
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
      var nisn = ambilId("nisn").value;
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
    
  </script>
</body>

</html>