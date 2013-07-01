<?php
include '../app/controller/UsuarioController.php';

if($_GET && $_GET['action']) {
	
	$controller = new UsuarioController();
	
	if($_GET['action'] == 'new') {
		$controller ->registrarUsuario($_POST);	
	}

	if($_GET['action'] == 'login') {
		echo "Colocar o código de login =)";
	}
}

?>