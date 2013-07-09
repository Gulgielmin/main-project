
<?php 
class Usuario{

	private $idUsuario;
	private $nome;
	private $email;
	private $senha;
	private $modo_autenticacao;

	public function __construct($nome, $email, $senha, $confirmacao=NULL,$modo_autenticacao=FALSE,$idUsuario=""){
		$this->modo_autenticacao = $modo_autenticacao;
		
		$this->setIdUsuario($idUsuario);
		$this->setNome($nome);
		$this->setEmail($email);

		if($confirmacao == NULL) {
			$this->setSenha($senha);
		}
		else if($senha == $confirmacao) {
			$this->setSenha($senha);
		}
		else {
			throw new Exception("Senhas não conferem.");
		}
	}

	public function getIdUsuario(){
		return $this->idUsuario;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
	public function setNome($nome){
		if (!$this->modo_autenticacao && ($nome ==NULL || $nome == "")){
			throw new Exception('Nome vazio.');
		}
		$this->nome = $nome;

	}
	public function setEmail($email){
		if ($email == NULL || $email == ''){
			throw new Exception('Email vazio.');
		}
		else if (!$this->_verificarEmail($email)){
				
		}else {
			$this->email = $email;
		}
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
	
	private function _verificarEmail($email){
		$tamanho = strlen($email);
		
		if($tamanho < 5) {
			return false;
		}
		
		$pos_arroba = stripos($email, "@");
		$pos_ponto = strrpos($email, ".");
		
		if($pos_arroba == -1 || $pos_ponto == -1) {
			return false;
		}
		
		if ($pos_ponto < $pos_arroba) {
			return false;
		}
		
		return true;
	}
}
?>