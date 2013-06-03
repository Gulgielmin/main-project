<?php 
include $_SERVER['DOCUMENT_ROOT'].'\Savant\main-project\app\persistence\ProjetoDAO.php';
include $_SERVER['DOCUMENT_ROOT'].'\Savant\main-project\app\persistence\CustoDAO.php';
include $_SERVER['DOCUMENT_ROOT'].'\Savant\main-project\app\business\Business.php';

class ProjetoBusiness extends Business{
	private $daoCusto;

	public function __construct(){
		$this->dao = new DefaultProjetoDAO();
		$this->daoCusto = new DefaultCustoDAO();
	}

	public function salva($projeto){
		$idCusto = $this->daoCusto->salvaDAO($projeto->getCusto());
		$ok = $this->dao->salvaDAO($projeto, $idCusto);
		return $ok;
	}

	public function altera(){

	}
	public function listaProjeto($idUsuario){
		$ok = $this->dao->listaProjetoDao($idUsuario);
		return $ok;
	}
	public function buscaProjeto($IdProjeto){
		$ok = $this->dao->buscaProjetoDao($idProjeto);
		return $ok;
	}
	public function exclui(){

	}
}
?>