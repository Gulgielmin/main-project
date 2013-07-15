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
class AlteraSenhaTest extends PHPUnit_Framework_TestCase {

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

	public function testAlteraSenhaCorrets() {

		$_content['senha']='123321';
		$_content['confirmacao']='123321';

		$this->controller->alterarSenha($_content);
		$obj = $this->db->query("SELECT * FROM usuario WHERE email='marcos@mail.com' LIMIT 1");
			
		$this->assertEquals('123321', $obj->senha);


	}
	public function testAlteraSenhaVazia() {

		$_content['senha']='';
		$_content['confirmacao']='';
		try{
			$this->controller->alterarSenha($_content);
			$obj = $this->db->query("SELECT * FROM usuario WHERE email='marcos@mail.com' LIMIT 1");
		}
		catch (Exception $e){

			$this->assertEquals('Senha vazia.', $e->getMessage());
		}
		
		$_content['senha']=NULL;
		$_content['confirmacao']=NULL;
		try{
			$this->controller->alterarSenha($_content);
			$obj = $this->db->query("SELECT * FROM usuario WHERE email='marcos@mail.com' LIMIT 1");
		}
		catch (Exception $e){
		
			$this->assertEquals('Senha vazia.', $e->getMessage());
		}

	}
	public function testAlteraSenhaIncorreta() {
	
		$_content['senha']='123';
		$_content['confirmacao']='123';
		try{
			$this->controller->alterarSenha($_content);
			$obj = $this->db->query("SELECT * FROM usuario WHERE email='marcos@mail.com' LIMIT 1");
		}
		catch (Exception $e){
	
			$this->assertEquals('Senha fora do formato.', $e->getMessage());
		}
		
		$_content['senha']='1233128736182531625123';
		$_content['confirmacao']='1233128736182531625123';
		try{
			$this->controller->alterarSenha($_content);
			$obj = $this->db->query("SELECT * FROM usuario WHERE email='marcos@mail.com' LIMIT 1");
		}
		catch (Exception $e){
		
			$this->assertEquals('Senha fora do formato.', $e->getMessage());
		}
	}
}

?>