<?php
require '../app/controller/usuario_controller.php';

/**
 * Essa função é disparado por um formulário
 * ao pedido de registro de usuário. Nesse
 * caso deve-se chamar o controller para 
 * fazer tal regitro;
 */
function process_register() {
	
	$controller = new UsuarioController();
	
	try {
		$controller ->registrarUsuario($_POST);
		$controller->validarUsuario($_POST);
		header("location: ../account");
	} catch(Exception $e) {
		echo $e->getMessage();
	}
}

/**
 * Essa função é disparada pelo formulário
 * de login de usuário.
 */
function process_login() {
	
	$controller = new UsuarioController();
	
	try {
		$controller->validarUsuario($_POST);
		header("location: ../account");
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

/**
 * Essa função é disparada quando o usuário,
 * a parti de seu perfil, escolhe a opção de
 * alterar os dados de seu perfil (por enquanto
 * nome e email).
 */
function process_update_profile() {
	$controller = new UsuarioController();
	
	try {
		$controller->alteraUsuario($_POST);
		$controller->validarUsuario($_POST);
		header("location: ../account");
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

/**
 * Aqui verificamos a validade da requisição e redirecionamos para
 * uma das funções especificadas anteriormente.
 */
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