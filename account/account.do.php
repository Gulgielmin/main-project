<?php
include '../app/controller/usuario_controller.php';

if($_GET && $_GET['action']) {

	$controller = new UsuarioController();

	if($_GET['action'] == 'new') {
		$controller ->registrarUsuario($_POST);
	}

	if($_GET['action'] == 'login') {
		try {
			$controller->validarUsuario($_POST['email'], $_POST['senha']);
			header("location: ../account");
		} catch (Exception $e) {
			header("location: login.jsp?error=1");
		}
	}
}

?>