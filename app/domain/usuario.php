
<?php 
class Usuario{
	
	public $idUsuario;
	public $nome;
	public $email;
	public $senha;
	
	public function __construct($nome, $email, $senha, $confirmacao=NULL,$idUsuario=""){
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
		$this->nome = $nome;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
}
?>