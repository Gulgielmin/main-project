<?php
//require_once dirname(__FILE__).'/../controller/usuario_controller.php';

/**
 *
 * Mock para a session controller
 *
 * @author Marcos
 *
 */
class AlternateSessionController extends SessionController{

	public function doLogin($usuario) {
		if($usuario) {
			$_SESSION = array();
			$_SESSION['usuario.id'] = $usuario->idUsuario;
			$_SESSION['usuario.nome'] = $usuario->nome;
			$_SESSION['usuario.email'] = $usuario->email;
		}
		else {
			throw new Exception("Usuário não existe.");
		}
	}

	public function doLogout() {
		unset($_SESSION);
	}

}

?>