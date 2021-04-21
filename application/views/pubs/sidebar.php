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
            <a href="<?php echo base_url();?>backoffice" class="nav-link <?php if($page=="Dashboard"){ echo "active" ;}?> ">
              <i class="nav-icon fas fa-chart-line"></i>
              <p> Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url();?>backoffice/user" class="nav-link  <?php if($page=="User"){ echo "active" ;}?> ">
              <i class="nav-icon fas fa-users"></i>
              <p> Master User</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url();?>backoffice/siswa" class="nav-link   <?php if($page=="Calon Santri"){ echo "active" ;}?> ">
              <i class="nav-icon fas fa-user-tie"></i>
              <p> Master Calon Siswa</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url();?>backoffice/pembayaran" class="nav-link   <?php if($page=="Data Pembayaran"){ echo "active" ;}?> ">
              <i class="nav-icon fas fa-money-bill-wave"></i>
              <p> Daftar Pembayaran</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url();?>backoffice/jadwal" class="nav-link   <?php if($page=="Jadwal Ujian"){ echo "active" ;}?> ">
              <i class="nav-icon fas fa-calendar-day"></i>
              <p> Jadwal Ujian</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url();?>backoffice/pengumuman" class="nav-link   <?php if($page=="Pengumuman"){ echo "active" ;}?> ">
              <i class="nav-icon fas fa-file-audio"></i>
              <p> Pengumuman Lulus</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url();?>backoffice/kelas" class="nav-link   <?php if($page=="Kelas"){ echo "active" ;}?> ">
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
                <a href="<?php echo base_url();?>backoffice/report" class="nav-link <?php if($page=="Report"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report Semua Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/report_jurusan" class="nav-link <?php if($page=="Report Jurusan"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report per Jurusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/report_bayar" class="nav-link <?php if($page=="Report Pembayaran"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report Pembayaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/report_lulus" class="nav-link <?php if($page=="Report Lulus"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report Kelulusan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if(($page=="Pengaturan Jenjang")||($page=="Pengaturan Biaya")||($page=="Pengaturan Sistem")||($page=="Pengaturan Buka PPDB")||($page=="Master Kelas")||($page=="Tahun Akademik")||($page=="Pengaturan Nomor Peserta")){ echo "menu-open" ;}?>">
            <a href="#" class="nav-link <?php if(($page=="Pengaturan Jenjang")||($page=="Pengaturan Biaya")||($page=="Pengaturan Sistem")||($page=="Pengaturan Buka PPDB")||($page=="Master Kelas")||($page=="Tahun Akademik")||($page=="Pengaturan Nomor Peserta")){ echo "active" ;}?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Pengaturan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/settahun" class="nav-link  <?php if($page=="Tahun Akademik"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tahun Akademik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/setjenjang" class="nav-link  <?php if($page=="Pengaturan Jenjang"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengaturan Jenjang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/setkelas" class="nav-link  <?php if($page=="Master Kelas"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/setprice" class="nav-link  <?php if($page=="Pengaturan Biaya"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengaturan Biaya</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/setopenppdb" class="nav-link <?php if($page=="Pengaturan Buka PPDB"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengaturan Buka PPDB</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/setsistem" class="nav-link <?php if($page=="Pengaturan Sistem"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengaturan Sistem</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/setnomor" class="nav-link <?php if($page=="Pengaturan Nomor Peserta"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengaturan Nomor Peserta</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if(($page=="Syarat Administrasi")||($page=="Jadwal Pendaftaran")||($page=="Alur Pendaftaran")||($page=="Biaya Pendidikan")||($page=="Keringanan Biaya")||($page=="Kontak Pendaftaran")||($page=="Profil Sekolah")){ echo "menu-open" ;}?>">
            <a href="#" class="nav-link <?php if(($page=="Syarat Administrasi")||($page=="Jadwal Pendaftaran")||($page=="Alur Pendaftaran")||($page=="Biaya Pendidikan")||($page=="Keringanan Biaya")||($page=="Kontak Pendaftaran")||($page=="Profil Sekolah")){ echo "active" ;}?>">
              <i class="nav-icon fas fa-tv"></i>
              <p>
                Pengaturan Konten
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/setprofil" class="nav-link  <?php if($page=="Profil Sekolah"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil Sekolah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/syarat_administrasi" class="nav-link  <?php if($page=="Syarat Administrasi"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Syarat Administrasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/jadwal_daftar" class="nav-link <?php if($page=="Jadwal Pendaftaran"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jadwal Pendaftaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/alur_daftar" class="nav-link <?php if($page=="Alur Pendaftaran"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alur Pendaftaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/biaya_pendidikan" class="nav-link <?php if($page=="Biaya Pendidikan"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Biaya Pendidikan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/keringanan_biaya" class="nav-link <?php if($page=="Keringanan Biaya"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Keringanan Biaya</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>backoffice/kontak_daftar" class="nav-link <?php if($page=="Kontak Pendaftaran"){ echo "active" ;}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kontak Pendaftaran</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url();?>backup" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p> Backup Database</p>
            </a>
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