    <div class="sidebar" data-color="green" data-background-color="white" data-image="<?php echo base_url();?>asset/theme/assets/img/sidebar-5.png">
      <div class="logo"><a href="<?php echo base_url();?>backoffice" class="simple-text logo-normal">
          <?php echo $nama_app;?>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php if($page=="Dashboard"){ echo "active" ;}?>  ">
            <a class="nav-link" href="<?php echo base_url();?>backoffice">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?php if($page=="Calon Santri"){ echo "active" ;}?>">
            <a class="nav-link" href="<?php echo base_url();?>unit/santri">
              <i class="material-icons">supervised_user_circle</i>
              <p>Master Calon Santri</p>
            </a>
          </li>
          <li class="nav-item <?php if($page=="Data Pembayaran"){ echo "active" ;}?> ">
            <a class="nav-link" href="<?php echo base_url();?>unit/pembayaran">
              <i class="material-icons">payment</i>
              <p>Daftar Pembayaran</p>
            </a>
          </li>
          <li class="nav-item <?php if($page=="Jadwal Ujian"){ echo "active" ;}?>">
            <a class="nav-link" href="<?php echo base_url();?>unit/jadwal">
              <i class="material-icons">notification_important</i>
              <p>Jadwal Ujian</p>
            </a>
          </li>
          <li class="nav-item <?php if($page=="Pengumuman"){ echo "active" ;}?>">
            <a class="nav-link" href="<?php echo base_url();?>unit/pengumuman">
              <i class="material-icons">mark_email_read</i>
              <p>Pengumuman Lulus</p>
            </a>
          </li>
          <li class="nav-item  <?php if($page=="Report"){ echo "active" ;}?>">
            <a class="nav-link" href="<?php echo base_url();?>unit/report">
              <i class="material-icons">library_books</i>
              <p>Report</p>
            </a>
          </li>
        </ul>
      </div>
    </div>