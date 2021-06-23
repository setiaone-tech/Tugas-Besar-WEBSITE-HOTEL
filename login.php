<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
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
      <form action="auth.php" method="post">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <button class="button" type="submit" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" name="login">Login</button>
		<div class="pass">Lupa Password?</div>
        <div class="signup_link">
          Belum mempunyai akun? Silahkan <a href="daftar.php">Sign Up</a>
        </div>
      </form>
    </div>
	
	<script>
	var code;
	<?php
	  if(isset($_GET['error']) == true){
		  if($_GET['error'] == 404){
	?>
	var code = 'Data tidak ditemukan! Silahkan registrasi.';
	function showSwal(){
		swal({
		title: 'Error alert!',
		text: code,
		timer: 3000,
		button: false
		});
	}
	<?php
		  }
		  else{
	?>
	var code = 'Username/Password salah!';
	function showSwal(){
		swal({
		title: 'Error alert!',
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