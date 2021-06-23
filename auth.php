<?php
include 'conn.php';

$connect = mysqli_connect($host, $user, $passwd, $db);

if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$link = $_POST['login'];
	
	$query = mysqli_query($connect, "SELECT * FROM account WHERE username='$username'");
	
	$view = mysqli_fetch_assoc($query);
	
	if($query -> num_rows > 0){
		if($view['password'] == $password){
			$res['status'] = "200";
			session_start();
			$_SESSION['user'] = $view['username'];
			$_SESSION['pangkat'] = $view['pangkat'];
			$_SESSION['login'] = TRUE;
			
		}
		else{
			$res['status'] = "503";
		}
	}
	else {
		$res['status'] = "404";
	}
}
$connect->close();
if($res['status'] == 200){
	if($link == 'http://localhost/hotel/hotel/rooms.php'){
		header('Location: '.$link);
	}else{
		header('Location: index.php');
	}
}
else {
	header('Location: login.php?error='.$res['status']);
}
?>
</html>