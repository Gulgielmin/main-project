<?php
require_once dirname(__FILE__).'/../controller/usuario_controller.php';
require_once 'AlternateSessionController.php';
require_once 'SQLUtils.php';
/*
 * Teste de Altera  Senaha ade Usuario
 * 
 * Pedro Thiago e Wilker
*
*/
class AlteraDadosTest extends PHPUnit_Framework_TestCase {

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
		$this->controller->validarUsuario($_POST);
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

	public function testAlteraDadosCorrets() {

		$_content['nome']='Marcacas';
		$_content['email']='marcacas@gmail.com';

		$this->controller->alterarDados($_content);
		$obj = $this->db->query("SELECT * FROM usuario WHERE email='marcacas@gmail.com' LIMIT 1");
			
		$this->assertEquals('Marcacas', $obj->nome);
		$this->assertEquals('marcacas@gmail.com', $obj->email);


	}
	public function testAlteraDadosVazio() {

		$_content['nome']='';
		$_content['email']='marcos@mail.com';
		
		try{
			$this->controller->alterarDados($_content);
		}
		catch (Exception $e){
			$this->assertEquals('Nome vazio.', $e->getMessage());
		}
		
		$_content['nome']='Marcos';
		$_content['email']='';
		try{
			$this->controller->alterarDados($_content);
		}
		catch (Exception $e){
			$this->assertEquals('Email vazio.', $e->getMessage());
		}
		
		$_content['nome']=NULL;
		$_content['email']='marcos@mail.com';
		try{
			$this->controller->alterarDados($_content);
		}
		catch (Exception $e){
			$this->assertEquals('Nome vazio.', $e->getMessage());
		}
		
		$_content['nome']='Marcos';
		$_content['email']=NULL;
		try{
			$this->controller->alterarDados($_content);
		}
		catch (Exception $e){
			$this->assertEquals('Email vazio.', $e->getMessage());
		}
		

	}

	public function testAlteraDadosIncorretos() {
		$_content['nome']='Marcos';
		$_content['email']='marcos.com';
		
		try{
			$this->controller->alterarDados($_content);
		}
		catch (Exception $e){
			$this->assertEquals('Email inválido.', $e->getMessage());
		}
	}
}

?>