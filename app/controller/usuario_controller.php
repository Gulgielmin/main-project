<?php

require_once dirname(__FILE__).'/../business/usuario_business.php';
require_once dirname(__FILE__).'/../domain/usuario.php';

/**
 * Classe abstrata usada para criar sessão. Também é útil para mockar
 * objetos de sessão durante os testes.
 * @author Marcos
 *
 */
abstract class SessionController {

	/**
	 * Classes filhas devem, neste método, criar a sessão apropriadamente.
	 */
	public abstract function doLogin($user);
	
	/**
	 * Nesse método as implementações concretas devem encerrar a sessão atual.
	 */
	public abstract function doLogout();
}

/**
 * Classe padrão para criar sessão. Ela cria uma sessão usando
 * a session_start() do PHP
 *
 * @author Marcos
 */
class DefaultSessionController extends SessionController{

	/**
	 * (non-PHPdoc)
	 * @see SessionController::doLogin()
	 */
	public function doLogin($usuario) {
		if($usuario) {
			session_start("usuario");
			$_SESSION['usuario.id'] = $usuario->idUsuario;
			$_SESSION['usuario.nome'] = $usuario->nome;
			$_SESSION['usuario.email'] = $usuario->email;
		}
		else {
			throw new Exception("User does not exists.");
		}
	}
	
	/**
	 * (non-PHPdoc)
	 * @see SessionController::doLogout()
	 */
	public function doLogout() {
		$ok = session_destroy("usuario");
		
		if(!$ok) {
			throw new Exception("Sessão não pode ser encerrada.");
		}
	}
}

/**
 * Essa classe é a ponte entre a interação do usuário e a lógica da aplicação
 *
 * @author Marcos
 */
class UsuarioController{

	/**
	 * Interface da business
	 * @var business
	 */
	private $business;
	
	/**
	 * Interface da session controller
	 * @var session_controller
	 */
	private $session_controller;

	/**
	 * Construtor padrão
	 */
	public function __construct($session_controller=NULL){
		$this->business = new UsuarioBusiness();
		
		if($session_controller) {
			$this->session_controller = $session_controller;
		}
		else {
			$this->session_controller = new DefaultSessionController();
		}
		
	}

	/**
	 *
	 * @param unknown $dadosLogin
	 * @return boolean
	 */
	public function verificaCamposLogin($dadosLogin){
		if ($dadosLogin['email'] == '' || $dadosLogin['senha'] == '' )
			return false;
		else
			return true;
	}

	/**
	 * Valida um usuário e cria sua sessão
	 * @param unknown $content
	 */
	public function validarUsuario($content){
		$usuario = new Usuario(NULL, $content['email'], $content['senha'], NULL,TRUE);
		$usuario = $this->business->validarUsuario($usuario);

		$this->session_controller->doLogin($usuario);

	}

	/**
	 * Valida um usuário e cria sua sessão
	 * @param unknown $content
	 */
	public function encerrarSessao(){
		$this->session_controller->doLogout();
	}


	/**
	 * Registra um usuário na base de dados
	 * 
	 * @param $_POST $content os dados do usuário
	 */
	public function registrarUsuario($content) {
		$nome = $content['nome'];
		$email = $content['email'];
		$senha = $content['senha'];
		$confirmacao = $content['confirmacao'];

		$u = new Usuario($nome, $email, $senha, $confirmacao);
		$this->business->salvar($u);
	}

	/**
	 * 
	 * Consulta um usuário com base em seu id
	 * 
	 * @param int $idUsuario o id do usuário a ser pesquisado
	 * @return o usuário associado com o id
	 * @throws Exception caso nenhum usuário seja encontrado
	 */
	public function consultaUsuario($idUsuario){
		$busca = $this->business->consultaUsuario($idUsuario);
		if($busca){
			$usuario = new Usuario($busca->nome, $busca->email, $busca->senha);
			return $usuario;
		}
		else{
			throw new Exception("Nenhum usuário encontrado.");
		}
	}
	/**
	 * Altera os dados de um usuário na base de dados
	 *
	 * @param $_POST $content os dados do usuário
	 * 
	 * Pedro Thiago e Louis 
	 * 
	 */
	
	public function alteraUsuario($content){
		$nome = $content['nome'];
		$email = $content['email'];
		$senha = $content['senha'];
		$confirmacao = $content['confirmacao'];
	
		$usuario = new Usuario($nome, $email, $senha, $confirmacao);
		$usuario->setIdUsuario($_SESSION['usuario.id']);
		$this->business->alterar($usuario);
	}
	
}