<?php 

require_once dirname(__FILE__).'/../../app/persistence/projeto_dao.php';
require_once dirname(__FILE__).'/../../app/persistence/custo_dao.php';
require_once dirname(__FILE__).'/../../app/business/business.php';

/**
 * Classe de indireção para acessar funcionalidades
 * @author Willian
 *
 */
class ProjetoBusiness extends Business{

	/**
	 * Construtor default de Projeto na Dao
	 */
	public function __construct(){
		$this->dao = new DefaultProjetoDAO();
	}

	/**
	 * Salva um projeto no banco de dados
	 * @param projeto
	 */
	public function salvarProjeto($projeto){
		$ok = $this->dao->salvarProjeto($projeto);
		return $ok;
	}

	/**
	 * Altera um projeto no banco de dados 
	 * @param 
	 * @
	 */
	public function alterarProjeto($projeto){

		$ok = $this->dao->alterarProjeto($projeto);
	}

	/**
	 * Lista projetos salvos no bando de dados
	 * de acordo com um identificador
	 * @param $idUsuario
	 * @return $ok
	 */
	public function listarProjeto($idUsuario){
		$ok = $this->dao->listarProjetosPorUsuario($idUsuario);
		return $ok;
	}

	/**
	 * Consulta projetos cadastrados no banco
	 * de dados
	 * @param $idProjeto
	 * @return $ok
	 */
	public function buscarProjeto($idProjeto){
		$ok = $this->dao->buscarProjeto($idProjeto);
		return $ok;
	}

	/**
	 * Deleta um projeto do banco de dados de 
	 * acordo com um identificador
	 * @param $idProjeto
	 * @return $ok
	 */
	public function excluir($idProjeto){
		$ok = $this->dao->excluirProjeto($idProjeto);
		return $ok;
	}
}
?>
