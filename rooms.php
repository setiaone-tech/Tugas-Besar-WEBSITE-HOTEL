<?php
include 'conn.php';
session_start();

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
  </head>
  <body <?php if(isset($_POST['room'])){ echo'onload="onLoad();"';} ?>>
    
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
	
	<section class="section bg-light pb-0" id="next">
      <div class="container">
       
        <div class="row check-availabilty" id="next">
          <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

            <form action="rooms.php" method="POST">
              <div class="row">
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="checkin_date" class="font-weight-bold text-black">Check In</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    <input type="text" name="checkin_date" id="checkin_date" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="checkout_date" class="font-weight-bold text-black">Check Out</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    <input type="text" name="checkout_date" id="checkout_date" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                  <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label for="adults" class="font-weight-bold text-black">Adults</label>
                      <div class="field-icon-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="max_adults" id="adults" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4+</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label for="children" class="font-weight-bold text-black">Children</label>
                      <div class="field-icon-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="max_children" id="children" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4+</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3 align-self-end">
                  <button class="btn btn-primary btn-block text-white" name="room" type="submit">Check Availabilty</button>
                </div>
              </div>
            </form>
          </div>


        </div>
      </div>
    </section>
	
	<!-- START section -->
    <section class="py-5 bg-light">
      <div class="container">
		<!-- START YOUR CODE -->
    <div class="mobile-menu-overlay"></div>

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
									<li class="breadcrumb-item active" aria-current="page">Kamar</li>
								</ol>
								
							</nav>
							
						</div>
					</div>
				</div>
				<div class="blog-wrap">
					<div class="container pd-0">
						<div class="row">
							<div class="col-md-8 col-sm-12">
								<div class="blog-list">
									<ul>
										<?php
										if(isset($_POST['room'])){
											$adult = $_POST['max_adults'];
											$child = $_POST['max_children'];
											$in = $_POST['checkin_date'];
											$out = $_POST['checkout_date'];
											$_SESSION['order_adult'] = $adult;
											$_SESSION['order_child'] = $child;
											$_SESSION['order_checkin'] = $in;
											$_SESSION['order_checkout'] = $out;
											
											$query = mysqli_query($connect, "SELECT * FROM tb_hotel WHERE adult='$adult' OR child='$child'");

											while($view = mysqli_fetch_assoc($query)){
										?>
										<li>
											<div class="row no-gutters">
												<div class="col-lg-4 col-md-12 col-sm-12">
													<div class="blog-img">
														<img src="<?php echo $view["link_gambar"]; ?>" alt="" class="bg_img">
													</div>
												</div>
												<div class="col-lg-8 col-md-12 col-sm-12">
													<div class="blog-caption">
														<h4><a href="#"><?php echo $view["nama"]; ?></a></h4>
														
														<div class="blog-by">
															<p> <?php echo $view["ket"]; ?></p>
															
															<div class="pt-10">
																<h3 class="Harga">Rp. <?php echo $view["harga"]; ?></h3>
																<div class="text-muted" style="font-size: 10pt;">per kamar, per malam</div>
																<div> <?php for($i=0;$i<$view['rating'];$i++){ echo'<i class="fa fa-star"></i>'; } ?></div>
																<form action="check.php" method="POST">
																<button class="btn btn-outline-primary" name="check" value="<?php echo $view["id"]; ?>" type="submit">Pesan Sekarang</button>
																</form>
																<div class="text-muted" style="font-size: 10pt;">Sudah Termasuk Pajak</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<?php
											}
										}else if(isset($_POST['loc'])){
											$loc = $_POST['loc'];
											
											$query = mysqli_query($connect, "SELECT * FROM tb_hotel WHERE lokasi='$loc'");

											while($view = mysqli_fetch_assoc($query)){
										?>
										<li>
											<div class="row no-gutters">
												<div class="col-lg-4 col-md-12 col-sm-12">
													<div class="blog-img">
														<img src="<?php echo $view["link_gambar"]; ?>" alt="" class="bg_img">
													</div>
												</div>
												<div class="col-lg-8 col-md-12 col-sm-12">
													<div class="blog-caption">
														<h4><a href="#"><?php echo $view["nama"]; ?></a></h4>
														
														<div class="blog-by">
															<p> <?php echo $view["ket"]; ?></p>
															
															<div class="pt-10">
																<h3 class="Harga">Rp. <?php echo $view["harga"]; ?></h3>
																<div class="text-muted" style="font-size: 10pt;">per kamar, per malam</div>
																<div> <?php for($i=0;$i<$view['rating'];$i++){ echo'<i class="fa fa-star"></i>'; } ?></div>
																<form action="check.php" method="POST">
																<button class="btn btn-outline-primary" name="check" value="<?php echo $view["id"]; ?>" type="submit">Pesan Sekarang</button>
																</form>
																<div class="text-muted" style="font-size: 10pt;">Sudah Termasuk Pajak</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<?php
											}
										}else{
										?>
										<li>
											<div class="row no-gutters">
												<div class="col-lg-8 col-md-12 col-sm-12">
													<div class="blog-caption">
													Data tidak ditemukan.
													</div>
												</div>
											</div>
										</li>
										<?php
										}
										?>
									</ul>
								</div>
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
	<script>
	var check_in = "<?php echo $in; ?>";
	var check_out = "<?php echo $out; ?>";
	var adult = "<?php echo $adult; ?>";
	var child = "<?php echo $child; ?>";
	function onLoad(){
		document.getElementById('checkin_date').value = check_in;
		document.getElementById('checkout_date').value = check_out;
		document.getElementById('children').value = child;
		document.getElementById('adults').value = adult;
	}
	</script>
  </body>
</html>