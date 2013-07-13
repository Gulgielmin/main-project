<?php

require_once dirname(__FILE__).'/../controller/projeto_controller.php';
require_once dirname(__FILE__).'/AlternateSessionController.php';

class CadastroProjetoTest extends PHPUnit_Framework_TestCase {
	private $projeto;
	public function testInstanciacao(){
		$this->projeto = new ProjetoController();
		$this->assertNotNull($this->projeto);
	}
}
?>