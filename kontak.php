<?php
session_start();
if($_SESSION == null){
	$_SESSION['login'] = FALSE;
}
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

    <link rel="stylesheet" href="css/Kontakstyle.css" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
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
						<li><a href="about.php">Tentang</a></li>
						<li class="active"><a href="kontak.php">Kontak</a></li>
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

	<!-- START section -->
  <div class="kontainer" id="next">
    <div class="form">
      <div class="kontak-info">
        <h3 class="title">Hotelin</h3>
        <p class="text">
          berikan komentar mu disini
        </p>

        <div class="info">
          <div class="informasi">
            <img src="images/location.png" class="icon" alt="" />
            <p>Jalan Maju Mundur No.33, Yogyakarta, 10016</p>
          </div>
          <div class="informasi">
            <img src="images/email.png" class="icon" alt="" />
            <p>info@hotelin.com</p>
          </div>
          <div class="informasi">
            <img src="images/phone.png" class="icon" alt="" />
            <p>(+021) 435 3533</p>
          </div>
        </div>

        <div class="sosmed">
          <p>Kunjungi Kami :</p>
          <div class="sosmed-ikon">
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="contact-form">
        <span class="circle one"></span>
        <span class="circle two"></span>
		<span class="circle one"></span>
        <span class="circle"></span>

        <form action="index.html" autocomplete="off">
          <h3 class="title">Hubungi Kami</h3>
          <div class="masukan-container">
            <input type="text" name="name" class="input" />
            <label for="">Nama Pengguna</label>
            <span>Nama Pengguna</span>
          </div>
          <div class="masukan-container">
            <input type="email" name="email" class="input" />
            <label for="">Email</label>
            <span>Email</span>
          </div>
          <div class="masukan-container">
            <input type="tel" name="phone" class="input" />
            <label for="">Telepon</label>
            <span>Telepon</span>
          </div>
          <div class="masukan-container textarea">
            <textarea name="message" class="input"></textarea>
            <label for="">Pesan</label>
            <span>Pesan</span>
          </div>
          <input type="submit" value="Kirim" class="btn_kontak" />
        </form>
      </div>
    </div>
  </div>

  <script src="app.js"></script>
	<!-- END section -->

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
    <script src="js/app.js"></script>
  </body>
</html>