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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url();?>asset/theme/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url();?>asset/theme/assets/demo/demo.css" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="http://esiap.berdayanusantara.id/asset/vendor/datatables/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="http://esiap.berdayanusantara.id/asset/vendor/datatables/css/buttons.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="http://esiap.berdayanusantara.id/asset/vendor/datatables/css/select.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="http://esiap.berdayanusantara.id/asset/vendor/datatables/css/fixedHeader.bootstrap4.css">
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
                  <h4 class="card-title ">Data Alasan</h4>
                  <button class="btn btn-info btn-sm float-right" onclick="tambaData()">Tambah Data <i class="fa fa-plus"></i></button>&nbsp;
                  <button class="btn btn-info btn-sm float-right" onclick="refreshData()">Refresh <i class="fa fa-redo"></i></button>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="alasantable" class="table table-striped table-bordered second" style="width:100%">
                      <thead>
                        <tr>
                          <th style="text-align: center;">#</th>
                          <th>Judul</th>
                          <th>Deskripsi</th>
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
                  <h4 class="card-title ">Data Call Center</h4>
                  <button class="btn btn-info btn-sm float-right" onclick="tambaDataCall()">Tambah Data <i class="fa fa-plus"></i></button>&nbsp;
                  <button class="btn btn-info btn-sm float-right" onclick="refreshCall()">Refresh <i class="fa fa-redo"></i></button>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="calltable" class="table table-striped table-bordered second" style="width:100%">
                      <thead>
                        <tr>
                          <th style="text-align: center;">#</th>
                          <th>Kontak</th>
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

    <div class="modal fade" id="modalAlasan">
      <div class="modal-dialog">
        <div class="modal-content">          
          <!-- Modal Header -->
          <form action=""  enctype="multipart/form-data" id="formAlasan" method="POST" class="form-horizontal"  role="form">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Alasan</h4>
            <button type="button" class="close" data-dismiss="modal">??</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <div>
              <label>Judul</label>
              <input type="hidden" name="id" id="id" class="form-control" required />
              <input type="text" name="judul" id="judul" class="form-control" required />
            </div>
            <div>
              <label>Deskripsi</label>
              <textarea class="form-control" name="deskripsi" id="deskripsi" required=""></textarea>
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
    <div class="modal fade" id="modalCall">
      <div class="modal-dialog">
        <div class="modal-content">          
          <!-- Modal Header -->
          <form action=""  enctype="multipart/form-data" id="formCall" method="POST" class="form-horizontal"  role="form">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Call Center</h4>
            <button type="button" class="close" data-dismiss="modal">??</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <div>
              <label>Kontak</label>
              <input type="hidden" name="id_call" id="id_call" class="form-control" required />
              <input type="text" name="kontak" id="kontak" class="form-control" required />
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

    <script src="http://esiap.berdayanusantara.id/asset/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready( function () {
      $('#alasantable').DataTable({
        responsive: true,
        retrieve: true,
        scrollX: true,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        order: [],
        ajax: {
          url: "<?php echo site_url('alasan/data_list')?>",
          type: "POST"
        },
        "columnDefs": [{
          "targets": [ 0 ], //first column / numbering column
          "orderable": true, //set not orderable
        },],
      });
      $('#calltable').DataTable({
        responsive: true,
        retrieve: true,
        scrollX: true,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        order: [],
        ajax: {
          url: "<?php echo site_url('call/data_list')?>",
          type: "POST"
        },
        "columnDefs": [{
          "targets": [ 0 ], //first column / numbering column
          "orderable": true, //set not orderable
        },],
      });
    });
    $('#modalAlasan').on('hidden.bs.modal', function () {
      document.getElementById("formAlasan").reset();
    });
    $('#modalCall').on('hidden.bs.modal', function () {
      document.getElementById("formCall").reset();
    });
    function tambaData() {
      $('#id').val("");
      var modal = $("#modalAlasan");
      modal.find('.modal-title').text('Tambah Data Alasan');
      $("#modalAlasan").modal();
    };

    function tambaDataCall() {
      $('#id_call').val("");
      var modal = $("#modalCall");
      modal.find('.modal-title').text('Tambah Data Call');
      $("#modalCall").modal();
    };
    function refreshData() {
      $('#alasantable').DataTable().ajax.reload();
    };
    function refreshCall() {
      $('#calltable').DataTable().ajax.reload();
    };
    $(function () {
      $('#formAlasan').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
          url: "<?php  echo base_url(); ?>alasan/data_simpan",
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
            document.getElementById("formAlasan").reset();
            refreshData();
            $('#modalAlasan').modal('hide');
          }   
        });
      });
      $('#formCall').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
          url: "<?php  echo base_url(); ?>call/data_simpan",
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
            document.getElementById("formCall").reset();
            refreshCall();
            $('#modalCall').modal('hide');
          }   
        });
      });
    });
    function hapusAlasan(id) {
      $("#id_data_hapus").val(id);
      $("#modalHapusData").modal();
    }
    function hapusKontak(id) {
      $("#id_data_hapus_second").val(id);
      $("#modalHapusDataSecond").modal();
    }
    function hapusData() {
      var id = $("#id_data_hapus").val();
      $.ajax({
        url: "<?php  echo base_url(); ?>alasan/data_hapus",
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
    function hapusDataSecond() {
      var id = $("#id_data_hapus_second").val();
      $.ajax({
        url: "<?php  echo base_url(); ?>call/data_hapus",
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
          refreshCall();
           $('#modalHapusDataSecond').modal('hide');
           $('#id_data_hapus_second').val("");
         }   
      });
    }
      function updateAlasan(id) {
        $('#id').val(id);
        var modal = $("#modalAlasan");
        modal.find('.modal-title').text('Edit Data Alasan');
        modal.modal();
        $.ajax({
          type: "POST",
          url: '<?php  echo base_url(); ?>alasan/data_detail',
          data:{
            id:id
          },
          dataType:'json',
          success: function(data) {
            $.each(data.hasildata,function(i,v){
              $('#id').val(v.id);
              $('#judul').val(v.judul);
              $('#deskripsi').val(v.deskripsi);
            });
          }
        });
      }
       function updateKontak(id_call) {
        $('#id_call').val(id_call);
        var modal = $("#modalCall");
        modal.find('.modal-title').text('Edit Data Alasan');
        modal.modal();
        $.ajax({
          type: "POST",
          url: '<?php  echo base_url(); ?>call/data_detail',
          data:{
            id_call:id_call
          },
          dataType:'json',
          success: function(data) {
            $.each(data.hasildata,function(i,v){
              $('#id_call').val(v.id);
              $('#kontak').val(v.kontak);
            });
          }
        });
      }
  </script>
</body>

</html>