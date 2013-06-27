<?php 
class PDOConnectionFactory{
	private $dsn = 'mysql:host=localhost;dbname=savant';
	private $user = 'root';
	private $password = '';
	private $conn = null;
	
	public function criaConexao(){
		try {
		    $this->conn = new PDO($this->dsn, $this->user, $this->password);
		    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
		    echo $e->getMessage();
		}
		return $this->conn;
	}
	
	public function fechaConexao(){
		if( $this->conn != null )
			$this->conn = null;
	}
}

?>