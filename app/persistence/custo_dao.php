<?php

include_once 'pdo_connection_factory.php';

interface CustoDAO {
	
	public function salvarCusto($custo);
	public function alterarCusto($custo);
}

class DefaultCustoDAO extends PDOConnectionFactory implements CustoDAO{
	
	private $conex = null;
	
	public function __construct(){
		$this->conex = PDOConnectionFactory::criaConexao();
	}
	
	public function salvarCusto($custo){
		try{
			$stmt = $this->conex->prepare("INSERT INTO savant.custo (idCusto, Periodicidade_id, valor, qtdPeriodos, data) VALUES (:id, :periodicidade, :valor, :qtdperiodos, :data)");
			
			$stmt->bindValue('id', $custo->getIdCusto(), PDO::PARAM_INT);
			$stmt->bindValue('periodicidade', $custo->getPeriodicidade(), PDO::PARAM_INT);
			$stmt->bindValue('valor', $custo->getValor(), PDO::PARAM_STR);
			$stmt->bindValue('qtdperiodos', $custo->getQtdPeriodos(), PDO::PARAM_INT);
			$stmt->bindValue('data', $custo->getData(), PDO::PARAM_STR);

			try {
				$stmt->execute();
			}
			catch (Exception $ex){
				echo 'ERRO: '.$ex->getMessage();
			}
			$idCusto = $this->conex->lastInsertId();
			PDOConnectionFactory::fechaConexao();
			return $idCusto;
		}catch ( PDOException $ex ){  
			echo "Erro: ".$ex->getMessage(); 
		}
	}
	public function alterarCusto($custo){
		$ok = null;
		
		try{
			$stmt = $this->conex->prepare("UPDATE custo SET Periodicidade_id = :periodicidade, valor = :valor, qtdPeriodos = :qtdperiodos, data = :data WHERE idCusto = :id");
				
			$stmt->bindValue('periodicidade', $custo->getPeriodicidade(), PDO::PARAM_INT);
			$stmt->bindValue('valor', $custo->getValor(), PDO::PARAM_STR);
			$stmt->bindValue('qtdperiodos', $custo->getQtdPeriodos(), PDO::PARAM_INT);
			$stmt->bindValue('data', $custo->getData(), PDO::PARAM_STR);
			$stmt->bindValue('id', $custo->getIdCusto(), PDO::PARAM_INT);
	
			try {
				$ok = $stmt->execute();
			}
			catch (Exception $ex){
				echo 'Erro: '.$ex->getMessage();
			}
			PDOConnectionFactory::fechaConexao();
			return $ok;
		}catch ( PDOException $ex ){
			echo "Erro: ".$ex->getMessage();
		}
	}
}
?>