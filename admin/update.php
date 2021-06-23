<?php
include '../conn.php';

$connect = mysqli_connect($host, $user, $passwd, $db);
 // check ukuran gambar
session_start();

if(isset($_POST["save"]))
{
	if($_FILES["link_update"]["name"] !='') // check file sudah dipilih atau belum
	{
		$allowed_ext = array("jpg", "png", "jpeg"); // extension file yang di ijinkan
		$ext = end(explode('.', $_FILES["link_update"]["name"])); // upload file ext
		if(in_array($ext, $allowed_ext))// check untuk validextension extension
		{
			if($_FILES["link_update"]["size"]<500000) // check ukuran gambar sesuai tidak
			{
			
			$loc = $_POST['lokasi_update'];
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
			move_uploaded_file($_FILES["link_update"]["tmp_name"], $path);
			$cat = $_POST['category_update'];
			$nama = $_POST['nama_update'];
			$rating = $_POST['rating_update'];
			$harga = $_POST['harga_update'];
			$harga_akhir = $_POST['harga_akhir_update'];
			$adults = $_POST['adults_update'];
			$child = $_POST['child_update'];
			$ket = $_POST['ket_update'];
			$id = $_POST['id_update'];
			$link = "images/".$dic."/".$title."/".$name;
			
			$query = mysqli_query($connect, "UPDATE tb_hotel SET kategori='".$cat."', lokasi='".$loc."', rating='".$rating."', link_gambar='".$link."', nama='".$nama."', harga='".$harga."', harga_akhir='".$harga_akhir."', adult='".$adults."', child='".$child."', ket='".$ket."' WHERE id='".$id."'");
			$_SESSION['status'] = 200;
			$_SESSION['message'] = "Data berhasil diperbaharui.";
			}else{
				$_SESSION['status'] = 400;
				$_SESSION['message'] = "Ukuran gambar terlalu besar!";
			}
		
		}else{
			$_SESSION['status'] = 400;
			$_SESSION['message'] = "File yang diperbolehkan JPG, JPEG, PNG";
		}
	}else{
		$_SESSION['status'] = 404;
		$_SESSION['message'] = "File gambar tidak ditemukan!";
	}
}
header('Location: index.php');

?>