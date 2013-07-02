<?php
require '../app/controller/usuario_controller.php';

if($_GET && $_GET['action'] && $_POST) {

	$controller = new UsuarioController();
	
	$action =$_GET['action']; 

	if($action == 'new') {
		try {
			$controller ->registrarUsuario($_POST);
			$controller->validarUsuario($_POST);
			header("location: ../account");
		} catch(Exception $e) {
			echo "Problemas no registro =/: ".$e->getMessage();
		}
	}

	if($action == 'login') {
		try {
			$controller->validarUsuario($_POST);
			header("location: ../account");
		} catch (Exception $e) {
			header("location: login.jsp?error=1");
		}
	}
}

?>