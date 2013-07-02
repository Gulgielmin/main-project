<?php 
include '../../app/persistence/projeto_dao.php';
include '../../app/persistence/custo_dao.php';
include '../../app/business/business.php';

class ProjetoBusiness extends Business{

	public function __construct(){
		$this->dao = new DefaultProjetoDAO();
	}

	public function salvarProjeto($projeto){
		$ok = $this->dao->salvarProjeto($projeto);
		return $ok;
	}

	public function alterarProjeto($projeto){

		$ok = $this->dao->alterarProjeto($projeto);
	}

	public function listarProjeto($idUsuario){
		$ok = $this->dao->listarProjetosPorUsuario($idUsuario);
		return $ok;
	}

	public function buscarProjeto($idProjeto){
		$ok = $this->dao->buscarProjeto($idProjeto);
		return $ok;
	}

	public function excluir($idProjeto){
		$ok = $this->dao->excluirProjeto($idProjeto);
		return $ok;
	}
}
?>
