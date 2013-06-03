<?php
include_once 'PDOConnectionFactory.php';

interface ProjetoDAO {

	public function salvaDAO($projeto, $idCusto);
}

class DefaultProjetoDAO extends PDOConnectionFactory implements ProjetoDAO{

	private $conex = null;

	public function __construct(){
		$this->conex = PDOConnectionFactory::criaConexao();
	}

	public function salvaDAO($projeto, $idCusto){
		$ok = null;
		try{
			$stmt = $this->conex->prepare("INSERT INTO savant.projeto (idProjeto, nome_projeto, inicio, fim, Custo_id) VALUES (:id, :nome, :inicio, :fim, :idcusto)");

			$stmt->bindValue('id', $projeto->getIdProjeto(), PDO::PARAM_INT);
			$stmt->bindValue('nome', $projeto->getNome(), PDO::PARAM_STR);
			$stmt->bindValue('inicio', $projeto->getInicio(), PDO::PARAM_STR);
			$stmt->bindValue('fim', $projeto->getFim(), PDO::PARAM_STR);
			$stmt->bindValue('idcusto', $idCusto, PDO::PARAM_INT);

			try {
				$ok = $stmt->execute();
			}
			catch (Exception $ex){
				echo 'ERRO: '.$ex->getMessage();
			}

			$this->conex = PDOConnectionFactory::fechaConexao();

			return $ok;

		}catch ( PDOException $ex ){  echo "Erro: ".$ex->getMessage(); }
	}

	public function listaProjetoDao($idUsuario){
		$projetos = null;
		$stmt = $this->conex->prepare("SELECT projeto.idProjeto, projeto.nome_projeto FROM usuario_em_cargo INNER JOIN cargo ON (usuario_em_cargo.Cargo_id = cargo.idCargo) INNER JOIN projeto ON (cargo.Projeto_id = projeto.idProjeto) WHERE usuario_em_cargo.Usuario_id = :id");
		$stmt->bindValue('id', $idUsuario, PDO::PARAM_INT);

		try {
			$stmt->execute();
		}
		catch (Exception $ex){
			echo 'ERRO: '.$ex->getMessage();
		}

		$projetos = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $projetos;
	}

	public function buscaProjetoDao($idProjeto){
		$projeto = null;
		$stmt = $this->conex->prepare("SELECT projeto.idProjeto, projeto.nome_projeto, projeto.inicio, projeto.fim, custo.Periodicidade_id, custo.valor, custo.qtdPeriodos, custo.data FROM projeto INNER JOIN custo ON (projeto.Custo_id = custo.idCusto) WHERE projeto.idProjeto = :id LIMIT 1");
		$stmt->bindValue('id', $idProjeto, PDO::PARAM_INT);

		try {
			$ok = $stmt->execute();
		}
		catch (Exception $ex){
			echo 'ERRO: '.$ex->getMessage();
		}

		$projeto = $stmt->fetch(PDO::FETCH_OBJ);

		return $projeto;
	}	
	
	public function excluiProjetoDao($idProjeto){
		
		$stmt = $this->conex->prepare("DELETE FROM projeto WHERE projeto.idProjeto = :id LIMIT 1");
		$stmt->bindValue('id', $idProjeto, PDO::PARAM_INT);
	
		try {
			$ok = $stmt->execute();
		}
		catch (Exception $ex){
			echo 'ERRO: '.$ex->getMessage();
		}
	
		return $ok;
	}	
	
	public function alteraProjetoDAO($projeto){
		$ok = null;
		try{
			$stmt = $this->conex->prepare("UPDATE savant.projeto SET nome_projeto = :nome, inicio = :inicio, fim = :fim WHERE projeto.idProjeto = :id LIMIT 1");
	
			$stmt->bindValue('nome', $projeto->getNome(), PDO::PARAM_STR);
			$stmt->bindValue('inicio', $projeto->getInicio(), PDO::PARAM_STR);
			$stmt->bindValue('fim', $projeto->getFim(), PDO::PARAM_STR);
			$stmt->bindValue('id', $projeto->getIdProjeto(), PDO::PARAM_INT);
	
			try {
				$ok = $stmt->execute();
			}
			catch (Exception $ex){
				echo 'ERRO: '.$ex->getMessage();
			}
	
			$this->conex = PDOConnectionFactory::fechaConexao();
	
			return $ok;
	
		}catch ( PDOException $ex ){  echo "Erro: ".$ex->getMessage(); }
	}
	

}
?>