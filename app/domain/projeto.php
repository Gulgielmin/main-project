<?php 
/**
 * @author Pedro Thiago
 * @author Allan
 *
 */
include dirname(__FILE__).'/custo.php';


class Projeto{
	private $idProjeto;
	private $nome;
	private $inicio;
	private $fim;
	private $orcamento;
	private $gerente;

	public function __construct($idProjeto, $nome, $inicio, $fim, $orcamento = null, $gerente = null){
		$this->setIdProjeto($idProjeto);
		$this->setNome($nome);
		$this->setInicio($inicio);
		$this->setFim($fim);
		$this->setOrcamento($orcamento);
		$this->setGerente($gerente);
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
	public function getOrcamento(){
		return $this->orcamento;
	}
	public function getGerente(){
		return $this->gerente;
	}
	public function setIdProjeto($idProjeto){
		$this->idProjeto = $idProjeto;
	}
	public function setNome($nome){
		if ($nome == NULL || $nome == ''){
			throw new Exception ('Nome vazio.');
		}
		else{
			$this->nome = $nome;
		}
	}
	public function setInicio($inicio){
		if ($inicio == NULL || $inicio == ''){
			throw new Exception ('Data de inicio vazia.');
		}
		else{
			$this->inicio = $inicio;
		}

	}
	public function setFim($fim){
		if ($fim == NULL || $fim == ''){
			throw new Exception ('Data de termino vazia.');
		}
		else{
			$this->fim = $fim;
		}
	}
	public function setOrcamento($orcamento){
		$orcamento = strtr("$orcamento", "," , ".");
		
		if (!is_numeric($orcamento)){
			throw new Exception('O orçamento é apenas numérico.');
		}
		else {
			$this->orcamento = $orcamento;
		}
		
	}

	public function setGerente($gerente){
		$this->gerente = $gerente;
	}

}

?>