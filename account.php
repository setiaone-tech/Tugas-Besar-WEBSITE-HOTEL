<?php
try{
	include 'conn.php';
	session_start();

	$connect = mysqli_connect($host, $user, $passwd, $db);

	if(isset($_POST['submit'])){
		$username = $_SESSION['user'];
		
		$sql = "SELECT * FROM account WHERE username='".$username."'";
		$query = mysqli_query($connect, $sql);
		$view = mysqli_fetch_assoc($query);
		
		if($query -> num_rows > 0){
			$nama = $_POST['nama_update'];
			$email = $_POST['email_update'];
			$nope = $_POST['nope_update'];
			$alamat = $_POST['alamat_update'];
			$pass = $_POST['password_update'];
			$passwd = $_POST['password'];
			
			if($passwd == $view['password']){
				$sql1 = "UPDATE detail_akun SET nama_lengkap='".$nama."', email='".$email."', kontak='".$nope."', alamat='".$alamat."' WHERE username='".$username."'";
				$query1 = mysqli_query($connect, $sql1);
				
				$sql2 = "UPDATE account SET password='".$pass."' WHERE username='".$username."'";
				$query2 = mysqli_query($connect, $sql2);
				
				echo mysqli_error($query1);
				echo mysqli_error($query2);
			}
		}
		echo mysqli_error($query);
	}
	header('Location: akun.php');
}catch(Exception $error){
	echo $error -> getMessage();
}
?>