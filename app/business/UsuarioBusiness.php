
<?php 
include $_SERVER['DOCUMENT_ROOT'].'/Savant/app/persistence/UsuarioDAO.php';
include $_SERVER['DOCUMENT_ROOT'].'/Savant/app/business/Business.php';

class UsuarioBusiness extends Business{

	public function __construct(){
		$this->dao = new DefaultUsuarioDAO();
	}
	
	public function validarUsuario($email, $senha){
		$ok = false;
		try {
			$ok = $this->dao->validarUsuarioDAO($email, $senha);
		}catch(Exception $ex){
			echo "ERRO: ".$ex.getMessage();			
		}
		return $ok;
	}
	
	public function consultaUsuario($idUsuario){

		$ok = $this->dao->consultaUsuarioDAO($idUsuario);
		return $ok;
	}

	public function salva($objeto){}
	public function altera($id){}
	public function exclui($id){}
}
?>
