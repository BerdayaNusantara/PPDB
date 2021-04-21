<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"> <?php echo $nama_akun;?></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php
          $level = $this->session->userdata("level");
          if($level=="Jenjang"){?>
          <a href="<?php echo base_url();?>unit/profil_akun" class="dropdown-item">
            <i class="fas fa-user-cog mr-2"></i> Profil Akun
          </a>
          <?php }else{ ?>
          <a href="<?php echo base_url();?>backoffice/profil_akun" class="dropdown-item">
            <i class="fas fa-user-cog mr-2"></i> Profil Akun
          </a>
          <?php } ?>
        </div>
      </li>
  </ul>
</nav>