<?php
	include '../conn.php';
	$connect = mysqli_connect($host, $user, $passwd, $db);
	session_start();

	if(isset($_POST['del'])){
		$id = $_POST['del'];
		$query = mysqli_query($connect, "DELETE FROM tb_hotel WHERE id='".$id."'");
		$_SESSION['status'] = 200;
		$_SESSION['message'] = "Data berhasil di hapus";
	}
	else if(isset($_POST['del_order'])){
		$id = $_POST['del_order'];
		$query = mysqli_query($connect, "DELETE FROM tb_order WHERE id='".$id."'");
		$_SESSION['status'] = 200;
		$_SESSION['message'] = "Data berhasil di hapus";
	}
	header('Location: index.php');
?>