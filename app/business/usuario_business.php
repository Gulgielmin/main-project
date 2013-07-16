<?php 
require_once dirname(__FILE__).'/../persistence/usuario_dao.php';
require_once dirname(__FILE__).'/../business/business.php';

/**
 * Essa classe é apenas uma indireção para acessar as funcionalidade
 * das persistências
 * 
 * @author Marcos
 *
 */
class UsuarioBusiness extends Business{

	/**
	 * Construtor padrão
	 */
	public function __construct(){
		$this->dao = new DefaultUsuarioDAO();
	}

	/**
	 * Valida um usuário e cria uma sessão
	 * @param unknown $user
	 * @return unknown
	 */
	public function validar($email, $senha){
		$ok = $this->dao->validarUsuario($email,$senha);
		return $ok;
	}
	
	/**
	 * Valida um usuário e cria uma sessão
	 * @param unknown $user
	 * @return unknown
	 */
	public function validarUsuario($user){
		return $this->validar($user->getEmail(), $user->getSenha());
	}
	

	/**
	 * Consulta um usuário a partir de seu identificador
	 * @param unknown $idUsuario
	 * @return unknown
	 */
	public function consultar($idUsuario){
		$usuario = $this->dao->consultarUsuario($idUsuario);
		return $usuario;
	}

	/**
	 * Salva um usuário no banco de dados
	 * @param unknown $user
	 */
	public function salvar($user){
		$this->dao->salvarUsuario($user);
	}
	
	/**
	 * Altera apenas a senha de um usuário
	 * @param unknown $user
	 * @return unknown
	 */
	public function alterarSenha($user){
		$ok = $this->dao->alterarSenha($user);
		return $ok;
	}
	
	/**
	 * Altera apenas as informações do usuário, sem alterar sua senha
	 * 
	 * @param unknown $user
	 * @return unknown
	 */
	public function alterarDados($user){
		$ok = $this->dao->alterarDados($user);
		return $ok;
	}
}

?>
