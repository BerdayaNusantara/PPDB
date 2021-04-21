<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      PPDB<br>
      <span class="brand-text font-weight-light">SMK Muhammadiyah 2 Cepu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item ">
            <a href="<?php echo base_url();?>unit" class="nav-link <?php if($page=="Dashboard"){ echo "active" ;}?> ">
              <i class="nav-icon fas fa-chart-line"></i>
              <p> Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url();?>unit/siswa" class="nav-link   <?php if($page=="Calon Santri"){ echo "active" ;}?> ">
              <i class="nav-icon fas fa-user-tie"></i>
              <p> Master Calon Siswa</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url();?>unit/pembayaran" class="nav-link   <?php if($page=="Data Pembayaran"){ echo "active" ;}?> ">
              <i class="nav-icon fas fa-money-bill-wave"></i>
              <p> Daftar Pembayaran</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url();?>unit/pengumuman" class="nav-link   <?php if($page=="Pengumuman"){ echo "active" ;}?> ">
              <i class="nav-icon fas fa-file-audio"></i>
              <p> Pengumuman Lulus</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url();?>unit/kelas" class="nav-link   <?php if($page=="Kelas"){ echo "active" ;}?> ">
              <i class="nav-icon fas fa-school"></i>
              <p> Kelas Siswa</p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if(($page=="Report")||($page=="Report Jurusan")||($page=="Report Pembayaran")||($page=="Report Lulus")||($page=="Report Belum Pilih Jadwal")){ echo "menu-open" ;}?>">
            <a href="#" class="nav-link <?php if(($page=="Report")||($page=="Report Jurusan")||($page=="Report Pembayaran")||($page=="Report Lulus")||($page=="Report Belum Pilih Jadwal")){ echo "active" ;}?>">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>unit/report" class="nav-link <?php if($page=="Report"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>unit/report_bayar" class="nav-link <?php if($page=="Report Pembayaran"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report Pembayaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>unit/report_lulus" class="nav-link <?php if($page=="Report Lulus"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report Kelulusan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url();?>backoffice/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p> Keluar</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>