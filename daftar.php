<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sing Up | Hotelin.com</title>
	<link rel="stylesheet" href="assets/css/loginstyle.css">
	<link rel="icon" type="image/png" sizes="32x32" href="src/images/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="src/images/logo.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<style>
	  .button{
	  width: 100%;
	  height: 50px;
	  border: 1px solid;
	  background: red;
	  border-radius: 6px;
	  font-size: 18px;
	  color: #e9f4fb;
	  font-weight: 700;
	  cursor: pointer;
	  outline: none;
	  margin-bottom: 10px;
	}
	.button:hover{
	  border-color: #2691d9;
	  transition: .5s;
	  margin-bottom: 10px;
	}
	</style>
  </head>
  <body onload="showSwal();">
    <div class="center">
      <a href="index.php"><img src="assets/images/logo-remover.png"></a>
      <form action="regis.php" method="post">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
            <input type="email" name="email" required>
            <span></span>
            <label>Email</label>
          </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <button class="button" type="submit" name="regis">Sign Up</button>
		<div class="signup_link">
          Sudah mempunyai akun? Silahkan <a href="login.php">Sign In</a>
        </div>
      </form>
    </div>

    <script>
	var code;
	<?php
	  if(isset($_GET['code']) == true){
		  if($_GET['code'] == 403){
	?>
	var code = 'Username sudah ada! Silahkan login.';
	function showSwal(){
		swal({
		title: 'Peringatan!',
		text: code,
		timer: 3000,
		button: false
		});
	}
	<?php
		  }
		  else{
	?>
	var code = 'Akun berhasil dibuat! Silahkan login.';
	function showSwal(){
		swal({
		title: 'Info',
		text: code,
		timer: 3000,
		button: false
		});
	}
	<?php
	  }
	  }
	?>
	</script>

  </body>
</html>
