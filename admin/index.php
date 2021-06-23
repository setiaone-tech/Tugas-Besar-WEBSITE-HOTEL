<?php
include '../conn.php';

$connect = mysqli_connect($host, $user, $passwd, $db);

session_start();
if($_SESSION['login'] != TRUE || $_SESSION['pangkat'] != 1){
	header('Location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Staff Hotel</title>
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<style>
		/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}
	</style>
  </head>
  <body <?php if($_SESSION['message'] != null){ echo 'onload="showSwal();"';} ?> >
    <div class="container-scroller">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="../index.php"><img src="../src/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="../index.php"><img sizes="16x16" src="../src/images/logo.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="../assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION['user']; ?></h5>
                  <span>Staff</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="../akun.php" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="../logout.php" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Log out</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Basic Tables </h3>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Hotel</h4>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> No. </th>
							<th> Kategori </th>
							<th> Rating </th>
                            <th> Link Gambar </th>
                            <th> Nama Kamar </th>
                            <th> Harga Awal </th>
							<th> Harga Akhir </th>
							<th> Maks. Orang Dewasa </th>
							<th> Maks. Anak Kecil </th>
							<th> Lokasi </th>
							<th> Keterangan </th>
							<th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
						  <tr>
							  <form action="tambah.php" method="POST" enctype="multipart/form-data">
							  <td></td>
							  <td>
							  <select name="category" class="form-control" aria-describedby="basic-addon1">
								    <option value="">--Pilih--</option>
								    <option value="1">Private Room</option>
								    <option value="2">Family Room</option>
								    <option value="3">Presidential Room</option>
							  </select>
							  </td>
							  <td>
							  <select name="rating" class="form-control" aria-describedby="basic-addon1">
								    <option value="">--Pilih--</option>
								    <option value="1">1</option>
								    <option value="2">2</option>
								    <option value="3">3</option>
								    <option value="4">4</option>
									<option value="5">5</option>
							  </select>
							  </td>
							  <td><input type="file" name="link_gambar"></td>
							  <td><input type="text" name="nama" class="form-control" aria-describedby="basic-addon1"></td>
							  <td><input type="text" name="harga" class="form-control" aria-describedby="basic-addon1"></td>
							  <td><input type="text" name="harga_akhir" class="form-control" aria-describedby="basic-addon1"></td>
							  <td>
							  <select name="adults" class="form-control" aria-describedby="basic-addon1">
								    <option value="">--Pilih--</option>
								    <option value="1">1</option>
								    <option value="2">2</option>
								    <option value="3">3</option>
									<option value="4">4</option>
							  </select>
							  </td>
							  <td>
							  <select name="child" class="form-control" aria-describedby="basic-addon1">
								    <option value="">--Pilih--</option>
								    <option value="1">1</option>
								    <option value="2">2</option>
								    <option value="3">3</option>
								    <option value="4">4</option>
							  </select>
							  </td>
							  <td>
							  <select name="lokasi" class="form-control" aria-describedby="basic-addon1">
								    <option value="">--Pilih--</option>
								    <option value="Jakarta">Jakarta</option>
								    <option value="Bali">Bali</option>
								    <option value="Bandung">Bandung</option>
								    <option value="Yogyakarta">Yogyakarta</option>
									<option value="Medan">Medan</option>
									<option value="Bogor">Bogor</option>
									<option value="Surabaya">Surabaya</option>
									<option value="Solo">Solo</option>
									<option value="Semarang">Semarang</option>
							  </select>
							  </td>
							  <td><textarea name="keterangan" class="form-control" aria-describedby="basic-addon1" style="width:200px; height:100px;"></textarea></td>
							  <td><button class="btn btn-primary" name="upload" type="submit">Tambah</button></td>
							  </form>
						  </tr>
						  <?php
						  $query = mysqli_query($connect, "SELECT * FROM tb_hotel");
						  $num = 1;
						  while($view = mysqli_fetch_assoc($query)){
						  ?>
                          <tr>
                            <td> <?php echo $num; ?> </td>
							<td> <?php if($view["kategori"] == 1){
								echo 'Private Room';
							}else if($view["kategori"] == 2){
								echo 'Family Room';
							}else if($view["kategori"] == 3){
								echo 'Presidential Room';
							}
							?> 
							</td>
							<td> <?php echo $view["rating"]; ?> </td>
                            <td> <?php echo $view["link_gambar"]; ?> </td>
                            <td> <?php echo $view["nama"]; ?> </td>
                            <td> <?php echo $view["harga"]; ?> </td>
							<td> <?php echo $view["harga_akhir"]; ?> </td>
							<td> <?php echo $view["adult"]; ?> </td>
							<td> <?php echo $view["child"]; ?> </td>
							<td> <?php echo $view["lokasi"]; ?> </td>
							<td> <?php echo $view["ket"]; ?> </td>
							<td>
								<a href="#update" data-toggle="modal">
									<button class="btn btn-success" data-toggle="tooltip" onclick="getElementsByName('id_update')[0].value=<?php echo $view["id"]; ?>">Update</button>
								</a>
								&nbsp;
								<form action="hapus.php" method="POST">
									<button class="btn btn-danger" name="del" value="<?php echo $view['id']; ?>" type="submit">Delete</button>
								</form>
							</td>
                          </tr>
						  <?php
							$num++;
						  }
						  ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
			  <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Reservation</h4>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> No. </th>
							<th> ID Transaksi </th>
							<th> Username </th>
                            <th> Nama Hotel </th>
                            <th> Check In </th>
                            <th> Check Out </th>
							<th> Orang Dewasa </th>
							<th> Anak-anak </th>
							<th> Harga </th>
							<th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
						  <?php
						  $query1 = mysqli_query($connect, "SELECT * FROM tb_order");
						  $num1 = 1;
						  while($view1 = mysqli_fetch_assoc($query1)){
						  ?>
                          <tr>
                            <td> <?php echo $num1; ?> </td>
							<td> <?php echo $view1["id_transaksi"]; ?> </td>
							<td> <?php echo $view1["username"]; ?> </td>
                            <td> <?php echo $view1["nama_hotel"]; ?> </td>
                            <td> <?php echo $view1["check-in"]; ?> </td>
                            <td> <?php echo $view1["check-out"]; ?> </td>
							<td> <?php echo $view1["adult"]; ?> </td>
							<td> <?php echo $view1["children"]; ?> </td>
							<td> <?php echo $view1["price"]; ?> </td>
							<td>
								<form action="hapus.php" method="POST">
									<button class="btn btn-danger" name="del_order" value="<?php echo $view1['id']; ?>" type="submit">Delete</button>
								</form>
							</td>
                          </tr>
						  <?php
							$num1++;
						  }
						  ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  <div id="update" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="update.php" method="POST" enctype="multipart/form-data">
						<div class="modal-header">						
							<h4 class="modal-title">Update Data Barang</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>ID</label>
								<input type="text" name="id_update" class="form-control" aria-describedby="basic-addon1" required>
							</div>
							<div class="form-group">
								<label>Kategori</label>
								<select name="category_update" class="form-control" aria-describedby="basic-addon1" required>
								    <option value="">--Pilih--</option>
								    <option value="1">Private Room</option>
								    <option value="2">Family Room</option>
								    <option value="3">Presidential Room</option>
							    </select>
							</div>
							<div class="form-group">
								<label>Rating</label>
								<select name="rating_update" class="form-control" aria-describedby="basic-addon1" required>
								    <option value="">--Pilih--</option>
								    <option value="1">1</option>
								    <option value="2">2</option>
								    <option value="3">3</option>
								    <option value="4">4</option>
									<option value="5">5</option>
							    </select>
							</div>
							<div class="form-group">
								<label>Link Gambar</label>
								<input type="file" name="link_update">
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama_update" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Harga Awal</label>
								<input type="text" name="harga_update" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Harga Akhir</label>
								<input type="text" name="harga_akhir_update" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Maks. Orang Dewasa</label>
								<select name="adults_update" class="form-control" aria-describedby="basic-addon1">
								    <option value="">--Pilih--</option>
								    <option value="1">1</option>
								    <option value="2">2</option>
								    <option value="3">3</option>
									<option value="4">4</option>
							    </select>
							</div>
							<div class="form-group">
								<label>Maks. Anak Kecil</label>
								<select name="child_update" class="form-control" aria-describedby="basic-addon1" required>
								    <option value="">--Pilih--</option>
								    <option value="1">1</option>
								    <option value="2">2</option>
								    <option value="3">3</option>
									<option value="4">4</option>
							    </select>
							</div>
							<div class="form-group">
								<label>Lokasi</label>
								<select name="lokasi_update" class="form-control" aria-describedby="basic-addon1" required>
								    <option value="">--Pilih--</option>
								    <option value="Jakarta">Jakarta</option>
								    <option value="Bali">Bali</option>
								    <option value="Bandung">Bandung</option>
								    <option value="Yogyakarta">Yogyakarta</option>
									<option value="Medan">Medan</option>
									<option value="Bogor">Bogor</option>
									<option value="Surabaya">Surabaya</option>
									<option value="Solo">Solo</option>
									<option value="Semarang">Semarang</option>
							    </select>
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<textarea name="ket_update" class="form-control" aria-describedby="basic-addon1" style="width:200px; height:100px;" required></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<button type="submit" class="btn btn-info" value="Save" name="save">Save</button>
						</div>
					</form>
				</div>
			</div>
		  </div>
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with &hearts; by <br><a href="#">Hotelin.com</a></span>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
	<script>
		var code = "<?php echo $_SESSION['message']; ?>";
		function showSwal(){
			swal({
			title: 'Alert!',
			text: code,
			timer: 3000,
			button: false
			});
			<?php $_SESSION['message'] = ''; ?>
		}
	</script>
  </body>
</html>