<?php
class SQLUtils extends PDOConnectionFactory  {
	
	private $conex = null;
	
	public function __construct(){
		$this->conex = PDOConnectionFactory::criaConexao();
	}
	
	public function exec($sql) {
		$stmt = $this->conex->prepare($sql);
		$stmt->execute();
		return $stmt;
	}
	
	public function query($sql) {
		$stmt = $this->exec($sql);
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
}

?>