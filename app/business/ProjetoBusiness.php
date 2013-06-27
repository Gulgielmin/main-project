<?php 
include $_SERVER['DOCUMENT_ROOT'].'/Savant/app/persistence/ProjetoDAO.php';
include $_SERVER['DOCUMENT_ROOT'].'/Savant/app/persistence/CustoDAO.php';
include $_SERVER['DOCUMENT_ROOT'].'/Savant/app/business/Business.php';

class ProjetoBusiness extends Business{
	private $daoCusto;

	public function __construct(){
		$this->dao = new DefaultProjetoDAO();
		$this->daoCusto = new DefaultCustoDAO();
	}
	
	public function salva($projeto){
		
	}

	public function salvaNovoProjeto($projeto, $idUsuario){
		$idCusto = $this->daoCusto->salvaDAO($projeto->getCusto());
		$ok = $this->dao->salvaDAO($projeto, $idCusto, $idUsuario);
		return $ok;
	}

	public function altera($projeto){
		$ok = null;
		$okCusto = null;
		try {
			$okCusto = $this->daoCusto->alteraCustoDAO($projeto->getCusto());
			if($okCusto) {
				$ok = $this->dao->alteraProjetoDao($projeto);
			}
		}catch(Exception $ex){
			echo "ERRO: ".$ex.getMessage();
		}
		return $ok;
	}
	
	public function listaProjeto($idUsuario){
		$ok = $this->dao->listaProjetoDao($idUsuario);
		return $ok;
	}
	
	public function buscaProjeto($idProjeto){
		$ok = $this->dao->buscaProjetoDao($idProjeto);
		return $ok;
	}
	
	public function exclui($idProjeto){
		$ok = $this->dao->excluiProjetoDao($idProjeto);
		return $ok;

	}
}
?>
