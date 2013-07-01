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
	

	public function salva($objeto){}
	public function altera($id, $nome, $email, $senha){
		$ok = null;
		try {
				$ok = $this->dao->alteraConta($id, $nome, $email, $senha);
			}
		catch(Exception $ex){
			echo "ERRO: ".$ex.getMessage();
		}
		return $ok;
	}
	public function exclui($id){}
}
?>
