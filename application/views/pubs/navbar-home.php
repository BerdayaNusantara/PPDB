    <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="<?php if($page=="Beranda"){ echo "active"; }?>" href="<?php echo base_url();?>home">Beranda</a></li>
          <li><a class="<?php if($page=="Alur"){ echo "active"; }?>" href="<?php echo base_url();?>alur">Alur</a></li>
          <li><a class="<?php if($page=="Biaya"){ echo "active"; }?>" href="<?php echo base_url();?>biaya">Biaya</a></li>
          <li><a class="<?php if($page=="Daftar"){ echo "active"; }?>" href="<?php echo base_url();?>daftar">Daftar</a></li>
          <li><a class="<?php if($page=="Kontak"){ echo "active"; }?>" href="<?php echo base_url();?>kontak">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
        
    <?php 
        $logged = $this->session->userdata("logged_in");
        $level = $this->session->userdata("level");
        if(($logged=="yes")&&($level=="Santri")){?>
      <a href="<?php echo base_url();?>loginsiswa" class="get-started-btn">Member Area</a>
      <?php }else{?>
      <a href="<?php echo base_url();?>loginsiswa" class="get-started-btn">Login</a>
      <?php }?>