
<?php 
require dirname(__FILE__).'/../persistence/usuario_dao.php';
require dirname(__FILE__).'/../business/business.php';

class UsuarioBusiness extends Business{

	public function __construct(){
		$this->dao = new DefaultUsuarioDAO();
	}

	public function validarUsuario($user){
		$ok = $this->dao->validarUsuario($user->email, $user->senha);
		return $ok;
	}

	public function consultar($idUsuario){
		$usuario = $this->dao->consultarUsuario($idUsuario);
		return $usuario;
	}

	public function salvar($user){
		
	}

	public function alterar($user){
		$ok = $this->dao->alterarConta($user);
		return $ok;
	}
	public function exclui($id){
	}
}

?>
