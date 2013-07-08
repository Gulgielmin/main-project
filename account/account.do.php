<?php
require '../app/controller/usuario_controller.php';

function process_register() {
	
	$controller = new UsuarioController();
	
	try {
		$controller ->registrarUsuario($_POST);
		$controller->validarUsuario($_POST);
		header("location: ../account");
	} catch(Exception $e) {
		// TODO colocar codigo do erro
		echo "location: register.php?error=1";
	}
}

function process_login() {
	
	$controller = new UsuarioController();
	
	try {
		$controller->validarUsuario($_POST);
		header("location: ../account");
	} catch (Exception $e) {
		// 			TODO colocar codigo do erro
		header("location: login.php?error=1");
	}
}

if($_GET && $_GET['action'] && $_POST) {

	$controller = new UsuarioController();
	
	$action =$_GET['action']; 

	if($action == 'new') {
		process_register();
	}

	if($action == 'login') {
		process_login();
	}
}

?>