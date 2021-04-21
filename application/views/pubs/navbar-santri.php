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
          <i class="far fa-user">
            <?php  
              $id_santri = $this->session->userdata("iduniq");
              $data_santri = $this->m_siswa->listing(" WHERE id_uniq = '$id_santri'");
              foreach($data_santri as $d)
              {
                echo $d->nama;
              }
            ?>
          </i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?php echo base_url();?>siswa/profil_akun" class="dropdown-item">
            <i class="fas fa-user-cog mr-2"></i> Profil Akun
          </a>
        </div>
      </li>
  </ul>
</nav>