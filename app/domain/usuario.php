
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
		$this->setSenha($senha,$confirmacao);
		
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
			throw new Exception("Email inválido.");
		}else {
			$this->email = $email;
		}
	}
	
	private function _setSenha($senha){
		if ($senha == NULL || $senha == ''){
			throw new Exception('Senha vazia.');
		}
		else if (!$this->_verificarSenha($senha)){
			throw new Exception ('Senha fora do formato.');
		}
		return	$this->senha = $senha;
	}

	public function setSenha($senha,$confirmacao=NULL) {
		
		if($confirmacao == NULL) {
			$this->_setSenha($senha);
		}
		
		else {
			if($senha == $confirmacao) {
				$this->setSenha($senha);
			}
			else {
				throw new Exception("Senhas não conferem.");
			}	
		}
	}

	private function _verificarSenha($senha){
		$tamanho = strlen($senha);

		if(!($tamanho >= 5 && $tamanho < 15)) {
			return false;
		}else{
			return true;
		}

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