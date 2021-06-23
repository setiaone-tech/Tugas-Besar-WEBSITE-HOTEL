<?php
session_start();
include 'conn.php';

$connect = mysqli_connect($host, $user, $passwd, $db);

if(isset($_POST['send_order'])){
	$id = $_POST['send_order'];
	$in = $_POST['checkin_order'];
	$out = $_POST['checkout_order'];
	$adult = $_POST['adults'];
	$child = $_POST['children'];
	$usnm = $_SESSION['user'];
	
	$sql = "SELECT * FROM tb_hotel WHERE id='".$id."'";
	$query = mysqli_query($connect, $sql);
	$view = mysqli_fetch_assoc($query);
	
	if($query -> num_rows > 0){
		$harga = $view['harga_akhir'];
		$nama = $view['nama'];
		$trx = mt_rand(10000000, 99999999);
		
		$sql1 = "INSERT INTO tb_order (id_transaksi, username, nama_hotel, `check-in`, `check-out`, adult, children, price) VALUES ('".$trx."', '".$usnm."', '".$nama."', '".$in."', '".$out."', '".$adult."', '".$child."', '".$harga."')";
		$query1 = mysqli_query($connect, $sql1);
	}
}
header('Location: view_order.php');
?>