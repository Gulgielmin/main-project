<?php
require_once dirname(__FILE__).'/../controller/projeto_controller.php';
require_once 'AlternateSessionController.php';
require_once 'SQLUtils.php';

class CadastroProjetoTest extends PHPUnit_Framework_TestCase {
		
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
		$this->controller->validarUsuario($_POST);

	}

	/**
	 * Apagar projeto previamente inserido . Observar as relações no banco.
	 */
	public function tearDown() {
		$idUsuario = $_SESSION['usuario.id'];
		$sql = "DELETE FROM projeto WHERE nome_projeto='Teste' AND inicio=2000-01-01";
		$this->db->exec($sql);
		$sql = "DELETE FROM usuario_em_projeto WHERE Usuario_IdUsuario = $idUsuario";
		$this->db->exec($sql);
		$sql = "DELETE FROM usuario WHERE nome='Marcos' AND email = 'marcos@mail.com';";
		$this->db->exec($sql);
	}
	
	public function testCadastroProjeto() {
		$_POST['nomeProjeto'] = 'Teste';
		$_POST['dataInicio'] = '2000-01-01';
		$_POST['dataTermino'] = '2001-01-01';
		$_POST['orcamento'] = 1500;
		
		$this->controller_projeto = new ProjetoController();
		
		$cadastro = $this->controller_projeto->criarProjeto($_POST, $_SESSION['usuario.id']);
			
		$this->assertNotNull($cadastro);
	}
}
?>