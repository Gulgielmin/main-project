
<?php 
class Custo{
	
	private $idCusto;
	private $periodicidade; //É um INT de acordo com o BD
	private $valor;
	private $qtdPeriodos;
	private $data;
	
	public function __construct($periodicidade, $valor, $qtdPeriodos, $data, $idCusto=""){
		$this->setIdCusto($idCusto);
		$this->setPeriodicidade($periodicidade);
		$this->setValor($valor);
		$this->setQtdPeriodos($qtdPeriodos);
		$this->setData($data);
	}
	
	public function getIdCusto(){
		return $this->idCusto;
	}
	public function getPeriodicidade(){
		return $this->periodicidade;
	}
	public function getValor(){
		return $this->valor;
	}
	public function getQtdPeriodos(){
		return $this->qtdPeriodos;
	}
	public function getData(){
		return $this->data;
	}
	public function setIdCusto($idCusto){
		$this->idCusto = $idCusto;
	}
	public function setPeriodicidade($periodicidade){
		$this->periodicidade = $periodicidade;
	}
	public function setValor($valor){
		$this->valor = $valor;
	}
	public function setQtdPeriodos($qtdPeriodos){
		$this->qtdPeriodos = $qtdPeriodos;
	}
	public function setData($data){
		$this->data = $data;
	}	
}
?>