
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>asset/image/logo.png"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li <?php if($page=="Beranda"){ ?> class="active" <?php } ?>><a href="https://www.ppdb.alfityanbogor.sch.id/">Home</a></li>
          <li><a href="https://www.ppdb.alfityanbogor.sch.id/category/info-psb/">Informasi Pendaftaran</a></li>
          <li><a href="https://www.ppdb.alfityanbogor.sch.id/category/seleksi/">Jalur Seleksi</a></li>
          <li class="drop-down"><a href="">Download Brosur</a>
            <ul>
              <li><a href="https://www.ppdb.alfityanbogor.sch.id/wp-content/uploads/2020/12/PAUDIT.pdf">Brosur PAUDIT</a></li>
              <li><a href="https://www.ppdb.alfityanbogor.sch.id/wp-content/uploads/2020/12/SDIT.pdfhttps:/www.ppdb.alfityanbogor.sch.id/wp-content/uploads/2020/12/SDIT.pdf">Brosur SDIT</a></li>
              <li><a href="https://www.ppdb.alfityanbogor.sch.id/wp-content/uploads/2020/12/SMPIT.pdf">Brosur SMPIT</a></li>
            </ul>
          </li>
          <li><a href="https://www.ppdb.alfityanbogor.sch.id/category/info-unit/">Info Unit</a></li>
        </ul>
      </nav><!-- .nav-menu -->

      <a href="<?php echo base_url();?>home/daftar" class="get-started-btn scrollto">Daftar</a>

    </div>
  </header><!-- End Header -->