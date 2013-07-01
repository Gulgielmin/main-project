<?php 

session_start();

if(!isset($_SESSION['idUsuario']) || !isset($_SESSION['emailUsuario'])){
	session_destroy();
	header("location: ../login.php");
}
?>