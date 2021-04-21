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
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<style type="text/css">
  table{
    top: 30%;
    left:10%;
    font-weight:800;
  }
  table th, table td{
    border: 1px solid;
  }
  tr {
    border: 1px solid black;
    color: #000;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 20px;
  }
  td{
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    padding-right: 10px;
  }
  </style>
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
              <h1 class="m-0 text-dark">Cetak Kartu Ujian</h1>
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
                  <?php foreach ($data_santri as $d) {?>
                    <?php if($tanggal_ujian=="0,0"){?>
                        <div class="alert alert-warning alert-with-icon" data-notify="container">
                            <i class="fa fa-info"></i>
                            <span data-notify="message">Silahkan memilih jadwal ujian terlebih dahulu untuk mencetak kartu</span>
                        </div>
                       
                        
                    <?php }else if($dokumen_status=="0"){
                    ?>
                     <div class="alert alert-warning alert-with-icon" data-notify="container">
                            <i class="fa fa-info"></i>
                            <span data-notify="message">Silahkan melengkapi dokumen untuk terlebih dahulu untuk mencetak kartu</span>
                        </div>
                    <?php }else{?>
                        <div class="row">
                            <div id="konten">
                            <div class="col-12 col-sm-6">
                                 <!-- <table style="top: 30%;left:10%;font-weight:800;"> -->
                                 <table>
                                    <tr>
                                      <td colspan="3"><p style="font-size: 15px;text-align:center;">KARTU TANDA PESERTA<br>UJIAN PENERIMAAN PESERTA DIDIK BARU<br>TAHUN PELAJARAN 2021/2022</p></td>
                                    </tr>
                                    <tr>
                                        <td>No.Peserta </td>
                                        <td colspan="2">: <?php echo $d->kode;?></td>
                                    </tr>
                                    <tr>
                                        <td>Jurusan </td>
                                        <td colspan="2">: <?php echo $d->jurusan_nama;?></td>
                                    </tr>
                                     <tr>
                                        <td>Nama</td>
                                        <td colspan="2">: <?php echo $d->nama;?></td>
                                    </tr>
                                     <tr>
                                        <td>Jenis Kelamin </td>
                                        <td colspan="2">: <?php echo $d->jenis_kelamin;?></td>
                                    </tr>
                                     <tr>
                                        <td colspan="3"><p style="font-size: 15px;text-align:center;margin-bottom:-3px;">JADWAL UJIAN</p></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center;border: 1px solid black;">Jenis Tes </td>
                                        <td style="text-align:center;border: 1px solid black;">Tanggal</td>
                                        <td style="text-align:center;border: 1px solid black;">Keterangan</td>
                                    </tr>

                                    <tr>
                                        <td style="border: 1px solid black;">-<?php echo $nama_tes;?></td>
                                        <td style="text-align:center;border: 1px solid black;"><?php echo $tanggal_ujian; ?></td>
                                        <td style="text-align:center;border: 1px solid black;"><?php echo $keterangan; ?></td>
                                    </tr>
                                </table>
                                
                            </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <a target="_blank" href="<?php echo base_url();?>santri/print_cetak_kartu" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Cetak Kartu</a>
                        <button id="btn" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Download Kartu</button>
                        
                        
                    <?php } }?>
                    
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

</body>
<script>
  window.onload = function () {
    document.getElementById("btn")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("konten");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: [0.5,0.5,2,3.5],
                filename: 'Kartu Tanda Peserta PPDB.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 3 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
  };
</script>
<script type="text/javascript">
  
  $(document).ready(function() {
    var doc = new jsPDF();
    var specialElementHandlers = {
    '#editor': function (element, renderer) {
      return true;
    }
  };
  // $('#btn').click(function () {
  //   doc.fromHTML($('#konten').html(), 15, 15, {
  //     'width': 170,
  //     'elementHandlers': specialElementHandlers
  //   });
  //     doc.save('download.pdf');
  //   });
 });
</script>

</html>