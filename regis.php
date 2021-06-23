<?php
include 'conn.php';

$connect = mysqli_connect($host, $user, $passwd, $db);

if(isset($_POST['regis'])){
	$usrnm = $_POST['username'];
	
	$sql = "SELECT * FROM account WHERE username='".$usrnm."'";
	$query = mysqli_query($connect, $sql);
	
	if($query -> num_rows > 0){
		$res['status'] = 403;
	}else{
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$sql1 = "INSERT INTO account (pangkat, username, password) VALUES ('0', '".$usrnm."', '".$password."')";
		$query1 = mysqli_query($connect, $sql1);
		
		$sql2 = "INSERT INTO detail_akun (username, email) VALUES ('".$usrnm."', '".$email."')";
		$query2 = mysqli_query($connect, $sql2);
		
		$res['status'] = 200;
	}
}
$connect->close();
header('Location: daftar.php?code='.$res['status']);
?>