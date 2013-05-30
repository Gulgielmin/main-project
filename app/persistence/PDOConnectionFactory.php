<?php 
class PDOConnectionFactory{
	// recebe a conexao
	public $con = null;
	public $dbType 	= "mysql";

	// par�metros de conexao
	// quando n�o for necessario deixe em branco apenas com as aspas duplas ""
	public $host 	= "localhost";
	public $user 	= "root";
	public $senha 	= "";
	public $db		= "savant";

	// seta a persist�ncia da conexao
	public $persistent = false;

	// new PDOConnectionFactory( true ) <--- conex�o persistente
	// new PDOConnectionFactory()       <--- conexao n�o persistente
	public function PDOConnectionFactory( $persistent=false ){
		// verifico a persist�ncia da conexao
		if( $persistent != false){ $this->persistent = true; }
	}

	public function getConnection(){
		try{
			// realiza a conexao
			$this->con = new PDO($this->dbType.":host=".$this->host.";dbname=".$this->db, $this->user, $this->senha,
					array( PDO::ATTR_PERSISTENT => $this->persistent ) );
			// realizado com sucesso, retorna conectado
			return $this->con;
		}catch ( PDOException $ex ){  echo "Erro: ".$ex->getMessage(); }

	}

	// desconecta
	public function Close(){
		if( $this->con != null )
			$this->con = null;
	}

}
?>