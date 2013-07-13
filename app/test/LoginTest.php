<?php

require_once dirname(__FILE__).'/../controller/usuario_controller.php';
require_once 'SQLUtils.php';

class LoginTest extends PHPUnit_Framework_TestCase {
	
	public function setUp() {

		$_POST['nome'] = 'Marcos';
		$_POST['email'] = 'marcos@mail.com';
		$_POST['senha'] = '123456';
		$_POST['confirmacao'] = '123456';
		
		$this->controller = new UsuarioController();
		$this->db = new SQLUtils();
		
		$this->controller->registrarUsuario($_POST);
	}
	
	public function tearDown() {
		$sql = "DELETE FROM usuario WHERE email='marcos@mail.com';";
		$this->db->exec($sql);
		$sql = "DELETE FROM usuario WHERE nome='Marcos';";
		$this->db->exec($sql);
	}
	
	
	public function testLoginDadosCorretos() {
		$this->controller->validarUsuario($_POST);
		
		$this->assertEquals($_SESSION["usuario.email"], "marcos@mail.com");
	}
}

?>