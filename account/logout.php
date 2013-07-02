 <?php
	session_start("usuario");
	session_destroy();
	header("location: login.php");
 ?>