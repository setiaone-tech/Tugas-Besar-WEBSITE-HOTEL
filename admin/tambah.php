<?php
include '../conn.php';

$connect = mysqli_connect($host, $user, $passwd, $db);
 // check ukuran gambar
session_start();

if(isset($_POST["upload"]))
{
	if($_FILES["link_gambar"]["name"] !='') // check file sudah dipilih atau belum
	{
		$allowed_ext = array("jpg", "png", "jpeg"); // extension file yang di ijinkan
		$ext = end(explode('.', $_FILES["link_gambar"]["name"])); // upload file ext
		if(in_array($ext, $allowed_ext))// check untuk validextension extension
		{
			if($_FILES["link_gambar"]["size"]<5000000) // check ukuran gambar sesuai tidak
			{
			
			$loc = $_POST['lokasi'];
			if($loc == "Jakarta"){
				$dic = "jkt";
			}else if($loc == "Bali"){
				$dic = "bli";
			}else if($loc == "Bandung"){
				$dic = "bdg";
			}else if($loc == "Yogyakarta"){
				$dic = "yogya";
			}else if($loc == "Medan"){
				$dic = "mdn";
			}else if($loc == "Bogor"){
				$dic = "bgr";
			}else if($loc == "Surabaya"){
				$dic = "sby";
			}else if($loc == "Solo"){
				$dic = "solo";
			}else if($loc == "Semarang"){
				$dic = "smg";
			}

			$title = md5(rand());
			mkdir("../images/".$dic."/".$title);
			$name = $title.'.'.$ext;
			$path = "../images/".$dic."/".$title."/".$name; // image upload path
			move_uploaded_file($_FILES["link_gambar"]["tmp_name"], $path);
			$cat = $_POST['category'];
			$nama = $_POST['nama'];
			$rating = $_POST['rating'];
			$harga = $_POST['harga'];
			$harga_akhir = $_POST['harga_akhir'];
			$adults = $_POST['adults'];
			$child = $_POST['child'];
			$ket = $_POST['keterangan'];
			$link = "images/".$dic."/".$title."/".$name;
			
			mysqli_query($connect, "INSERT INTO tb_hotel(kategori, lokasi, rating, link_gambar, nama, harga, harga_akhir, adult, child, ket) VALUES('".$cat."','".$loc."','".$rating."','".$link."','".$nama."','".$harga."','".$harga_akhir."','".$adults."','".$child."','".$ket."')");
				$_SESSION['login'] = TRUE;
				$_SESSION['status'] = 200;
				$_SESSION['message'] = "Data berhasil di upload";
			}else{
				$_SESSION['login'] = TRUE;
				$_SESSION['status'] = 400;
				$_SESSION['message'] = "Ukuran gambar terlalu besar!";
			}
		
		}else{
			$_SESSION['login'] = TRUE;
			$_SESSION['status'] = 400;
			$_SESSION['message'] = "File yang diperbolehkan JPG, JPEG, PNG";
		}
	}else{
		$_SESSION['login'] = TRUE;
		$_SESSION['status'] = 404;
		$_SESSION['message'] = "File gambar tidak ditemukan!";
	}
}
header('Location: index.php');

 ?>