<?php
/**
 * Classe abstrata usada para criar sessão. Também é útil para mockar
 * objetos de sessão durante os testes.
 * @author Marcos
 *
 */
abstract class SessionController {

	/**
	 * Classes filhas devem, neste método, criar a sessão apropriadamente.
	 */
	public abstract function doLogin($user);

	/**
	 * Nesse método as implementações concretas devem encerrar a sessão atual.
	*/
	public abstract function doLogout();
}

/**
 * Classe padrão para criar sessão. Ela cria uma sessão usando
 * a session_start() do PHP
 *
 * @author Marcos
 */
class DefaultSessionController extends SessionController{

	/**
	 * (non-PHPdoc)
	 * @see SessionController::doLogin()
	 */
	public function doLogin($usuario) {
		if($usuario) {
			session_start("usuario");
			$_SESSION['usuario.id'] = $usuario->idUsuario;
			$_SESSION['usuario.nome'] = $usuario->nome;
			$_SESSION['usuario.email'] = $usuario->email;
		}
		else {
			throw new Exception("User does not exists.");
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see SessionController::doLogout()
	 */
	public function doLogout() {
		$ok = session_destroy("usuario");

		if(!$ok) {
			throw new Exception("Sessão não pode ser encerrada.");
		}
	}
}
?>