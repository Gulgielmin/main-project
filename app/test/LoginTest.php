<?php

require_once dirname(__FILE__).'/../controller/usuario_controller.php';
require_once 'SQLUtils.php';
require_once 'AlternateSessionController.php';

/**
 * 
 * Suíte de testes para a funcionalidade de login de usuário
 * 
 * @author Marcos
 *
 */
class LoginTest extends PHPUnit_Framework_TestCase {

	/**
	 * Inserir um usuário e colocar o mock do controlador de sessão
	 */
	public function setUp() {

		$_POST['nome'] = 'Marcos';
		$_POST['email'] = 'marcos@mail.com';
		$_POST['senha'] = '123456';
		$_POST['confirmacao'] = '123456';

		$this->controller = new UsuarioController(new AlternateSessionController());
		$this->db = new SQLUtils();

		$this->controller->registrarUsuario($_POST);
	}

	/**
	 * Apagar usuário previamente inserido 
	 */
	public function tearDown() {
		$sql = "DELETE FROM usuario WHERE email='marcos@mail.com';";
		$this->db->exec($sql);
		$sql = "DELETE FROM usuario WHERE nome='Marcos';";
		$this->db->exec($sql);
	}


	/**
	 * Teste de login com dados corretos
	 */
	public function testLoginDadosCorretos() {
		$this->controller->validarUsuario($_POST);
		$this->assertEquals($_SESSION["usuario.email"], "marcos@mail.com");
	}

	/**
	 * Teste de login com senha incorreta
	 */
	public function testLoginSenhaIncorreta() {
		$_POST['senha'] = '413121';
		try {
			$this->controller->validarUsuario($_POST);
			$this->fail("Não deveria chegar aqui.");
		} catch (Exception $e) {
			$this->assertEquals("Usuário não existe.", $e->getMessage());
		}
	}


	/**
	 * Teste de login com usuário inexistente
	 */
	public function testLoginEmailIncorreto() {
		$_POST['email'] = 'ramos@mail.com';
		try {
			$this->controller->validarUsuario($_POST);
			$this->fail("Não deveria chegar aqui.");
		} catch (Exception $e) {
			$this->assertEquals("Usuário não existe.", $e->getMessage());
		}
	}

	/**
	 * Teste de login com email e senha errados
	 */
	public function testLoginEmailESenhaIncorretos() {
		$_POST['email'] = 'ramos@mail.com';
		$_POST['senha'] = '413121';
		try {
			$this->controller->validarUsuario($_POST);
			$this->fail("Não deveria chegar aqui.");
		} catch (Exception $e) {
			$this->assertEquals("Usuário não existe.", $e->getMessage());
		}
	}
	
	/**
	 * Teste de login com senha vazia
	 */
	public function testLoginSenhaVazia() {
		$_POST['senha'] = '';
		$_POST['confirmacao'] = '';
		try {
			$this->controller->validarUsuario($_POST);
			$this->fail("Não deveria chegar aqui.");
		} catch (Exception $e) {
			$this->assertEquals("Senha vazia.", $e->getMessage());
		}
	}


	/**
	 * Teste de login com email inválido
	 */
	public function testLoginSenhaTamanhoInvalido() {
		$_POST['senha'] = '123';
		try {
			$this->controller->validarUsuario($_POST);
			$this->fail("Não deveria chegar aqui.");
		} catch (Exception $e) {
			$this->assertEquals("Senha fora do formato.", $e->getMessage());
		}
	}
	
	/**
	 * Teste para encerrar sessão
	 */
	public function testEncerrarSessao() {
		$this->controller->validarUsuario($_POST);
		
		try {
			$this->controller->encerrarSessao();
			$this->assertTrue(TRUE);
		} catch (Exception $e) {
			$this->fail("Teste falhou.");
		}
	}
}

?>