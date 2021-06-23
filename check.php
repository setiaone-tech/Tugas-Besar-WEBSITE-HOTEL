<?php
include 'conn.php';

$connect = mysqli_connect($host, $user, $passwd, $db);

session_start();
if($_SESSION['login'] != TRUE){
	header('Location: login.php');
}else{
	$sql1 = "SELECT * FROM detail_akun WHERE username='".$_SESSION['user']."'";
	$query1 = mysqli_query($connect, $sql1);
	$view1 = mysqli_fetch_assoc($query1);

	if(($view1['nama_lengkap'] == '')||($view1['kontak'] == '')||($view1['alamat'] == '')){
		header('Location: akun.php');
	}
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

    <!-- Slick Slider css -->
    <link rel="stylesheet" type="text/css" href="src/plugins/slick/slick.css">
    <!-- bootstrap-touchspin css -->
    <link rel="stylesheet" type="text/css" href="src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-119386393-1');
    </script>

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
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
	
	<div class="main-container">
		<div class="pd-ltr-20 height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Hasil Pencarian Hotel</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
									<li class="breadcrumb-item"><a href="rooms.php">Kamar</a></li>
									<li class="breadcrumb-item active" aria-current="page">Check</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- START section -->
    <section class="py-5 bg-light"  id="next">
      <div class="container">
		<!-- START YOUR CODE -->
    <div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
          <?php
		  if(isset($_POST['check'])){
					$id = $_POST['check'];
														
					$query = mysqli_query($connect, "SELECT * FROM tb_hotel WHERE id='$id'");
					$view = mysqli_fetch_assoc($query);
		  ?>
          <div class="product-wrap">
            <div class="product-detail-wrap mb-30">
              <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="product-slider slider-arrow">
                    <?php
					for($j=0;$j<=5;$j++){
					?>
                    <div class="product-slide">
                      <img src="<?php echo $view['link_gambar']; ?>" alt="">
                    </div>
					<?php
					}
					?>
                  </div>
				  <div class="product-slider-nav">
					<?php
					for($i=0;$i<=5;$i++){
					?>
                    <div class="product-slide-nav">
                      <img src="<?php echo $view['link_gambar']; ?>" alt="">
                    </div>
					<?php
					}
					?>
                  </div>
				</div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="product-detail-desc pd-20 card-box height-100-p">
                    <h4 class="mb-20 pt-20"><?php echo $view["nama"]; ?> | <?php echo $view["lokasi"]; ?></h4>
                    <p><?php echo $view["ket"]; ?></p>
                    
                    <div class="price">
                      <del style="font-size: 20pt;">Rp. <?php echo $view["harga"]; ?></del><ins style="font-size: 20pt;">Rp. <?php echo $view["harga_akhir"]; ?></ins>
                    </div>
                    <div class="text-muted" style="font-size: 10pt;">per kamar, per malam</div>
                    <div class="info">
                          <i class="icon-copy ion-person"></i>
                        <span>Maks. <?php echo $view["adult"]; ?> orang dewasa dan <?php echo $view["child"]; ?> anak-anak</span>
                        </div>
                        <div class="info">
                        <span class="text-muted">
                        <del><i class="icon-copy ion-coffee"></i></del>
                        Tidak termasuk sarapan
                        </span>
                        </div>
                        <div class="info">
                        <span>
                            <i class="icon-copy ion-wifi"></i>
                        Termasuk koneksi wi-fi gratis
                        </span>
                        </div>
					<form action="order.php" method="POST">
                    <button class="btn btn-outline-primary" name="order" value="<?php echo $id; ?>" type="submit">Pesan Sekarang</button>
					</form>
                    <div class="text-muted" style="font-size: 10pt;">Sudah Termasuk Pajak</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php
}
else if(empty($_POST['check'])){
?>
		<div class="product-wrap">
            <div class="product-detail-wrap mb-30">
              <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="product-detail-desc pd-20 card-box height-100-p">
                    <div class="info">
                        Data tidak ditemukan.
					</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php
}
?>
		</div>
		<!-- END YOUR CODE -->
      </div>
    </section>
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
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <!-- Slick Slider js -->
    <script src="src/plugins/slick/slick.min.js"></script>
    <!-- bootstrap-touchspin js -->
    <script src="src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
    <script>
      jQuery(document).ready(function() {
        jQuery('.product-slider').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          infinite: true,
          speed: 1000,
          fade: true,
          asNavFor: '.product-slider-nav'
        });
        jQuery('.product-slider-nav').slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          asNavFor: '.product-slider',
          dots: false,
          infinite: true,
          arrows: false,
          speed: 1000,
          centerMode: true,
          focusOnSelect: true
        });
        $("input[name='demo3_22']").TouchSpin({
          initval: 1
        });
      });
    </script>
  </body>
</html>