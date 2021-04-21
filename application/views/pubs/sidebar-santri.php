<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>siswa" class="brand-link">
      PPDB<br>
      <span class="brand-text font-weight-light">SMK Muhammadiyah 2 Cepu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item ">
            <a href="<?php echo base_url();?>siswa" class="nav-link <?php if($page=="Dashboard"){ echo "active" ;}?> ">
              <i class="nav-icon fas fa-chart-line"></i>
              <p> Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url();?>siswa/pembayaran" class="nav-link  <?php if($page=="Pembayaran"){ echo "active" ;}?> ">
              <i class="nav-icon fas fa-money-bill-wave"></i>
              <p> Pembayaran</p>
            </a>
          </li>
          <li class="nav-item ">
            <?php if(($status_bayar=="")||($status_bayar=="pending")){?>
            <a class="nav-link" href="#" onclick="konfirmBayar()">
            <?php }else{?>
            <a href="<?php echo base_url();?>siswa/profile" class="nav-link   <?php if($page=="Profile Santri"){ echo "active" ;}?> ">
            <?php } ?>
              <i class="nav-icon fas fa-user"></i>
              <p> Profile Siswa</p>
            </a>
          </li>
          <li class="nav-item ">
            <?php if(($status_bayar=="")||($status_bayar=="pending")){?>
            <a class="nav-link" href="#" onclick="konfirmBayar()">
            <?php }else{?>
            <a href="<?php echo base_url();?>siswa/orangtua" class="nav-link   <?php if($page=="Orang Tua"){ echo "active" ;}?> ">
            <?php } ?>
              <i class="nav-icon fas fa-users"></i>
              <p> Data Orang Tua</p>
            </a>
          </li>
          <li class="nav-item ">
            <?php if(($status_bayar=="")||($status_bayar=="pending")){?>
            <a class="nav-link" href="#" onclick="konfirmBayar()">
            <?php }else{?>
            <a href="<?php echo base_url();?>siswa/prestasi" class="nav-link   <?php if($page=="Prestasi Santri"){ echo "active" ;}?> ">
            <?php } ?>
              <i class="nav-icon fas fa-award"></i>
              <p> Daftar Prestasi</p>
            </a>
          </li>
          <li class="nav-item ">
            <?php if(($status_bayar=="")||($status_bayar=="pending")){?>
            <a class="nav-link" href="#" onclick="konfirmBayar()">
            <?php }else{?>
            <a href="<?php echo base_url();?>siswa/dokumen" class="nav-link   <?php if($page=="Dokumen"){ echo "active" ;}?> ">
            <?php } ?>
              <i class="nav-icon fas fa-file-invoice"></i>
              <p> Dokumen Siswa</p>
            </a>
          </li>
          <li class="nav-item ">
            <?php if(($status_bayar=="")||($status_bayar=="pending")){?>
            <a class="nav-link" href="#" onclick="konfirmBayar()">
            <?php }else{?>
            <a href="<?php echo base_url();?>siswa/jadwal_ujian" class="nav-link   <?php if($page=="Jadwal Ujian"){ echo "active" ;}?> ">
            <?php } ?>
              <i class="nav-icon fas fa-calendar-day"></i>
              <p> Jadwal Ujian</p>
            </a>
          </li>
          <li class="nav-item ">
            <?php if(($status_bayar=="")||($status_bayar=="pending")){?>
            <a class="nav-link" href="#" onclick="konfirmBayar()">
            <?php }else{?>
            <a href="<?php echo base_url();?>siswa/cetak_kartu" class="nav-link   <?php if($page=="Cetak Kartu"){ echo "active" ;}?> ">
            <?php } ?>
              <i class="nav-icon fas fa-print"></i>
              <p> Cetak Kartu</p>
            </a>
          </li>
          <li class="nav-item ">
            <?php if(($status_bayar=="")||($status_bayar=="pending")){?>
            <a class="nav-link" href="#" onclick="konfirmBayar()">
            <?php }else{?>
            <a href="<?php echo base_url();?>siswa/pengumuman" class="nav-link   <?php if($page=="Pengumuman"){ echo "active" ;}?> ">
            <?php } ?>
              <i class="nav-icon fas fa-file-audio"></i>
              <p> Pengumuman Ujian</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url();?>siswa/logout" class="nav-link">
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