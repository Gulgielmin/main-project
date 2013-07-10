<?php 
class PDOConnectionFactory{
	private $dsn = 'mysql:host=localhost;dbname=savant';
	private $user = 'root';
	private $password = '';
	private static $conn = null; 
	
	public function criaConexao(){
		if(PDOConnectionFactory::$conn==null) {
				PDOConnectionFactory::$conn = new PDO($this->dsn, $this->user, $this->password);
				PDOConnectionFactory::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}			
		return PDOConnectionFactory::$conn;
	}
	
	public function fechaConexao(){
		if( PDOConnectionFactory::$conn != null )
			PDOConnectionFactory::$conn = null;
	}
}

?>