<?php 
/**
 * @author Pedro Thiago
 * @author Allan
 *
 */
include $_SERVER['DOCUMENT_ROOT'].'\Savant\main-project\app\domain\Custo.php';


class Projeto{
	private $idProjeto;
	private $nome;
	private $inicio;
	private $fim;
	private $custo;
	
	public function __construct($idProjeto, $nome, $inicio, $fim, $periodicidade, $valor, $qtdPeriodos, $data){
		$this->setIdProjeto($idProjeto);
		$this->setNome($nome);
		$this->setInicio($inicio);
		$this->setFim($fim);
		$this->setCusto(new Custo(null,$periodicidade, $valor, $qtdPeriodos, $data));	
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
	
}

?>