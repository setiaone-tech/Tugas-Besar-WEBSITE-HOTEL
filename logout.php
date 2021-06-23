<html>
<?php
session_start();
$_SESSION['user'] = '';
$_SESSION['pangkat'] = '';
$_SESSION['login'] = FALSE;
?>
<body onload="dir();">
<script>
function dir(){
	var link = document.referrer;
	if(link == 'localhost/hotel/hotel/admin/index.php'){
		location.replace('../index.php');
	}else{
		location.replace('index.php');
	}
}
</script>
</body>
</html>