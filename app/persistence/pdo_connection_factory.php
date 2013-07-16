<?php 

/**
 * Classe com funcionalidades inerentes ao banco de dados
 * @author Willian
 *
 */
class PDOConnectionFactory{
	private $dsn = 'mysql:host=localhost;dbname=savant';
	private $user = 'root';
	private $password = '';
	private static $conn = null; 
	
	/**
	 * Método que inicia uma conexão com o banco de dados
	 */
	public function criaConexao(){
		if(PDOConnectionFactory::$conn==null) {
				PDOConnectionFactory::$conn = new PDO($this->dsn, $this->user, $this->password);
				PDOConnectionFactory::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}			
		return PDOConnectionFactory::$conn;
	}
	/**
	 * Metodo que encerra uma conexão co mo banco de dados
	 */
	public function fechaConexao(){
		if( PDOConnectionFactory::$conn != null )
			PDOConnectionFactory::$conn = null;
	}
}

?>