<?php
session_start();
include 'conn.php';

$connect = mysqli_connect($host, $user, $passwd, $db);
?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hotelin.com | Tempat Cari Hotel Murah dan Nyaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">
    <link rel="icon" type="image/png" sizes="32x32" href="src/images/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="src/images/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="src/styles/style.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/aboutstyle.css"
  </head>
  <body>
    
    <header class="site-header js-site-header">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="index.php"><img src="src/images/logo.svg" alt="" class="sitet-logo"></a></div>
          <div class="col-6 col-lg-8">


            <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->

            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6 mx-auto">
                      <ul class="list-unstyled menu">
                        <li><a href="index.php">Home</a></li>
						<li class="active"><a href="about.php">Tentang</a></li>
						<li><a href="kontak.php">Kontak</a></li>
						<?php
						if($_SESSION['login'] == FALSE){
							echo '
							<li><a href="login.php">Sign In</a></li>';
						}else if($_SESSION['login'] == TRUE && $_SESSION['pangkat'] == 0){
							echo '
							<li><a href="view_order.php">View Order</a></li>
							<li><a href="akun.php">Akun</a></li>
							<li><a href="logout.php">Sign Out</a></li>';
						}else if($_SESSION['login'] = TRUE && $_SESSION['pangkat'] == 1){
							echo '
							<li><a href="admin/index.php">Halaman Admin</a></li>
							<li><a href="akun.php">Akun</a></li>
							<li><a href="logout.php">Sign Out</a></li>';
						}
						?>
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END head -->

    <section class="site-hero overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h2 style="color: white;">Tempat Cari Hotel Murah dan Nyaman</h2>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- END section -->
    <div class="bg">
      <div class="about_section" id="next">
        <h1 class="about_taital">Tentang</h1>
          <div class="lorem_text">
             <p> Hotelin.Com adalah hotel yang tepat buat kamu yang menginginkan penginapan dengan kualitas pelayanan oke dan harga yang ramah di kantong. Meskipun murah, hotel ini menyediakan fasilitas yang memadai dan selalu menjaga mutu pelayanannya.
              
              Hotelin.com menyediakan berbagai macam fasilitas, seperti free wifi, AC, TV, lift, hingga spa, restoran, kolam renang dan juga kafe. Hotelin.com menyediakan fasilitas kolam renang outdoor dengan nuansa yang asyik untuk berenang dan seru seruan. Hotel ini cocok buat kalian para Traveler atau keluarga yang menginkan penginapan dekat dengan pusat kota. 
              
              kamu yang ingin liburan bersama keluarga,teman,atau sendiri dan mencari tempat menginap, Hotelin.com adalah solusi terbaiknya. Dengan pemesanan yang mudah melalui website Hotelin.com kamu dapat langsung chek-in tanpa ribet
              </p>
              <h4>Metode Pembayaran.</h4>
            <p>Hotelin.com telah menyediakan berbagai metode pembayaran yang mudah diakses, termasuk menyediakan opsi Pay at Hotel dan booking hotel tanpa kartu kredit. Metode pembayaran tersebut yang paling banyak diminati, Jadi tinggal pesan melalui www.hotelin.com dan memilih hotel yang inginkan kamu akan langsung bisa chek-in dan membayar dihotel yang kamu pilih. Kemudahan ini tentu menjawab keinginan Anda bertransaksi lebih efektif dan efisien.</p>
            <h4>Info Promo.</h4>
           <p>Menariknya, Hotelin.com selalu memberikan banyak promo hotel murah yang rutin ditawarkan setiap bulannya, mulai dari potongan harga, harga spesial, hingga promo cicilan bunga 0%. Informasi seputar promo juga mudah didapatkan langsung dari situs web atau aplikasi Hotelin.com.</p>
           <h4>Cara Pesan Hotel di Hotelin.com</h4>
            <p>Bagaimana Cara Pesan Hotel di Hotelin.com?
            Pesan hotel online dengan cepat dan mudah di Hotelin.Com. Tersedia pula fitur Filter untuk mempercepat proses booking hotel murah Anda.
          
            Cara booking hotel di Hotelin.com adalah:
            <br>
            1. masuk ke halaman awal situs web Hotelin.com<br>
            2. ke menu katalok kamar<br>
            3. Pilih Kamar yang di inginkan<br>
            4. Bila dinilai sudah sesuai, Anda tinggal melakukan tahap pembayaran dan pembayaran dapat di lakukan saat ada sudah berada di hotel
            </p>
            <h4>Reting Hotelin.com </h4>
            <p>Hotelin.com sebagai situs booking hotel terpercaya telah menyediakan informasi kondisi hotel secara lengkap, termasuk fasilitas, lokasi, foto, dari review tamu-tamu sebelumnya. Namun, jika ingin pesan hotel murah lagi, masukkan kupon promo hotel murah yang masih berlaku. 
            </p>
            <h4>Fasilitas</h4>
            <p>Hotel di Hotelin.com memiliki standar pelayanan dan fasilitas untuk kepentingan komersial. Fasilitas yang disediakan oleh hotel dapat mendukung aktivitas tamu ketika menginap, seperti makanan, pelayanan kamar, kolam renang, gym, ruang meeting, dan sebagainya. Hotel juga memiliki puluhan hingga ratusan staf untuk melayani tamu. Booking hotel di Hotelin.com harga murah, mulai dari Rp 50.000,-.
            </p>
            <p> menunggu lama, cari hotel murah sekarang di Hotelin.com. Sistemnya yang praktis, responsif, dan aman membuat situs booking hotel ini cocok diandalkan setiap waktu
            </p>
          </div>
      </div> 
    </div>
    <footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">Tentang</a></li>
              <li><a href="#">Syarat &amp; Ketentuan</a></li>
              <li><a href="#">Kebijakan Pribadi</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">Tentang</a></li>
              <li><a href="#">Kontak</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Lokasi:</span> <span> Jalan Maju Mundur No.33, <br> Yogyakarta, 10016</span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Telepon/Fax:</span> <span> (+021) 435 3533</span></p>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> info@hotelin.com</span></p>
          </div>
          <div class="col-md-3 mb-5">
            <p>Dapatkan berita update tentang kami.</p>
            <form action="#" class="footer-newsletter">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email...">
                <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5">
          <p class="col-md-6 text-left">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with &hearts; by <br><a href="#">Hotelin.com</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
            
          <p class="col-md-6 text-right social">
            <a href="#"><span class="fa fa-tripadvisor"></span></a>
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
            <a href="#"><span class="fa fa-linkedin"></span></a>
            <a href="#"><span class="fa fa-vimeo"></span></a>
          </p>
        </div>
      </div>
    </footer>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    
    
    <script src="js/aos.js"></script>
    
    <script src="js/bootstrap-datepicker.js"></script> 
    <script src="js/jquery.timepicker.min.js"></script> 

    

    <script src="js/main.js"></script>
  </body>
</html>