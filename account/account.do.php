<?php
require_once '../app/controller/usuario_controller.php';
require '../app/utils/session_utils.php';

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
		$controller->alterarDados($_POST);
		$_POST['senha'] = $_SESSION['usuario.senha'];
		$controller->validarUsuario($_POST);
		header("location: ../account");
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}


/**
 * Essa função é disparada quando o usuário,
 * a parti de seu perfil, escolhe a opção de
 * alterar sua senha.
 */
function process_update_password() {
	$controller = new UsuarioController();

	try {
		$controller->alterarSenha($_POST);
		$_POST['email'] = $_SESSION['usuario.email'];
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
if(isset($_GET) && isset($_POST) && $_GET['action']) {
	
	$action =$_GET['action']; 

	if($action == 'new') {
		process_register();
	}

	else if($action == 'login') {
		process_login();
	}

	else if($action == 'update_password') {
		process_update_password();
	}

	else if($action == 'update_profile') {
		process_update_profile();
	}
}

?>