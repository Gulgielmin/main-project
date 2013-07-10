<?php
require_once 'pdo_connection_factory.php';

interface ProjetoDAO {

	public function salvarProjeto($projeto);
	public function listarProjetosPorUsuario($idUsuario);
	public function buscarProjeto($idProjeto);
	public function excluirProjeto($idProjeto);
	public function alterarProjeto($projeto);
	public function vincularUsuario($idProjeto, $idUsuario, $idCargo);

}

class DefaultProjetoDAO extends PDOConnectionFactory implements ProjetoDAO{

	private $conex = null;

	public function __construct(){
		$this->conex = $this->criaConexao();
	}

	public function salvarProjeto($projeto){
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
				if($ok) {
					try {
						$this->vinculaUsuarioDao($this->conex->lastInsertId(),$idUsuario, 1); //Cargo 1 = Gerente
					}
					catch (Exception $ex){
						echo 'ERRO: '.$ex->getMessage();
					}
				}
			}
			catch (Exception $ex){
				echo 'ERRO: '.$ex->getMessage();
			}

			$this->conex = PDOConnectionFactory::fechaConexao();

			return $ok;

		}catch ( PDOException $ex ){
			echo "Erro: ".$ex->getMessage();
		}
	}

	public function listarProjetosPorUsuario($idUsuario){
		$projetos = null;
		$stmt = $this->conex->prepare("SELECT projeto.idProjeto, projeto.nome_projeto FROM usuario_em_projeto INNER JOIN projeto ON (usuario_em_projeto.Projeto_idProjeto = projeto.idProjeto) WHERE usuario_em_projeto.Usuario_idUsuario = :id");
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

	public function buscarProjeto($idProjeto){
		$projeto = null;
		$stmt = $this->conex->prepare("SELECT projeto.nome_projeto, projeto.inicio, projeto.fim, custo.Periodicidade_id, custo.valor, custo.qtdPeriodos, custo.data, projeto.Custo_id, projeto.idProjeto FROM projeto INNER JOIN custo ON (projeto.Custo_id = custo.idCusto) WHERE projeto.idProjeto = :id LIMIT 1");
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

	public function excluirProjeto($idProjeto){
		$ok = null;
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

	public function alterarProjeto($projeto){
		$ok = null;
		try{
			$stmt = $this->conex->prepare("UPDATE projeto SET nome_projeto = :nome, inicio = :inicio, fim = :fim WHERE idProjeto = :id");

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

		}catch ( PDOException $ex ){
			echo "Erro: ".$ex->getMessage();
		}
	}

	public function vincularUsuario($idProjeto, $idUsuario, $idCargo){
		$ok = null;
		try{
			$stmt = $this->conex->prepare("INSERT INTO savant.usuario_em_projeto (Cargo_IdCargo, Projeto_idProjeto, Usuario_idUsuario) VALUES (:idCargo, :idProjeto, :idUsuario)");

			$stmt->bindValue('idCargo', $idCargo, PDO::PARAM_INT);
			$stmt->bindValue('idProjeto', $idProjeto, PDO::PARAM_INT);
			$stmt->bindValue('idUsuario', $idUsuario, PDO::PARAM_INT);

			try {
				$ok = $stmt->execute();
			}
			catch (Exception $ex){
				echo 'ERRO: '.$ex->getMessage();
			}

			$this->conex = PDOConnectionFactory::fechaConexao();

			return $ok;

		}catch ( PDOException $ex ){
			echo "Erro: ".$ex->getMessage();
		}
	}


}

?>