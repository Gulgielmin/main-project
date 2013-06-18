<?php 
include $_SERVER['DOCUMENT_ROOT'].'/Savant/app/domain/Custo.php';


class Projeto{
	private $idProjeto;
	private $nome;
	private $inicio;
	private $fim;
	private $custo;
	private $envolvidos = array();
	
	public function __construct($nome, $inicio, $fim, $periodicidade, $valor, $qtdPeriodos, $data, $idCusto="", $idProjeto=""){
		$this->setIdProjeto($idProjeto);
		$this->setNome($nome);
		$this->setInicio($inicio);
		$this->setFim($fim);
		$this->setCusto(new Custo($periodicidade, $valor, $qtdPeriodos, $data, $idProjeto));
	}	
	
	public function getIdProjeto(){
		return $this->idProjeto;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getInicio(){
		return $this->inicio;
	}
	public function getFim(){
		return $this->fim;
	}
	public function getCusto(){
		return $this->custo;
	}
	public function getEnvolvidos(){
		return $this->envolvidos;
	}
	public function setIdProjeto($idProjeto){
		$this->idProjeto = $idProjeto;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function setInicio($inicio){
		$this->inicio = $inicio;
	}
	public function setFim($fim){
		$this->fim = $fim;
	}
	public function setCusto($custo){
		$this->custo = $custo;
	}
	public function setEnvolvidos($envolvido){
		array_push($this->envolvidos, $envolvido); //coloca o parâmetro no fim do array
	}
}
?>