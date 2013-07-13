<?php

require dirname(__FILE__).'/../controller/usuario_controller.php';
require 'SQLUtils.php';

class CadastroTest extends PHPUnit_Framework_TestCase {

	private $controller;
	private $db;

	public function setUp() {

		$_POST['nome'] = 'Marcos';
		$_POST['email'] = 'marcos@mail.com';
		$_POST['senha'] = '123456';
		$_POST['confirmacao'] = '123456';

		$this->controller = new UsuarioController();
		$this->db = new SQLUtils();
	}

	public function tearDown() {
		$sql = "DELETE FROM usuario WHERE email='marcos@mail.com';";
		$this->db->exec($sql);
		$sql = "DELETE FROM usuario WHERE nome='Marcos';";
		$this->db->exec($sql);
	}

	public function testCadastroDadosCorretos() {

		$this->controller->registrarUsuario($_POST);

		$obj = $this->db->query("SELECT * FROM usuario WHERE email='marcos@mail.com' LIMIT 1");

		$this->assertEquals('Marcos', $obj->nome);
		$this->assertEquals('marcos@mail.com', $obj->email);
		$this->assertEquals('123456', $obj->senha);

	}

	public function testCadastroConfirmacaoIncorreta() {

		$_POST['confirmacao'] = '12345';
		try {

			$this->controller->registrarUsuario($_POST);
			$this->assertFalse(TRUE,"Não deveria chegar aqui.");

		}catch (Exception $e){
			$this->assertEquals("Senhas não conferem.", $e->getMessage());
		}

		$obj = $this->db->query("SELECT * FROM usuario WHERE email='marcos@mail.com' LIMIT 1");
		// 		echo $obj;
		$this->assertFalse($obj);
	}

	public function testCadastroNomeVazio() {

		$_POST['nome'] = '';
		try {

			$this->controller->registrarUsuario($_POST);

		}catch (Exception $e){
			$this->assertEquals("Nome vazio.", $e->getMessage());
		}

		$obj = $this->db->query("SELECT * FROM usuario WHERE email='marcos@mail.com' LIMIT 1");
		$this->assertFalse($obj);
		
		$_POST['nome'] = NULL;
		try {
		
			$this->controller->registrarUsuario($_POST);
			$this->assertFalse(TRUE,"Não deveria chegar aqui.");
		
		}catch (Exception $e){
			$this->assertEquals("Nome vazio.", $e->getMessage());
		}
		
		$obj = $this->db->query("SELECT * FROM usuario WHERE email='marcos@mail.com' LIMIT 1");
		$this->assertFalse($obj);

	}

	public function testCadastroEmailInvalido() {

		$_POST['email'] = 'marcos.com';

		try {

			$this->controller->registrarUsuario($_POST);
			//$this->assertFalse(TRUE);

		}catch (Exception $e){
			$this->assertEquals("Email vazio.", $e->getMessage());
		}

		$obj = $this->db->query("SELECT * FROM usuario WHERE email='marcos@mail.com' LIMIT 1");
		$this->assertFalse($obj);

	}

}

?>