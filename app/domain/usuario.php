
<?php 
class Usuario{

	/** Neste modo todos os dados são verificados*/
	const MODO_NORMAL = 0;

	/** Neste modo as senhas não são verificadas*/
	const MODO_ATUALIZAR_DADOS = 1;

	/** Neste modo apenas as senhas são verificadas*/
	const MODO_ATUALIZAR_SENHA = 2;

	/** Neste modo apenas email e senha são verificados*/
	const MODO_AUTENTICACAO = 3;

	/** Neste modo nenhum dado é verificado*/
	const MODO_SEM_VERIFICACAO = -1;

	private $idUsuario;
	private $nome;
	private $email;
	private $senha;
	private $modo_autenticacao;



	public function __construct($nome, $email, $senha, $confirmacao=NULL,$modo_autenticacao=Usuario::MODO_NORMAL,$idUsuario=""){
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
		if($this->_pode_verificar_nome()) {
			if ($nome ==NULL || $nome == ""){
				throw new Exception('Nome vazio.');
			}
			$this->nome = $nome;
		}

	}
	public function setEmail($email){
		if($this->_pode_verificar_email()) {

			if ($email == NULL || $email == ''){
				throw new Exception('Email vazio.');
			}

			else if (!$this->_verificarEmail($email)){
				throw new Exception('Email inválido.');
					
			} else {
				$this->email = $email;
			}
		}
	}

	private function _setSenha($senha){

		if($this->_pode_verificar_senha()) {
			if ($senha == NULL || $senha == ''){
				throw new Exception('Senha vazia.');
			}
			else if (!$this->_verificarSenha($senha)){
				throw new Exception ('Senha fora do formato.');
			}
			return	$this->senha = $senha;
		}
	}

	public function setSenha($senha,$confirmacao=NULL) {
		if($this->_pode_verificar_senha()) {

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
	}

	/**
	 * Função para verificação de senhas
	 * @param unknown $senha
	 * @return boolean
	 */
	private function _verificarSenha($senha){
		$tamanho = strlen($senha);

		if(!($tamanho >= 5 && $tamanho < 15)) {
			return false;
		}else{
			return true;
		}

	}

	/**
	 * Função para verificação de emails
	 * @param unknown $email
	 * @return boolean
	 */
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

	/**
	 * Retorna se a verificacao de dados está habilitada/desabilitada
	 * @return boolean
	 */
	private function _verificar() {
		return $this->modo_autenticacao != Usuario::MODO_SEM_VERIFICACAO;
	}

	/**
	 * Informa se a verificação das regras de nome devem ser aplicadas
	 * @return boolean
	 */
	private function _pode_verificar_nome() {
		if($this->_verificar()) {
			return (
					($this->modo_autenticacao == Usuario::MODO_ATUALIZAR_DADOS)
					|| ($this->modo_autenticacao==Usuario::MODO_NORMAL));
		}
		return false;
	}

	/**
	 * Informa se a verificação das regras de email devem ser aplicadas
	 * @return boolean
	 */
	private function _pode_verificar_email() {
		if($this->_verificar()) {
			return (($this->modo_autenticacao == Usuario::MODO_ATUALIZAR_DADOS)
					|| ($this->modo_autenticacao==Usuario::MODO_AUTENTICACAO)
					|| ($this->modo_autenticacao==Usuario::MODO_NORMAL));
		}
		return false;
	}

	/**
	 * Informa se a verificação das regras de senha devem ser aplicadas
	 * @return boolean
	 */
	private function _pode_verificar_senha() {
		if($this->_verificar()) {

			return  (($this->modo_autenticacao==Usuario::MODO_ATUALIZAR_SENHA)
					|| ($this->modo_autenticacao==Usuario::MODO_AUTENTICACAO)
					|| ($this->modo_autenticacao==Usuario::MODO_NORMAL));
		}
		return false;
	}
}
?>