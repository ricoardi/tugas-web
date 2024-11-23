<!-- php -S localhost:8000  -->
<!DOCTYPE html>
<?php
  include 'koneksi_login.php';

    $query = "SELECT * FROM `tb_klasifikasi`";
    $result = mysqli_query($koneksi, $query);

    $kategori = mysqli_query($koneksi, "SELECT * FROM `tb_kategori`");

?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Ayo Lapor</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="logounpra.png" rel="icon">
  <link href="logounpra.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/landingpage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/landingpage/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/landingpage/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/landingpage/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/landingpage/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/landingpage/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Rapid
  * Template URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="logounpra.png" alt="">
        <h1 class="sitename">Ayo Lapor</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <img src="assets/landingpage/assets/img/template/Rapid/hero-bg.jpg" class="hero-bg" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-lg-last hero-img">
            <img src="assets/landingpage/img/hero-img.svg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1>Jadilah Mahasiswa Yang <span>KRITIS !</span></h1>
            <p>Ayo berikan laporan dan aspirasi anda sebagai mahasiswa untuk memajukan Universitas Prabumulih</p>
            <div class="d-flex">
              <a href="#contact" class="btn-get-started">Ayo Lapor !</a>
              <!-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->


    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Pengaduan</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-4 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p>Aspirasi</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-4 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p>Permintaan Informasi</p>
            </div>
          </div><!-- End Stats Item -->

          <!-- <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
              <p>Workers</p>
            </div>
          </div> -->
          <!-- End Stats Item -->

        </div>

      </div>

    </section>
    <!-- /Stats Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

      <div class="container">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Universitas Prabumulih</h3>
            
            <p>Selamat datang di Universitas Prabumulih (UNPRA), tempat Anda dapat mulai membuat perubahan nyata. Sebagai satu-satunya universitas di Prabumulih, Universitas Prabumulih berupaya untuk memfasilitasi generasi muda dari seluruh penjuru negeri dan dunia untuk mengembangkan diri dan memaksimalkan potensi yang dimiliki.</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
          <img src="assets/logounpra.png" class="img-fluid cta-btn align-middle" alt="">
            <!-- <a class="cta-btn align-middle" href="#">Call To Action</a> -->
          </div>
        </div>

      </div>

    </section><!-- /Call To Action Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Form Laporan</h2>
        <p>Sampaikan Laporan Anda</p>
      </div><!-- End Section Title -->

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-12">
            <form action="kirim_laporan.php" method="POST" enctype="multipart/form-data" class="php-form" data-aos="fade-up" data-aos-delay="500">
              <div class="row gy-4">

                <div class="col-md-12">
                  <select name="id_klasifikasi" class="form-control" required>
                  <option value="">Pilih Klasifikasi Laporan</option> 
                  <?php 
                    while ($data = mysqli_fetch_array(
                          $result,MYSQLI_ASSOC)):; 
                  ?>
                  <option value="<?php echo $data["id_klasifikasi"];?>">
                  <?php echo $data["nama_klasifikasi"];
                  ?>
                  </option>
                  <?php 
                    endwhile; 
                  ?>
                  </select>
                </div>

                <div class="col-md-12 ">
                  <input type="judul_laporan" class="form-control" name="judul_laporan" placeholder="Masukkan Judul Laporan Anda" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="isi_laporan" rows="6" placeholder="Masukkan Isi Laporan Anda" required=""></textarea>
                </div>

                <div class="col-md-12">
                  <select name="id_kategori" class="form-control" required>
                  <option value="">Pilih Kategori Laporan</option> 
                  <?php 
                    while ($dataa = mysqli_fetch_array(
                          $kategori,MYSQLI_ASSOC)):; 
                  ?>
                  <option value="<?php echo $dataa["id_kategori"];?>">
                  <?php echo $dataa["nama_kategori"];
                  ?>
                  </option>
                  <?php 
                    endwhile; 
                  ?>
                  </select>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Masukkan Email Anda" required="">
                </div>

                <div class="col-md-6">
                  <input type="text" class="form-control" name="no_whatsapp" placeholder="Masukkan Nomor Whatsapp" required="">
                </div>

                <div class="col-md-6 ">
                  <p>Tanggal Kejadian</p>
                  <input type="date" class="form-control" name="tanggal_kejadian" required="">
                </div>

                <div class="col-md-6">
                  <p>File Pendukung</p>
                  <input type="file" class="form-control" name="file_pendukung" placeholder="Masukkan File Pendukung" required="" accept="image/*,.pdf,.doc,docx">
                </div>

                <div class="col-md-12 text-center">
                  <!-- <div class="loading">Loading</div> -->
                  <!-- <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div> -->

                  <button type="submit">Kirim</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer light-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-4 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Alamat</h4>
            <p>Jalan Patra No. 50, Sukaraja Kecamatan Prabumulih Selatan,</p>
            <p>Kota Prabumulih, Sumatera Selatan, 31111</p>
            <p></p>
          </div>

        </div>

        <!-- <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> <span>+1 5589 55488 55</span><br>
              <strong>Email:</strong> <span>info@example.com</span><br>
            </p>
          </div>
        </div> -->

        <div class="col-lg-4 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Jam Pelayanan</h4>
            <p>
              <strong>Senin - Jumat:</strong> <span>07:00 - 16:30</span><br>
              <strong>Sabtu - Minggu</strong>: <span>Tutup</span>
            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <!-- <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a> -->
            <!-- <a href="#" class="facebook"><i class="bi bi-facebook"></i></a> -->
            <a href="https://www.instagram.com/universitas_prabumulih/" class="instagram"><i class="bi bi-instagram"></i></a>
            <!-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> -->
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Rapid</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/landingpage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/landingpage/vendor/php-email-form/validate.js"></script>
  <script src="assets/landingpage/vendor/aos/aos.js"></script>
  <script src="assets/landingpage/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/landingpage/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/landingpage/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/landingpage/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/landingpage/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/landingpage/js/main.js"></script>

</body>

</html>
