<?php 

if (!isset($_SESSION['idUsuario']) OR !isset($_SESSION['nomeUsuario'])) {
	include 'logout.php';
}
else {
	header("location: projeto/index.php");
}
?>