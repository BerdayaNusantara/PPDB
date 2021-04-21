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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/datepicker/css/gijgo.min.css">
</head>

<body class="">
  <div class="wrapper ">
    <?php echo $sidebar;?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Master <?php echo $page;?></a>
          </div>
          <?php echo $navbar;?>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Data Jadwal Ujian Calon Santri</h4>
                    <button class="btn btn-info btn-sm float-right" onclick="refreshData()">Refresh <i class="fa fa-redo"></i></button>
                    <button class="btn btn-info btn-sm float-right" onclick="tambahData()">Buat Jadwal <i class="fa fa-calendar"></i></button>
                    <!--<button class="btn btn-info btn-sm float-right" onclick="tambahData()">Kirim Jadwal <i class="fa fa-calendar"></i></button>-->
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="santritable" class="table table-striped table-bordered second" style="width:100%">
                      <thead>
                        <tr>
                          <th style="text-align: center;">#</th>
                          <th>Jenjang</th>
                          <th>Tanggal</th>
                          <th>Kuota</th>
                          <th>Sisa</th>
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
      </div>

    <div class="modal fade" id="modalUser">
      <div class="modal-dialog">
        <div class="modal-content">          
          <!-- Modal Header -->
          <form action=""  enctype="multipart/form-data" id="formUser" method="POST" class="form-horizontal"  role="form">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Jadwal</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <div>
                <label>Jenjang</label>
                <input type="hidden" name="id" id="id" class="form-control"  />
                <select class="form-control" name="jenjang" id="jenjang">
                    <option value="">Pilih Jenjang</option>
                    <option value="<?php echo $jenjang;?>"><?php echo $jenjang;?></option>
                </select>
            </div>
            <div>
                <label>Tanggal</label>
                <input type="text" name="tanggal" id="tanggal" class="form-control" required />
            </div>
            <div>
              <label>Kuota</label>
              <input type="number" name="kuota" id="kuota" class="form-control" required />
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
      <?php echo $footer;?>
    </div>
  </div>
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
  <!--  Google Maps Plugin    -->
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
    $('#tanggal').datepicker({
        uiLibrary: 'bootstrap4',
        format:'dd/mm/yyyy'
    });
  
    $(document).ready( function () {
      var iduniqsantri = new Array();
      var whatsappsantri = new Array();
      var table= $('#santritable').DataTable({
        responsive: true,
        retrieve: true,
        scrollX: true,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        order: [],
        ajax: {
          url: "<?php echo site_url('unit/jadwal_data')?>",
          type: "POST"
        },
        "columnDefs": [{
              "targets": [ 0 ], //first column / numbering column
              "orderable": true, //set not orderable
              },],
      });
      
      $('#kirimjadwal').click( function () {
        var iduniq;
        var whatsapp;
        var oData = table.rows('.selected').data();
        for (var i=0; i < oData.length ;i++){
          iduniq = oData[i][8];
          whatsapp = oData[i][5];
              //alert(iduniq+whatsapp+tanggal);
          iduniqsantri.push(iduniq);
          whatsappsantri.push(whatsapp);
        }
        console.log(oData.length);
        if(oData.length>0){
          var modal = $("#modalUser");
          modal.find('.modal-title').text('Kirim jadwal ujian');
          modal.modal();

          $('#formUser').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
              url: "<?php  echo base_url(); ?>santri/jadwal_simpan",
              type: "POST",
              data:  {
                "iduniqsantri":iduniqsantri,
                "whatsappsantri":whatsappsantri,
                "tanggal": document.getElementById("tangal_ujian").value
              },
              dataType:'json',
              success: function(data){
                if(data.hasil==1){
                  oData.length = 0;
                  iduniqsantri.length = 0;
                  Swal.fire({
                    icon: 'success',
                    title: data.pesan,
                    showConfirmButton: false,
                    timer: 1000
                  })
                }else{
                  oData.length = 0;
                  iduniqsantri.length = 0;
                  Swal.fire({
                    icon: 'warning',
                    title: data.pesan,
                    showConfirmButton: false,
                    timer: 1000
                  })
                }
                var iduniq="";
                var whatsapp="";
                console.log(oData.length);
                document.getElementById("formUser").reset();
                refreshData();
                $('#modalUser').modal('hide');
              }
            });
          });
        }else{
          Swal.fire({
            icon: 'warning',
            title: 'Pilih data siswa terlebih dahulu',
            showConfirmButton: true,
          })
        }
        


        //console.log(emailsatri);
        // $.ajax({
        //   url: "<?php  echo base_url(); ?>santri/jadwal_simpan",
        //   type: "POST",
        //   data:  {emailsatri:emailsatri},
        //   contentType: false,
        //   cache: false,
        //   processData:false,
        //   dataType:'json',
        //   success: function(data){
        //     if(data.hasil==1){
        //       Swal.fire({
        //         icon: 'success',
        //         title: data.pesan,
        //         showConfirmButton: false,
        //         timer: 1000
        //       })
        //     }else{
        //       Swal.fire({
        //         icon: 'warning',
        //         title: data.pesan,
        //         showConfirmButton: false,
        //         timer: 1000
        //       })
        //     }
        //     document.getElementById("formUser").reset();
        //     refreshData();
        //     $('#modalUser').modal('hide');
        //   }
        // });

      });
      
    });
    $('#modalUser').on('hidden.bs.modal', function () {
        document.getElementById("formUser").reset();
    });
    function refreshData() {
      $('#santritable').DataTable().ajax.reload();
    };
    function tambahData()
    {
        $('#id').val("");
        var modal = $("#modalUser");
        modal.find('.modal-title').text('Tambah jadwal ujian');
        modal.modal();
    }
    function updateJadwal(id) {
      $('#id').val(id);
      var modal = $("#modalUser");
      modal.find('.modal-title').text('Edit jadwal ujian');
      modal.modal();
            $.ajax({
              type: "POST",
              url: '<?php  echo base_url(); ?>santri/jadwal_detail',
              data:{
                id:id
              },
              dataType:'json',
              success: function(data) {
                $.each(data.hasildata,function(i,v){
                  $('#id').val(v.id);
                  $('#jenjang').val(v.jenjang);
                  $('#tanggal').val(v.tanggal);
                  $('#kuota').val(v.kuota);
                });
              }
            });

    };
    function hapusJadwal(id) {
            $("#id_data_hapus").val(id);
            $("#modalHapusData").modal();
    }
    function hapusData() {
        var id = $("#id_data_hapus").val();
        $.ajax({
            url: "<?php  echo base_url(); ?>santri/jadwal_hapus",
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
    $(function () {
        $('#formUser').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?php  echo base_url(); ?>santri/jadwal_simpan",
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
  </script>
</body>

</html>