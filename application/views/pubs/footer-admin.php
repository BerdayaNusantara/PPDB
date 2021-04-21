          <div class="modal fade" id="modalHapusData">
            <div class="modal-dialog">
              <div class="modal-content">          
                <!-- Modal Header -->
                <form action=""  enctype="multipart/form-data" method="POST" class="form-horizontal"  role="form">
                <div class="modal-header">
                  <h4 class="modal-title">Hapus Data</h4>
                  <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                  <input type="hidden" name="id_data_hapus" id="id_data_hapus">
                  <h5>Apakah anda yakin akan menghapus data?</h5>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                  <button type="button" class="btn btn-success btn-sm" onclick="hapusData()">Hapus</button>
                </div>
                  </form>
              </div>
            </div>
          </div>
          <div class="modal fade" id="modalKonfirmBayar">
            <div class="modal-dialog">
              <div class="modal-content">          
                <!-- Modal Header -->
                <form action=""  enctype="multipart/form-data" method="POST" class="form-horizontal"  role="form">
                <div class="modal-header">
                  <h4 class="modal-title">Informasi</h4>
                  <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                  
                  <h5>Menu ini masih di kunci, lakukan pembayaran untuk membuka menu</h5>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                </div>
                  </form>
              </div>
            </div>
          </div>
          <div class="modal fade" id="modalHapusDataSecond">
            <div class="modal-dialog">
              <div class="modal-content">          
                <!-- Modal Header -->
                <form action=""  enctype="multipart/form-data" id="formJabatan" method="POST" class="form-horizontal"  role="form">
                <div class="modal-header">
                  <h4 class="modal-title">Hapus Data</h4>
                  <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                  <input type="hidden" name="id_data_hapus_second" id="id_data_hapus_second">
                  <h5>Apakah anda yakin akan menghapus data?</h5>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                  <button type="button" class="btn btn-success btn-sm" onclick="hapusDataSecond()">Hapus</button>
                </div>
                  </form>
              </div>
            </div>
          </div>
          <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="http://smkmuhammadiyah2cepu.sch.id">SMK Muhammadiayah 2 Cepu</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
              <b>Version</b> 1.0
            </div>
          </footer>