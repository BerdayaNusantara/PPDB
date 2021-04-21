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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  
  <!-- <style type="text/css">
    .bgimg {
        background-image: url('../asset/image/bgkartu.jpg');
    }
    </style> -->
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

<body onload="window.print()">
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <?php foreach ($data_santri as $d) {?>
                  <div class="row">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-12 col-sm-6">
                                 <table style="top: 30%;left:10%;font-weight:800;">
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
                    <div class="col-sm-3">
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/core/jquery.min.js"></script>
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
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url();?>asset/theme/assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url();?>asset/theme/assets/demo/demo.js"></script>


    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
    $(document).ready( function () {
            // $('#usertable').DataTable({
            //   responsive: true,
            //   retrieve: true,
            //   scrollX: true,
            //   processing: true, //Feature control the processing indicator.
            //   serverSide: true, //Feature control DataTables' server-side processing mode.
            //   order: [],
            //   ajax: {
            //     url: "<?php echo site_url('user/data_list')?>",
            //     type: "POST"
            //   },
            //   "columnDefs": [{
            //   "targets": [ 0 ], //first column / numbering column
            //   "orderable": true, //set not orderable
            //   },],
            // });
        });
    $('#modalUser').on('hidden.bs.modal', function () {
            document.getElementById("formUser").reset();
        });
        function tambaData() {
            $('#id').val("");
            document.getElementById("imgUser").style.display = "none";

            var modal = $("#modalUser");
            modal.find('.modal-title').text('Tambah Data User');
            $("#modalUser").modal();
        };
        function refreshData() {
            $('#usertable').DataTable().ajax.reload();
        };
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