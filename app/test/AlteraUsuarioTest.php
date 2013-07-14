<?php
require_once dirname(__FILE__).'/../controller/usuario_controller.php';
require_once 'AlternateSessionController.php';
require_once 'SQLUtils.php';
/*
 * Teste de Altera Cadastro de Usuario
*
*
*/
class CadastroTest extends PHPUnit_Framework_TestCase {

	private $controller;
	private $db;

	public function setUp() {

		$_POST['nome'] = 'Marcos';
		$_POST['email'] = 'marcos@mail.com';
		$_POST['senha'] = '123456';
		$_POST['confirmacao'] = '123456';

		$this->controller = new UsuarioController(new AlternateSessionController());
		$this->db = new SQLUtils();

		$this->controller->registrarUsuario($_POST);
	}

	public function tearDown() {
		$sql = "DELETE FROM usuario WHERE email='marcos@mail.com'";
		$sql = "DELETE FROM usuario WHERE nome='Marcos'";
		$this->db->exec($sql);
	}

	public function testCadastroDadosCorretos() {

		$this->controller->registrarUsuario($_POST);

		$obj = $this->db->query("SELECT * FROM usuario WHERE email='marcos@mail.com' LIMIT 1");

		$this->assertEquals('Marcos', $obj->nome);
		$this->assertEquals('marcos@mail.com', $obj->email);
		$this->assertEquals('123456', $obj->senha);

	}

	public function testCadastroSenhaIncorreta() {

		$_POST['senha'] = '';
		$_POST['confirmacao'] = '';
		try {

			$this->controller->alteraUsuario($_POST);
			$this->fail("Não deveria chegar aqui.");

		}catch (Exception $e){
			$this->assertEquals("Senha vazia.", $e->getMessage());
		}
		$obj = $this->db->query("SELECT * FROM usuario WHERE email='marcos@mail.com' LIMIT 1");

		$_POST['senha'] = '123';
		try {

			$this->controller->alteraUsuario($_POST);
			$this->assertFalse(TRUE,"Não deveria chegar aqui.");

		}catch (Exception $e){
			$this->assertEquals("Senha fora do formato.", $e->getMessage());
		}
		$obj = $this->db->query("SELECT * FROM usuario WHERE email='marcos@mail.com' LIMIT 1");

		$_POST['senha'] = '12323123124121213523123124123123';
		try {

			$this->controller->alteraUsuario($_POST);
			$this->assertFalse(TRUE,"Não deveria chegar aqui.");

		}catch (Exception $e){
			$this->assertEquals("Senha fora do formato.", $e->getMessage());
		}
		$obj = $this->db->query("SELECT * FROM usuario WHERE email='marcos@mail.com' LIMIT 1");


	}

	public function testCadastroConfirmacaoIncorreta() {

		$_POST['confirmacao'] = '12345';
		try {

			$this->controller->alteraUsuario($_POST);
			$this->assertFalse(TRUE,"Não deveria chegar aqui.");

		}catch (Exception $e){
			$this->assertEquals("Senhas não conferem.", $e->getMessage());
		}
	}

	public function testCadastroNomeVazio() {

		$_POST['nome'] = '';
		try {

			$this->controller->alteraUsuario($_POST);

		}catch (Exception $e){
			$this->assertEquals("Nome vazio.", $e->getMessage());
		}


		$_POST['nome'] = NULL;
		try {

			$this->controller->alteraUsuario($_POST);
			$this->assertFalse(TRUE,"Não deveria chegar aqui.");

		}catch (Exception $e){
			$this->assertEquals("Nome vazio.", $e->getMessage());
		}


	}

	public function testCadastroEmailInvalido() {

		$_POST['email'] = 'marcos.com';

		try {

			$this->controller->alteraUsuario($_POST);

		}catch (Exception $e){
			//$this->assertEquals(true, $e->getMessage());
		}



		$_POST['email'] = NULL;

		try {

			$this->controller->alteraUsuario($_POST);
			$this->assertFalse(TRUE);

		}catch (Exception $e){
			$this->assertEquals("Email vazio.", $e->getMessage());
		}


	}

	public function testAlterarSenha() {

		$this->controller->validarUsuario($_POST);
		
		$_POST['senha'] = 'abcdef';
		$_POST['confirmacao'] = 'abcdef';
		
		try {
			$this->controller->alterarSenha($_POST);
			
			$u = $this->controller->consultarUsuario($_SESSION['usuario.id']);
			$this->assertNotNull($u);
			$this->assertEquals('abcdef', $u->getSenha());
			
		} catch(Exception $e) {
			$this->fail($e->getMessage());
		}
		
		$this->controller->encerrarSessao();

	}

	public function testAlterarDados() {
		
		$this->controller->validarUsuario($_POST);
		
		$_POST['nome'] = 'Joao';
		$_POST['email'] = 'joao@mail.com';
		
		try {
			$this->controller->alterarDados($_POST);
			
			$u = $this->controller->consultarUsuario($_SESSION['usuario.id']);
			$this->assertNotNull($u);
			$this->assertEquals('Joao', $u->getNome());
			$this->assertEquals('joao@mail.com', $u->getEmail());
			
		} catch(Exception $e) {
			$this->fail($e->getMessage());
		}
		
		$this->controller->encerrarSessao();

		$sql = "DELETE FROM usuario WHERE email='joao@mail.com'";
		$this->db->exec($sql);
	}
}

?>