<!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3><?php echo $instansi;?></h3>
            <?php foreach ($kontak as $k) {?>
            <p>
              <?php echo $k->alamat;?><br>
              <strong>Phone:</strong> <?php echo $k->kontak;?><br>
              <strong>Email:</strong> <?php echo $k->email;?><br>
            </p>
            <?php } ?>
          </div>
           <div class="col-lg-4 col-md-6 footer-newsletter">
           
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Lebih kenal dengan kami</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Website Utama</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Berita</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sejarah</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Struktur Oraganisasi</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Unit Pendidikan</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">TKIT</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">SDIT</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">SMPIT</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">SMAIT</a></li>
            </ul>
          </div>

         

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span><?php echo $instansi;?></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bikin-free-simple-landing-page-template/ -->
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->